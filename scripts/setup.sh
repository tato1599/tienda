#!/bin/bash

# ============================================================
# 🚀 Script de Setup Automático para Tienda (Laravel + LunarPHP)
# Uso: chmod +x scripts/setup.sh && ./scripts/setup.sh
# Compatible con: WSL2, Linux, macOS
# ============================================================

set -euo pipefail

# --- Colores para mensajes ---
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
CYAN='\033[0;36m'
NC='\033[0m' # No Color

# --- Variables ---
ADMIN_EMAIL="admin@test.com"
ADMIN_PASSWORD="password"
DB_FALLBACK=false
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PROJECT_DIR="$(dirname "$SCRIPT_DIR")"

# ============================================================
# Funciones auxiliares
# ============================================================

print_header() {
    echo -e "\n${CYAN}══════════════════════════════════════════════════════════${NC}"
    echo -e "${CYAN}  $1${NC}"
    echo -e "${CYAN}══════════════════════════════════════════════════════════${NC}\n"
}

print_success() {
    echo -e "${GREEN}✅ $1${NC}"
}

print_error() {
    echo -e "${RED}❌ ERROR: $1${NC}"
}

print_warning() {
    echo -e "${YELLOW}⚠️  $1${NC}"
}

print_info() {
    echo -e "${BLUE}ℹ️  $1${NC}"
}

# Compara versiones: return 0 si v1 >= v2
version_ge() {
    [ "$(printf '%s\n' "$1" "$2" | sort -V | head -n1)" = "$2" ]
}

show_wsl_help() {
    echo -e "\n${YELLOW}📖 Guía de instalación para WSL (Ubuntu/Debian):${NC}"
    echo -e "${CYAN}--- PHP 8.2+ ---${NC}"
    echo -e "sudo apt update && sudo apt install -y php8.2 php8.2-cli php8.2-mbstring php8.2-xml php8.2-curl php8.2-zip php8.2-pgsql php8.2-sqlite3 php8.2-gd php8.2-bcmath"
    echo -e "\n${CYAN}--- Composer ---${NC}"
    echo -e "curl -sS https://getcomposer.org/installer | php"
    echo -e "sudo mv composer.phar /usr/local/bin/composer"
    echo -e "\n${CYAN}--- Node.js 18+ ---${NC}"
    echo -e "curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -"
    echo -e "sudo apt install -y nodejs"
    echo -e "\n${CYAN}--- PostgreSQL (opcional) ---${NC}"
    echo -e "sudo apt install -y postgresql postgresql-contrib"
    echo -e "sudo service postgresql start"
    echo -e "\n${CYAN}--- Git (si no lo tienes) ---${NC}"
    echo -e "sudo apt install -y git"
    echo -e ""
}

# ============================================================
# 1. Verificaciones de sistema
# ============================================================

print_header "1/6 - Verificando requisitos del sistema"

# --- PHP ---
if ! command -v php &> /dev/null; then
    print_error "PHP no está instalado en tu sistema."
    show_wsl_help
    exit 1
fi

PHP_VERSION=$(php -r "echo PHP_VERSION;")
PHP_MAJOR=$(echo "$PHP_VERSION" | cut -d. -f1)
PHP_MINOR=$(echo "$PHP_VERSION" | cut -d. -f2)

if [ "$PHP_MAJOR" -lt 8 ] || { [ "$PHP_MAJOR" -eq 8 ] && [ "$PHP_MINOR" -lt 2 ]; }; then
    print_error "Necesitas PHP 8.2 o superior. Tienes: ${PHP_VERSION}"
    show_wsl_help
    exit 1
fi
print_success "PHP ${PHP_VERSION} detectado."

# --- Composer ---
if ! command -v composer &> /dev/null; then
    print_error "Composer no está instalado."
    show_wsl_help
    exit 1
fi
COMPOSER_VERSION=$(composer --version 2>/dev/null | grep -oE '[0-9]+\.[0-9]+\.[0-9]+' | head -1)
print_success "Composer detectado (v${COMPOSER_VERSION})."

# --- Node.js ---
if ! command -v node &> /dev/null; then
    print_error "Node.js no está instalado."
    show_wsl_help
    exit 1
fi
NODE_VERSION=$(node -v | sed 's/v//')
if ! version_ge "$NODE_VERSION" "18.0.0"; then
    print_error "Necesitas Node.js 18 o superior. Tienes: v${NODE_VERSION}"
    show_wsl_help
    exit 1
