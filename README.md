# Keebs

## Introduction

This project is bootstraped with [Larawind - Laravel 8.0+ Jetstream and Tailwind CSS Admin Theme](https://github.com/miten5/larawind).

## Requirements

- Laravel installer
- Composer
- Npm installer

## Installation

```bash
# Clone the repository from GitHub and open the directory:
git clone https://github.com/miten5/larawind.git

# cd into your project directory
cd larawind

# install composer and npm packages
composer install
npm install && npm run dev

# Start prepare the environment:
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link

# Run your server
php artisan serve
```

## Technologies Used

### Stack

- [Laravel 8.0+](https://laravel.com/docs/8.x)
- [Laravel Jetstream](https://jetstream.laravel.com/1.x/introduction.html)
- [Tailwind CSS](https://tailwindcss.com/)

### Template

- [Windmill Dashboard](https://windmill-dashboard.vercel.app/)
