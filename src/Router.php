<?php

namespace Collectivism\Router;

class Router
{
    protected static $routes = array();

    public function __construct()
    {
    }

    public function start()
    {
        self::$routes = Route::routes();

        foreach (self::$routes as $pattern => $arguments) {
        }
    }
}