fi
print_success "Node.js v${NODE_VERSION} detectado."

# --- NPM ---
if ! command -v npm &> /dev/null; then
    print_error "NPM no está instalado."
    show_wsl_help
    exit 1
fi
NPM_VERSION=$(npm -v)
print_success "NPM v${NPM_VERSION} detectado."

# --- Git (opcional pero recomendado) ---
if command -v git &> /dev/null; then
    GIT_VERSION=$(git --version | awk '{print $3}')
    print_success "Git v${GIT_VERSION} detectado."
else
    print_warning "Git no detectado. Esto es opcional pero recomendado."
fi

cd "$PROJECT_DIR"
print_success "Trabajando en: ${PROJECT_DIR}"

# ============================================================
# 2. Configuración del entorno (.env)
# ============================================================

print_header "2/6 - Configurando entorno (.env)"

if [ ! -f ".env" ]; then
    if [ ! -f ".env.example" ]; then
        print_error "No se encontró .env ni .env.example en el proyecto."
        exit 1
    fi
    cp .env.example .env
    print_success "Archivo .env creado desde .env.example"
else
    print_info "Archivo .env ya existe. Se conservará la configuración actual."
fi

# Generar APP_KEY si está vacío
if ! grep -q "^APP_KEY=base64:" .env || grep -q "^APP_KEY=$" .env; then
    php artisan key:generate
    print_success "APP_KEY generado."
else
    print_info "APP_KEY ya existe."
fi

# Normalizar APP_URL para quitar puerto fijo (ej. :8000)
# Esto permite que las imagenes funcionen con cualquier puerto
APP_URL_LINE=$(grep "^APP_URL=" .env || true)
if echo "$APP_URL_LINE" | grep -qE ':(8000|3000|8080|5173|5174)'; then
    sed -i 's|^APP_URL=.*|APP_URL=http://localhost|' .env
    print_success "APP_URL normalizado a http://localhost (sin puerto fijo) para compatibilidad de imagenes."
fi

# ============================================================
# 3. Verificación de Base de Datos + Fallback a SQLite
# ============================================================

print_header "3/6 - Verificando conexión a Base de Datos"

DB_CONNECTION=$(grep "^DB_CONNECTION=" .env | cut -d= -f2 | tr -d '"' || echo "pgsql")
DB_HOST=$(grep "^DB_HOST=" .env | cut -d= -f2 | tr -d '"' || echo "127.0.0.1")
DB_PORT=$(grep "^DB_PORT=" .env | cut -d= -f2 | tr -d '"' || echo "5432")
DB_DATABASE=$(grep "^DB_DATABASE=" .env | cut -d= -f2 | tr -d '"' || echo "tienda")
DB_USERNAME=$(grep "^DB_USERNAME=" .env | cut -d= -f2 | tr -d '"' || echo "root")
DB_PASSWORD=$(grep "^DB_PASSWORD=" .env | cut -d= -f2 | tr -d '"' || echo "")

can_connect_db() {
    if [ "$DB_CONNECTION" = "pgsql" ]; then
        # Verificar si el comando psql existe
        if ! command -v psql &> /dev/null; then
            return 1
        fi
        # Intentar conectar
        PGPASSWORD="$DB_PASSWORD" psql -h "$DB_HOST" -p "$DB_PORT" -U "$DB_USERNAME" -d "$DB_DATABASE" -c "SELECT 1;" &> /dev/null
        return $?
    elif [ "$DB_CONNECTION" = "sqlite" ]; then
        if [ -f "database/database.sqlite" ]; then
            return 0
        else
            return 1
        fi
    else
        # Para otros motores, intentamos con Laravel
        php artisan tinker --execute="DB::connection()->getPdo();" &> /dev/null
        return $?
    fi
}

if can_connect_db; then
    print_success "Conexión exitosa a la base de datos (${DB_CONNECTION})."
else
    print_warning "No se pudo conectar a la base de datos configurada (${DB_CONNECTION})."

    if [ "$DB_CONNECTION" = "pgsql" ]; then
        print_info "¿No tienes PostgreSQL? No hay problema, cambiando automáticamente a SQLite..."

        # Modificar .env para SQLite
        sed -i 's/^DB_CONNECTION=.*/DB_CONNECTION=sqlite/' .env
        sed -i 's/^DB_HOST=.*/# DB_HOST=127.0.0.1/' .env
        sed -i 's/^DB_PORT=.*/# DB_PORT=5432/' .env
        sed -i 's/^DB_DATABASE=.*/# DB_DATABASE=tienda/' .env
        sed -i 's/^DB_USERNAME=.*/# DB_USERNAME=root/' .env
        sed -i 's/^DB_PASSWORD=.*/# DB_PASSWORD=/' .env

        # Crear archivo SQLite si no existe
        touch database/database.sqlite
        print_success "Base de datos SQLite creada en database/database.sqlite"
        DB_FALLBACK=true
    else
        print_error "No se pudo conectar a la base de datos (${DB_CONNECTION}) y no hay fallback automático disponible."
        print_info "Por favor, verifica tu configuración en .env"
        exit 1
    fi
