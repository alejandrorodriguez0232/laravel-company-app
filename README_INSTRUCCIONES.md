# Laravel Company App - Instrucciones de Ejecución

## Diagnóstico del Problema
Se identificó que `php artisan serve` está fallando en el sistema, pero el servidor PHP integrado funciona correctamente.

## Pasos para Ejecución Efectiva

### 1. Requisitos Previos
- PHP 8.3+
- MySQL Server
- Composer
- Node.js y npm

### 2. Configuración de la Base de Datos
Las credenciales ya están configuradas en `.env`:
- **Host**: 127.0.0.1
- **Puerto**: 3306
- **Base de datos**: laravel_company
- **Usuario**: root
- **Contraseña**: root.3285022018

### 3. Pasos de Instalación y Configuración

```powershell
# 1. Navegar al directorio del proyecto
cd C:\Users\Luis\Herd\laravel-company-app

# 2. Limpiar cachés (opcional, si hay problemas)
php artisan config:clear
php artisan cache:clear
php artisan view:clear

# 3. Ejecutar migraciones
php artisan migrate:fresh

# 4. Cargar datos de prueba
php artisan db:seed

# 5. Iniciar el servidor (usando el método alternativo)
php -S localhost:8000 -t public
```

### 4. Método Alternativo (Recomendado)
Usar el script creado:
```powershell
# Ejecutar el script de inicio
.\start_server.bat
```

### 5. Acceso a la Aplicación
- **URL**: http://localhost:8000
- **Login**: 
  - Email: test@company.com
  - Password: password123

### 6. Funcionalidades Disponibles
1. **Dashboard**: Vista principal con datos del usuario y empresa
2. **Editar Empresa**: `/company/edit` - Editar información de la empresa
3. **Ver Perfil**: `/profile/show` - Vista con datos del usuario y empresa
4. **Descargar PDF**: `/profile/download` - Generar PDF con datos combinados

### 7. Solución de Problemas Comunes

#### Si el servidor no inicia:
1. Verificar que no haya otros procesos en el puerto 8000
2. Limpiar procesos PHP: `taskkill /f /im php-cgi.exe`
3. Reiniciar el servidor con el script

#### Si hay errores de base de datos:
1. Verificar que MySQL esté corriendo
2. Crear la base de datos `laravel_company` si no existe
3. Ejecutar `php artisan migrate:fresh`

#### Si los assets no cargan:
1. Ejecutar `npm run build`
2. Limpiar caché de vistas: `php artisan view:clear`

### 8. Estructura del Proyecto
```
laravel-company-app/
|-- app/
|   |-- Models/ (User.php, Company.php)
|   |-- Http/
|   |   |-- Controllers/ (CompanyController.php, ProfileController.php)
|   |   |-- Requests/ (UpdateCompanyRequest.php)
|   |-- Providers/ (AuthServiceProvider.php, EventServiceProvider.php, RouteServiceProvider.php)
|-- database/
|   |-- migrations/ (companies_table.php)
|   |-- seeders/ (DatabaseSeeder.php)
|-- resources/views/
|   |-- dashboard.blade.php
|   |-- company/edit.blade.php
|   |-- profile/show.blade.php
|   |-- pdf/company-images.blade.php
|-- routes/web.php
|-- start_server.bat (script de inicio)
```

### 9. Notas Importantes
- El proyecto usa Bootstrap para estilos
- DOMPDF está configurado para generación de PDF
- La autenticación está configurada y funcionando
- Los datos de prueba se cargan automáticamente con el seeder
