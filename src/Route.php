<?php

namespace Collectivism\Router;

class Route
{
    protected static $patterns = array();

    protected function __construct()
    {
    }

    public function __callStatic($method, $arguments)
    {
        return self::register(strtoupper($method), array_shift($arguments), array_shift($arguments));
    }

    public static function register($method, $pattern, $file)
    {
        if ((!array_key_exists($pattern, self::$patterns))
            || (array_key_exists($pattern, self::$patterns) && self::$patterns[$pattern]['method'] !== $method)) {
            self::$patterns[$pattern] = array('method' => $method, 'file' => $file);

            return true;
        } else {
            return false;
        }
    }

    public static function routes()
    {
        return self::$patterns;
    }
}
