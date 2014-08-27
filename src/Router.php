<?php

namespace Collectivism\Router;

class Router
{
    protected static $routes = array();
    protected static $request;

    public function __construct()
    {
    }

    public static function start()
    {
        self::$request = new Request();
        self::$routes = Route::routes();

        $output = false;
        foreach (self::$routes as $pattern => $arguments) {
            if (preg_match('/' . $pattern . '/', self::$request->uri) && self::$request->method === $arguments['method']) {
                if (file_exists($arguments['file'])) {
                    include_once $arguments['file'];
                    $output = true;
                } else {
                    throw new \Exception('file does not exist');
                }
            }
        }

        return $output;
    }
}
