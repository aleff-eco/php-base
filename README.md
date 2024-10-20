<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About This Project

This project is built using the [Laravel](https://laravel.com) framework with [Livewire](https://laravel-livewire.com), allowing for a seamless, reactive, and modern user interface. Laravel's expressive syntax paired with Livewire's real-time interactivity makes development both powerful and enjoyable.

## Requirements

- PHP >= 8.0
- Composer
- Node.js & npm
- MySQL or PostgreSQL database
- [Laravel](https://laravel.com/docs/installation) installed
- [Livewire](https://laravel-livewire.com/docs/installation)

## Installation Steps

### Steps

```bash

# Clonar el repositorio
git clone https://github.com/yourusername/yourproject.git
cd yourproject

# Instalar dependencias de PHP
composer install

# Instalar dependencias de Node.js
npm install

# Configurar el archivo de entorno
cp .env.example .env

# Generar la clave de la aplicación
php artisan key:generate

# Instalar Livewire (si no está instalado)
composer require livewire/livewire

# Compilar los assets del front-end
npm run dev

# Si estás preparando para producción
npm run build

# Ejecutar migraciones
php artisan migrate

# Aplicar los Seeders
php artisan db:seed

# Levantar el servidor de desarrollo de Laravel
php artisan serve

# Limpiar cachés
php artisan optimize:clear

# Compilar y observar los cambios en los assets durante el desarrollo
npm run watch
