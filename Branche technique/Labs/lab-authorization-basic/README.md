# Lab authorization basic 

## Reference 

- https://laravel.com/docs/10.x/authorization
- https://hotexamples.com/examples/illuminate.routing/Controller/callAction/php-controller-callaction-method-examples.html

## Travail a faire

Donne les droit pour chaque utilisateur pour faire ajouter ou editer en utilisant function callAction avec gate


## Create new Laravel project

```bash
composer require  create-project laravel/laravel example-app
```
```bash
php artisan migrate
```
```bash
php artisan make:policy ProjetPolicy --model=Project
```
```bash
php artisan serve
```

