# Laravel Model Hash Id

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jaacu/laravel-model-hashids.svg?style=flat-square)](https://packagist.org/packages/jaacu/laravel-model-hashids)
[![Build Status](https://img.shields.io/travis/jaacu/laravel-model-hashids/master.svg?style=flat-square)](https://travis-ci.org/jaacu/laravel-model-hashids)
[![Quality Score](https://img.shields.io/scrutinizer/g/jaacu/laravel-model-hashids.svg?style=flat-square)](https://scrutinizer-ci.com/g/jaacu/laravel-model-hashids)
[![Total Downloads](https://img.shields.io/packagist/dt/jaacu/laravel-model-hashids.svg?style=flat-square)](https://packagist.org/packages/jaacu/laravel-model-hashids)
[![StyleCI](https://github.styleci.io/repos/180469507/shield?branch=master)](https://github.styleci.io/repos/180469507)

Compatible with laravel version 5.8.x

This package allows you to use hashids in your models using the [vinkla/laravel-hashids](https://github.com/vinkla/laravel-hashids) package

This package includes the [vinkla/laravel-hashids](https://github.com/vinkla/laravel-hashids) package

## Installation

You can install the package via composer:

```bash
composer require jaacu/laravel-model-hashids
```

## Usage

Add to your model migration the following code

```php
...
$table->hashid();
...
```

Then simply add the UsesHashIds trait to your model

```php
use Jaacu\LaravelModelHashids\Traits\UsesHashIds;

class MyModel extends Model
{
    use UsesHashIds;
}
```

Now using default laravel routing implicint binding will use the hashid insted of the normal id

### Examples

A model using the trait UsesHashIds

```php
$model = Model::first();
```

Generating url

```php
route('model.show',$model); // output: http://mydomain/model/<hashid>
```

Getting the hashid

```php
$model->getId() // returns: the model <hashid>
```

### Config

Publish the config file to change default behavior

```bash
php artisan vendor:publish --provider="Jaacu\LaravelModelHashids\LaravelModelHashidsServiceProvider"
```

By default the generated hashid follows this structure: app name + model name + model id hash

-   app name is set by the app.config name and can be overwritten by setting a new 'short_name' in the config/app.php file
-   model name is set by the model class name
-   model hash id is set by the model 'id' hash

This package shares the config file from [vinkla/laravel-hashids](https://github.com/vinkla/laravel-hashids)

In the config/hashids.php you can set the hash length and salt.

```php
'connections' => [
    'main' => [
        'salt' => env('APP_KEY'), // Uses the env app key by default
        'length' => 6,
    ],
    'alternative' => [
        'salt' => 'your-salt-string',
        'length' => 'your-length-integer',
    ],
]
```

### Docs

For more info on the hash functionality see [vinkla/laravel-hashids](https://github.com/vinkla/laravel-hashids)

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email jaacu.97@gmail.com instead of using the issue tracker.

## Credits

-   [Javier Cabello](https://github.com/jaacu)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
