# Extension request

A slight addition to the `Laravel Request` 
complementing it using the transformation method.

## Make request
Create the request as created, this package expands the `Laravel` command.
```bash
php artisan make:request UserRequest
```
You will be created the same file only inherited from `Bfg\Request\FormRequest`.

## transformation
```php
$request->transformation(array $validated);
```
Transformation callback for request validation result.

## transform
Transform and get a request validation result.

## save
```php
$request->save(Model|Relation|Builder|string $model);
```
Send to preserving kernel [BlessModel](https://github.com/bfg-s/bless_model). 

## saveIf
```php
$request->save(callable|bool $condition, Model|Relation|Builder|string $model);
```
Save any model with condition and request transform

## Deactivate
```bash
php artisan uninstall bfg/request
```

## Activate
```bash
php artisan install bfg/request
```
