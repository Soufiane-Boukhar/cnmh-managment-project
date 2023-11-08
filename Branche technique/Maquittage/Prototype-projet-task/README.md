
# Laravel Project and Task Management Application

This is a web application built with Laravel for managing projects and tasks. It also utilizes the Maatwebsite Excel package for exporting and importing data.

## Installation

To get started with this application, follow these steps:

1. Clone the repository:

- git clone https://github.com/boukharSoufiane1998/Prototype-projet-task.git

2. cd Prototype-projet-task/app:

 - npm install
 - composer install
 - php artisan migrate
 - php artisan db:seed
 - npm run dev

3. Install package Excel in laravel:

- composer require maatwebsite/excel

4. Configuration Excel:

 - Update your composer.json set "maatwebsite/excel": "*" to "maatwebsite/excel": "3.1.48"
 - Run composer update
 - Edit your config/app.php add to providers : Maatwebsite\Excel\ExcelServiceProvider::class, and add to aliases Maatwebsite\Excel\Facades\Excel::class,
 - Run composer dump-autoload
 - Run this command php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider" --tag=config 


### Author :
[Boukhar soufiane - Github Profile](https://github.com/boukharSoufiane1998)








