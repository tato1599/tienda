<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Tienda Online (Laravel + LunarPHP + MaryUI)

> Proyecto de e-commerce para servicios tecnicos. Creado con Laravel 12, LunarPHP como motor de e-commerce, MaryUI para componentes de interfaz y TailwindCSS.

---

## 📌 Tabla de Contenidos

1. [Que necesito antes de empezar](#-que-necesito-antes-de-empezar)
2. [Como levantar el proyecto (paso a paso)](#-como-levantar-el-proyecto-paso-a-paso)
3. [Como entrar al panel de administracion](#-como-entrar-al-panel-de-administracion)
4. [Como detener el servidor](#-como-detener-el-servidor)
5. [Solucion de problemas comunes](#-solucion-de-problemas-comunes)
6. [Preguntas frecuentes](#-preguntas-frecuentes)
7. [Tecnologias usadas](#-tecnologias-usadas)

---

## Que necesito antes de empezar

Antes de correr cualquier comando, verifica que tengas esto instalado en tu computadora (o en WSL si usas Windows):

| Requisito | Version minima | Como verificar | Enlace de descarga |
|-----------|---------------|--------------|-------------------|
| **PHP** | 8.2+ | `php -v` | [php.net](https://www.php.net/downloads.php) |
| **Composer** | Cualquiera | `composer --version` | [getcomposer.org](https://getcomposer.org/download/) |
| **Node.js** | 18+ | `node -v` | [nodejs.org](https://nodejs.org/) |
| **NPM** | Viene con Node | `npm -v` | (Incluido con Node.js) |
| **Git** | Cualquiera | `git --version` | [git-scm.com](https://git-scm.com/) |

> **Nota para usuarios de WSL (Windows):**
> Si usas Windows con WSL, abre tu terminal de Ubuntu/WSL y corre los comandos ahi. Los comandos de este tutorial son para Linux/WSL.
>
> **No necesitas instalar PostgreSQL.** El proyecto funciona perfectamente con SQLite si no tienes PostgreSQL. El script lo detecta y cambia automaticamente.

---

## Como levantar el proyecto (paso a paso)

### Paso 1: Clonar el repositorio

Abre tu terminal y corre:

```bash
git clone <URL_DEL_REPOSITORIO>
cd tienda
```

> El segundo comando (`cd tienda`) te mete a la carpeta del proyecto. **No olvides hacerlo.**

---

### Paso 2: Ejecutar el script de configuracion automatica

Dentro de la carpeta `tienda`, corre **un solo comando** y espera:

```bash
composer run setup
```

Este comando es **magico**. Hace todo lo siguiente automaticamente por ti:

1. **Verifica** que PHP, Composer, Node y NPM esten bien instalados y en las versiones correctas.
2. **Crea** el archivo `.env` con la configuracion base si no existe.
3. **Detecta tu base de datos:** Si tienes PostgreSQL, la usa. Si no, **cambia automaticamente a SQLite** (sin que hagas nada) y crea el archivo de base de datos.
4. **Instala** todas las librerias de PHP (`composer install`).
5. **Instala** todas las librerias de JavaScript (`npm install`).
6. **Configura** el `APP_KEY` (clave de seguridad de Laravel).
7. **Crea el enlace** de `storage` para que las imagenes de productos se vean correctamente.
8. **Limpia y recrea** la base de datos con `migrate:fresh --seed`.
9. **Carga** los productos de ejemplo (servicios tecnicos) a la base de datos.
10. **Crea** el usuario administrador por defecto.
11. **Compila** los archivos CSS y JavaScript para la interfaz.

> **Cuanto tarda?** Normalmente entre 1 y 3 minutos, dependiendo de tu internet.

---

### Paso 3: Levantar el servidor

Cuando el script termine, te mostrara un mensaje como este:

```
Para levantar el servidor de desarrollo, ejecuta:
   composer run dev
```

Corre ese comando:

```bash
composer run dev
```

Esto va a iniciar **varios servicios a la vez**:
- **Servidor web** de Laravel (por defecto en el puerto 8000)
- **Vite** (recarga automatica cuando cambias archivos CSS/JS)
- **Colas de trabajo** (para procesos en segundo plano)
- **Logs en tiempo real** (para ver errores mientras desarrollas)

Espera unos segundos y veras algo como:

```
[vite]  ready in 300 ms
[server]  Server running on http://127.0.0.1:8000
```

---

### Paso 4: Abrir en el navegador

Abre tu navegador y entra a:

- **Sitio web:** [http://localhost:8000](http://localhost:8000)
- **Panel de Administracion:** [http://localhost:8000/admin](http://localhost:8000/admin)

> **Las imagenes de los productos deberian verse correctamente** sin importar en que puerto corras el servidor. Esto ya esta configurado automaticamente.

---

## Como entrar al panel de administracion

Para acceder al panel de admin del e-commerce, usa estas credenciales:

| Campo | Valor |
|-------|-------|
| **Email** | `admin@test.com` |
| **Password** | `password` |

> **Importante:** Estas credenciales se crean automaticamente cuando corres `composer run setup`. Si borras la base de datos, vuelve a correr el setup.

---

## Como detener el servidor

En la terminal donde corre `composer run dev`, presiona:

```
Ctrl + C
```

Esto detiene todos los servicios (servidor web, Vite, colas y logs).

Para volver a levantarlo mas tarde, simplemente corre de nuevo:

```bash
composer run dev
```

> **No necesitas correr `composer run setup` de nuevo**, a menos que borres la carpeta o la base de datos. El setup es solo la primera vez.

---

## Solucion de problemas comunes

### "No tengo PostgreSQL, funcionara?"

**Si.** El script detecta si no tienes PostgreSQL y **cambia automaticamente a SQLite**. No tienes que hacer nada.

Si despues quieres usar PostgreSQL (mas profesional), instala `postgresql` y `postgresql-contrib` en WSL, edita el archivo `.env` cambiando `DB_CONNECTION=sqlite` a `DB_CONNECTION=pgsql`, y vuelve a correr `composer run setup`.

---

### "Las imagenes de los productos no se ven"

**Razon probable:** El enlace simbolico de `storage` no esta creado o se rompio.

**Solucion:** Corre estos comandos desde la carpeta del proyecto:

```bash
php artisan storage:link
```

Si dice "el enlace ya existe", primero borralo:

```bash
rm public/storage
php artisan storage:link
```

---

### "Error: PHP no esta instalado / version muy vieja"

En WSL/Ubuntu, instala PHP 8.2 con:

```bash
sudo apt update
sudo apt install -y php8.2 php8.2-cli php8.2-mbstring php8.2-xml php8.2-curl php8.2-zip php8.2-pgsql php8.2-sqlite3 php8.2-gd php8.2-bcmath
```

Luego verifica con `php -v`.

---

### "Error: Composer no esta instalado"

```bash
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

---

### "Error: Node.js no esta instalado / version muy vieja"

En WSL/Ubuntu:

```bash
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install -y nodejs
```

Verifica con `node -v`.

---

### "Puerto 8000 ocupado"

Si el puerto 8000 ya lo usa otro programa, Laravel usara otro puerto (ej. 8001). En la terminal veras un mensaje como:

```
Server running on http://127.0.0.1:8001
```

Simplemente usa esa URL en tu navegador. **Las imagenes seguiran funcionando** porque estan configuradas con rutas relativas.

---

### "Quiero cambiar el puerto manualmente"

Si quieres forzar un puerto especifico:

```bash
php artisan serve --port=9000
```

Y en otra terminal:

```bash
npm run dev
```

---

## Preguntas frecuentes

### Para que sirve `composer run setup`?

Es el comando que **prepara todo** la primera vez. Instala dependencias, configura la base de datos, carga productos de prueba y crea el usuario admin.

### Para que sirve `composer run dev`?

Es el comando que **levanta el servidor** para que puedas ver el proyecto en tu navegador. Lo usas cada vez que quieras trabajar en el proyecto.

### Que pasa si borro la carpeta `vendor` o `node_modules`?

Corre `composer run setup` de nuevo y todo se reinstala.

### Donde estan los productos que se cargan?

Los productos (servicios tecnicos) se cargan automaticamente desde el archivo:

```
database/seeders/StoreSeeder.php
```

Ahi puedes ver y modificar la lista de servicios si quieres.

### Como agrego mas productos?

Usa el **Panel de Administracion** en `/admin`. Entra con las credenciales de admin y desde ahi puedes crear, editar y eliminar productos.

---

## Tecnologias usadas

- **[Laravel 12](https://laravel.com)** - Framework PHP
- **[LunarPHP](https://lunarphp.io)** - E-commerce headless para Laravel
- **[MaryUI](https://mary-ui.com)** - Componentes Blade
- **[Livewire 3](https://livewire.laravel.com)** - Reactividad full-stack
- **[TailwindCSS](https://tailwindcss.com)** - Framework CSS
- **[Vite](https://vitejs.dev)** - Compilacion de assets frontend

---

## Licencia

Este proyecto esta bajo la licencia [MIT](https://opensource.org/licenses/MIT).
