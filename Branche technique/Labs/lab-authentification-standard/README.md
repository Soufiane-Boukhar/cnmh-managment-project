## Create new Laravel project

## Reference 

- https://infyom.com/open-source

## Travail a faire 

Créer une authentification de utilisateur

## Critères de validation

- Utiliser adminlte ui auth


## Commandes

```bash
composer create-project laravel/laravel laravel 
```

```json
 "require": {
     "infyomlabs/adminlte-templates": "^5.0",
     "doctrine/dbal": "~2.3"
 }  
 ```
> composer update

 
```bash
php artisan infyom:publish --localized
```

```bash
composer require infyomlabs/laravel-ui-adminlte
```

```bash
php artisan ui adminlte --auth
```


```bash
php artisan migrate
```