fi

# ============================================================
# 4. Instalación de dependencias
# ============================================================

print_header "4/6 - Instalando dependencias"

print_info "Instalando dependencias de PHP (composer install)..."
composer install --no-interaction --prefer-dist --optimize-autoloader
print_success "Composer listo."

print_info "Instalando dependencias de Node.js (npm install)..."
npm install
print_success "NPM listo."

# ============================================================
# 5. Preparación del proyecto (migraciones, seeders, assets)
# ============================================================

print_header "5/6 - Preparando el proyecto"

# Storage link
print_info "Creando enlace simbólico de storage..."
if [ -L "public/storage" ]; then
    rm "public/storage"
fi
php artisan storage:link
print_success "Storage link creado."

# Publicar assets de LunarPHP y Filament si es necesario
print_info "Publicando recursos de LunarPHP y Filament..."
php artisan vendor:publish --tag=lunar --force || true
php artisan filament:assets || true
print_success "Recursos publicados."

# Migraciones + Seeders
print_info "Ejecutando migraciones y seeders (esto puede tardar un poco)..."
php artisan migrate:fresh --seed --force
print_success "Base de datos migrada y poblada exitosamente."

# Crear usuario admin (silencioso, si ya existe lo ignora)
print_info "Creando/Verificando usuario administrador..."
php artisan lunar:create-admin \
    --firstname="Admin" \
    --lastname="User" \
    --email="$ADMIN_EMAIL" \
    --password="$ADMIN_PASSWORD" \
    --force || true
print_success "Usuario admin verificado: ${ADMIN_EMAIL} / ${ADMIN_PASSWORD}"

# Compilar assets
print_info "Compilando assets frontend (npm run build)..."
npm run build
print_success "Assets compilados."

# ============================================================
# 6. Resumen Final
# ============================================================

print_header "6/6 - Setup Completado 🎉"

echo -e "${GREEN}¡Tu proyecto está listo! Aquí tienes el resumen:${NC}\n"

if [ "$DB_FALLBACK" = true ]; then
    echo -e "${YELLOW}⚠️  Nota: Se utilizó SQLite como fallback porque PostgreSQL no estaba disponible.${NC}"
    echo -e "   Esto es perfecto para desarrollo local. Si quieres usar PostgreSQL más adelante:"
    echo -e "   1. Instala PostgreSQL: ${CYAN}sudo apt install postgresql postgresql-contrib${NC}"
    echo -e "   2. Edita ${CYAN}.env${NC} y cambia DB_CONNECTION a ${CYAN}pgsql${NC}"
    echo -e "   3. Vuelve a ejecutar este script.\n"
fi

echo -e "${CYAN}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
echo -e "${GREEN}  🌐 Sitio web:${NC}        ${CYAN}http://localhost:PUERTO${NC}"
echo -e "${GREEN}  🔐 Panel Admin:${NC}      ${CYAN}http://localhost:PUERTO/admin${NC}"
echo -e "${GREEN}  📧 Admin Email:${NC}     ${CYAN}${ADMIN_EMAIL}${NC}"
echo -e "${GREEN}  🔑 Admin Password:${NC}  ${CYAN}${ADMIN_PASSWORD}${NC}"
echo -e "${CYAN}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}\n"

echo -e "${YELLOW}🚀 Para levantar el servidor de desarrollo, ejecuta:${NC}"
echo -e "${CYAN}   composer run dev${NC}\n"
echo -e "${BLUE}   Este comando inicia el servidor web (por defecto en puerto 8000).${NC}"
echo -e "${BLUE}   Puedes usar otro puerto si lo necesitas. Las imagenes funcionaran${NC}"
echo -e "${BLUE}   correctamente porque APP_URL esta configurado sin puerto fijo.${NC}"
echo -e "${BLUE}   Presiona Ctrl+C para detener todos los servicios cuando termines.${NC}\n"
