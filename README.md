router [![Build
Status](https://travis-ci.org/collectivism/router.svg)](https://travis-ci.org/collectivism/router)
======

## Installation

Add this to your `composer.json` and run `composer install`.

```json
  "require": {
    "collectivism/router" : "dev-master"
  }
```

## Usage

```php
use \Collectivism\Router;

Route::get('/foo/bar', __DIR__ . '/foo/bar.php');
Route::post('/foo/bar', __DIR__ . '/foo/bar.php');

Route::get('/foo/baz', __DIR__ . '/foo/baz.php');

Router::start();
```
