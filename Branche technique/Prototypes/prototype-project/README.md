# Project Name

## Overview
This Laravel project manages tasks and projects with features such as import/export using Maatwebsite Excel, UI built with Laravel UI and AdminLTE, user permissions with Spatie Laravel Permission, and functionality for search, pagination, and filtering.

## Prerequisites
- PHP 8.2
- Composer
- Node.js & NPM
- MySQL

## Getting Started

### Installation
```bash

# Clone the repository
git clone https://github.com/boukharSoufiane1998/prototype-project.git

# Navigate to the project directory
cd your-repo

# Install PHP dependencies
composer install

# Install JavaScript dependencies

npm install && npm run dev

# Configure your .env file and set up the database
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
