# Project Name

## Overview
Create web application built with Laravel to manage projects and tasks. It also uses the Maatwebsite Excel package to export and import data. Built with Laravel UI authentification and AdminLTE, user permissions with Spatie Laravel Permission, and functionality for search, pagination, and filtering.

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
