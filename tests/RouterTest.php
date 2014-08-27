<?php

namespace Router\Tests;

use Collectivism\Router\Route;
use Collectivism\Router\Router;

class RouterTest extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
    }

    public function testRouterMatchFound()
    {
        // Register routes
        Route::get('/foo/bar', __DIR__ . '/foo/bar.php');
        Route::get('/foo/baz', __DIR__ . '/foo/baz.php');

        // Fake a request by setting $_SERVER
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['PATH_INFO'] = 'http://foo.bar.com/foo/bar';

        $this->assertTrue(Router::start());
    }

    /*
     * @expectedException        Exception
     * @expectedExceptionMessage file does not exist
     */
    public function testRouterNoMatchFound()
    {
        // Register routes
        Route::get('/foo/bar', __DIR__ . '/foo/bar.php');
        Route::get('/foo/baz', __DIR__ . '/foo/baz.php');

        // Fake a request by setting $_SERVER
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_SERVER['PATH_INFO'] = 'http://foo.bar.com/foo/baz';

        try {
            Router::start();
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }
        $this->assertEquals($message, 'file does not exist');
    }
}
