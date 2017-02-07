# HTMLPurifier - Laravel 5 package

[![Latest Stable Version](https://poser.pugx.org/alexusmai/laravel-purifier/v/stable)](https://packagist.org/packages/alexusmai/laravel-purifier)
[![Total Downloads](https://poser.pugx.org/alexusmai/laravel-purifier/downloads)](https://packagist.org/packages/alexusmai/laravel-purifier)
[![Latest Unstable Version](https://poser.pugx.org/alexusmai/laravel-purifier/v/unstable)](https://packagist.org/packages/alexusmai/laravel-purifier)
[![License](https://poser.pugx.org/alexusmai/laravel-purifier/license)](https://packagist.org/packages/alexusmai/laravel-purifier)


HTML Purifier is a standards-compliant HTML filter library written in PHP.

About HTML Purifier - http://htmlpurifier.org/

## Installation

Composer

``` bash
composer require alexusmai/laravel-purifier
```

Add service provider to config/app.php

``` php
Alexusmai\LaravelPurifier\LaravelPurifierServiceProvider::class,
```

And add alias

``` php
'Purifier' => Alexusmai\LaravelPurifier\Facades\PurifierFacade::class,
```

Publish config file (purifier.php)

``` php
php artisan vendor:publish --provider="Alexusmai\LaravelPurifier\LaravelPurifierServiceProvider"
```

## Usage

Use default settings (config/purifier.php - default)

```php
// string
Purifier::clean($text);

// array
Purifier::clean(['text1', 'text2', 'text3']);

// or use helper function
purifier($text);
```

Or you can create your own settings in configuration file (config/purifier.php)
 
```php
Purifier::clean($text, 'my-settings-name');

purifier($text, 'my-settings-name');
```

Or you can use dynamic configuration

```php
Purifier::clean($text, ['HTML.Allowed' => 'div,br,span']);

purifier($text, ['HTML.Allowed' => 'div,br,span']);
```

