@echo off
echo Iniciando servidor Laravel Company App...
echo.
echo El servidor se iniciará en http://localhost:8000
echo Presiona Ctrl+C para detener el servidor
echo.
php -S localhost:8000 -t public
