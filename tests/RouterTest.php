<?php

namespace Router\Tests;

use Collectivism\Router\Route;
use Collectivism\Router\Router;

class RouterTest extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
    }

    public function testRouter()
    {
        // Register routes
        Route::get('^/foo/bar$', __DIR__ . 'foo/bar.php');
        Route::get('^/foo/baz$', __DIR__ . 'foo/baz.php');

        Router::start();
    }
}
