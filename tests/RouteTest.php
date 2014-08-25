<?php

namespace Router\Tests;

use Collectivism\Router\Route;

class RouteTest extends \PHPUnit_Framework_TestCase
{
    public function __construct()
    {
    }

    public function testRouteRegister()
    {
        // This will pass
        $this->assertTrue(Route::get('^/foo/bar$', __DIR__ . '/foo/bar.php'));

        // This will fail because same route cannot be registered again
        $this->assertFalse(Route::get('^/foo/bar$', __DIR__ . '/foo/bar.php'));

        // This can be registerd because it is a different method
        $this->assertTrue(Route::post('^/foo/bar$', __DIR__ . '/foo/bar.php'));
    }

    public function testRoutes()
    {
        // Register routes
        Route::get('^/foo/bar$', __DIR__ . '/foo/bar.php');
        Route::get('^/foo/baz$', __DIR__ . '/foo/baz.php');

        $this->assertEquals(
            Route::routes(),
            array(
                '^/foo/bar$' => array(
                    'method' => 'GET',
                    'file' => __DIR__ . '/foo/bar.php'
                ),
                '^/foo/baz$' => array(
                    'method' => 'GET',
                    'file' => __DIR__ . '/foo/baz.php'
                )
            )
        );
    }
}
