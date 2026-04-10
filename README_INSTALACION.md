# Laravel Company App - Guía de Instalación Completa

## Requisitos Previos
- PHP 8.3+
- MySQL Server
- Composer
- Node.js y npm
- Git

## 1. Creación del Proyecto Laravel

```powershell
# Crear nuevo proyecto Laravel
composer create-project laravel/laravel laravel-company-app

# Navegar al directorio del proyecto
cd laravel-company-app

# Copiar archivo de entorno
copy .env.example .env

# Generar clave de aplicación
php artisan key:generate
```

## 2. Instalación de Dependencias Backend

```powershell
# Instalar dependencias Composer
composer install

# Instalar Laravel UI para Bootstrap
composer require laravel/ui

# Instalar DOMPDF para generación de PDF
composer require barryvdh/laravel-dompdf
```

## 3. Configuración de Autenticación

```powershell
# Generar scaffolding de autenticación con Bootstrap
php artisan ui bootstrap --auth

# Instalar dependencias frontend
npm install

# Compilar assets frontend
npm run build
```

## 4. Configuración de Base de Datos

```powershell
# Editar archivo .env con las siguientes credenciales:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel_company
# DB_USERNAME=root
# DB_PASSWORD=root.3285022018
```

## 5. Creación de Migraciones y Modelos

```powershell
# Crear migración para tabla companies
php artisan make:migration create_companies_table

# Crear modelo Company
php artisan make:model Company

# Crear controladores
php artisan make:controller CompanyController
php artisan make:controller ProfileController

# Crear FormRequest para validación
php artisan make:request UpdateCompanyRequest

# Crear providers faltantes
php artisan make:provider AuthServiceProvider
php artisan make:provider EventServiceProvider
php artisan make:provider RouteServiceProvider
```

## 6. Configuración de DOMPDF

```powershell
# Publicar configuración de DOMPDF (opcional)
php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"

# Agregar manualmente al config/app.php:
# En 'providers': Barryvdh\DomPDF\ServiceProvider::class
# En 'aliases': 'PDF' => Barryvdh\DomPDF\Facade\Pdf::class
```

## 7. Ejecución de Migraciones (Backend)

```powershell
# Limpiar cachés antes de migrar
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# Ejecutar migraciones
php artisan migrate

# Si necesita resetear la base de datos
php artisan migrate:fresh

# Cargar datos de prueba
php artisan db:seed

# O ejecutar migrate y seed juntos
php artisan migrate --seed
```

## 8. Compilación de Assets (Frontend)

```powershell
# Instalar dependencias npm
npm install

# Compilar assets para desarrollo
npm run dev

# Compilar assets para producción
npm run build

# Limpiar caché de vistas
php artisan view:clear
```

## 9. Configuración de Rutas

```powershell
# Las rutas están configuradas en routes/web.php
# Incluyen:
# - Autenticación (auth)
# - Dashboard (/dashboard)
# - Profile (/profile/show, /profile/download)
# - Company (/company/edit, /company/update)
```

## 10. Iniciar Servidor de Desarrollo

```powershell
# Método 1: Usando artisan serve (si funciona)
php artisan serve --port=8000

# Método 2: Usando servidor PHP integrado (recomendado)
php -S localhost:8000 -t public

# Método 3: Usar el script creado
.\start_server.bat
```

## 11. Verificación de Instalación

```powershell
# Verificar versión de Laravel
php artisan --version

# Verificar versión de PHP
php --version

# Verificar versión de npm
npm --version

# Verificar versión de Composer
composer --version

# Verificar migraciones ejecutadas
php artisan migrate:status

# Verificar rutas registradas
php artisan route:list
```

## 12. Comandos de Mantenimiento

```powershell
# Limpiar todas las cachés
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Optimizar para producción
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Crear enlace simbólico para storage
php artisan storage:link
```

## 13. Estructura de Archivos Creados

```
laravel-company-app/
|-- app/
|   |-- Models/
|   |   |-- User.php (modificado)
|   |   |-- Company.php (creado)
|   |-- Http/
|   |   |-- Controllers/
|   |   |   |-- CompanyController.php (creado)
|   |   |   |-- ProfileController.php (creado)
|   |   |   |-- HomeController.php (modificado)
|   |   |-- Requests/
|   |   |   |-- UpdateCompanyRequest.php (creado)
|   |-- Providers/
|   |   |-- AuthServiceProvider.php (creado)
|   |   |-- EventServiceProvider.php (creado)
|   |   |-- RouteServiceProvider.php (creado)
|-- database/
|   |-- migrations/
|   |   |-- 2026_04_10_144956_create_companies_table.php (creado)
|   |-- seeders/
|   |   |-- DatabaseSeeder.php (modificado)
|-- resources/views/
|   |-- dashboard.blade.php (creado)
|   |-- company/
|   |   |-- edit.blade.php (creado)
|   |-- profile/
|   |   |-- show.blade.php (creado)
|   |-- pdf/
|   |   |-- company-images.blade.php (creado)
|-- routes/
|   |-- web.php (modificado)
|   |-- api.php (creado)
|-- config/
|   |-- app.php (modificado para DOMPDF)
|-- start_server.bat (creado)
|-- README_INSTALACION.md (creado)
|-- README_INSTRUCCIONES.md (creado)
```

## 14. Credenciales de Acceso

**Base de Datos:**
- Host: 127.0.0.1
- Puerto: 3306
- Base de datos: laravel_company
- Usuario: root
- Contraseña: root.3285022018

**Aplicación:**
- URL: http://localhost:8000
- Email: test@company.com
- Password: password123

## 15. Flujo Completo de Instalación (Resumen)

```powershell
# 1. Crear proyecto
composer create-project laravel/laravel laravel-company-app
cd laravel-company-app
copy .env.example .env
php artisan key:generate

# 2. Instalar dependencias
composer install
composer require laravel/ui
composer require barryvdh/laravel-dompdf

# 3. Configurar autenticación y frontend
php artisan ui bootstrap --auth
npm install
npm run build

# 4. Configurar base de datos (editar .env manualmente)

# 5. Crear estructura de la aplicación
php artisan make:migration create_companies_table
php artisan make:model Company
php artisan make:controller CompanyController
php artisan make:controller ProfileController
php artisan make:request UpdateCompanyRequest
php artisan make:provider AuthServiceProvider
php artisan make:provider EventServiceProvider
php artisan make:provider RouteServiceProvider

# 6. Configurar DOMPDF en config/app.php

# 7. Ejecutar migraciones y seed
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan migrate:fresh
php artisan db:seed

# 8. Iniciar servidor
php -S localhost:8000 -t public
```

## 16. Troubleshooting Común

**Si php artisan serve no funciona:**
```powershell
# Limpiar procesos PHP
taskkill /f /im php-cgi.exe

# Usar servidor PHP integrado
php -S localhost:8000 -t public
```

**Si hay errores de migración:**
```powershell
# Verificar configuración de base de datos
php artisan config:clear

# Resetear migraciones
php artisan migrate:fresh
```

**Si los assets no cargan:**
```powershell
# Recompilar assets
npm run build

# Limpiar caché de vistas
php artisan view:clear
```
