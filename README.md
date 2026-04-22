<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Tienda Online (Laravel + LunarPHP + MaryUI)

Este es un proyecto de tienda electrónica moderno construido con el stack de Laravel y LunarPHP, utilizando MaryUI para una interfaz elegante y funcional.

## 🚀 Guía de Inicio Rápido

Sigue estos pasos para poner en marcha el proyecto por primera vez en tu entorno local.

### 📋 Requisitos Previos

Antes de comenzar, asegúrate de tener instalado:
- **PHP 8.2+**
- **Composer**
- **Node.js & NPM**
- **PostgreSQL** (u otro motor de base de datos compatible)

---

### 🛠️ Instalación y Configuración

#### 1. Clonar el repositorio
```bash
git clone <url-del-repositorio>
cd tienda
```

#### 2. Configuración Automática (Recomendado)
El proyecto cuenta con un script de `setup` que automatiza la instalación de dependencias, configuración de entorno y construcción de activos:

```bash
composer run setup
```

> [!IMPORTANT]
> El script de setup intentará ejecutar las migraciones. Asegúrate de tener creada la base de datos y configurada correctamente en tu archivo `.env` antes o inmediatamente después de que el script cree el archivo.

#### 3. Configuración Manual (Opcional)
Si prefieres realizar los pasos manualmente:

```bash
# Instalar dependencias de PHP
composer install

# Configurar el entorno
cp .env.example .env
php artisan key:generate

# Configurar tu base de datos en el archivo .env y luego:
php artisan migrate

# Instalar dependencias de JS y compilar activos
npm install
npm run build
```

#### 4. Pasos Finales de Aplicación
Para habilitar el almacenamiento de archivos y las funcionalidades de LunarPHP:

```bash
# Crear link de almacenamiento
php artisan storage:link

# Instalar LunarPHP (Publicar configuraciones y recursos)
php artisan lunar:install

# Crear el primer usuario administrador para el panel
php artisan lunar:create-admin
```

---

## 💻 Desarrollo Local

Para iniciar el entorno de desarrollo con todos los servicios necesarios (Servidor, Vite, Colas de trabajo y Logs) de forma simultánea, utiliza:

```bash
composer run dev
```

Este comando utiliza `concurrently` para ejecutar:
- `php artisan serve` (Servidor web)
- `npm run dev` (Vite Hot Reload)
- `php artisan queue:listen` (Procesamiento de colas)
- `php artisan pail` (Visualización de logs en tiempo real)

---

## 🛠️ Tecnologías Principales

- **[Laravel 12](https://laravel.com)** - El framework PHP para artesanos web.
- **[LunarPHP](https://lunarphp.io)** - Headless E-commerce para Laravel.
- **[MaryUI](https://mary-ui.com)** - Componentes Blade elegantes para Laravel.
- **[Livewire 3](https://livewire.laravel.com)** - Desarrollo full-stack reactivo.
- **[TailwindCSS](https://tailwindcss.com)** - Framework de CSS orientado a utilidades.
- **[Vite](https://vitejs.dev)** - Frontend Tooling de última generación.

---

## 📄 Licencia

Este proyecto está bajo la licencia [MIT](https://opensource.org/licenses/MIT).

