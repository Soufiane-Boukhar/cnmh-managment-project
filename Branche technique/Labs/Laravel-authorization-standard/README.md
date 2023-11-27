# Laravel-security-standard

## Reference 

- https://spatie.be/docs/laravel-permission/v6/introduction
- https://hotexamples.com/examples/illuminate.routing/Controller/callAction/php-controller-callaction-method-examples.html


## Travail a faire

Donner les roles et permissions pour chaque utilisateur

## Packages

- ui adminlte authentification
- spatie/laravel-permission

## Commande

```bash

 composer require infyomlabs/laravel-ui-adminlte


```

```bash

php artisan ui adminlte --auth

```


```bash

 composer require spatie/laravel-permission

```


```bash

php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"

```

```bash

php artisan migrate

```

```bash

php artisan db:seed

```

