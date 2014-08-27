<?php

namespace Collectivism\Router;

class Route
{
    protected static $patterns = array();

    protected function __construct()
    {
    }

    public static function __callStatic($method, $arguments)
    {
        $method = strtoupper($method);

        if (!self::validateMethod($method))
            return false;

        $pattern = preg_quote(array_shift($arguments), '/');
        $file = array_shift($arguments);

        return self::register($method, $pattern, $file);
    }

    protected static function validateMethod($method)
    {
        if (!in_array($method, array('GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'))) {
            return false;
        }

        return true;
    }

    protected static function register($method, $pattern, $file)
    {
        if ((array_key_exists($pattern, self::$patterns) && self::$patterns[$pattern]['method'] === $method)) {
            return false;
        }
        self::$patterns[$pattern] = array(
            'method' => $method,
            'file' => $file
        );

        return true;
    }

    public static function routes()
    {
        return self::$patterns;
    }
}
