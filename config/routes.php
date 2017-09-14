<?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;


Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    $routes->prefix('admin', function ($routes) {
        $routes->extensions(['json']);
        $routes->connect('/', ['controller' => 'Pages', 'action' => 'index', 'prefix' => 'admin']);
        $routes->fallbacks('InflectedRoute');
    });

    $routes->connect('/', ['controller' => 'Product', 'action' => 'Index']);

    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    $routes->fallbacks(DashedRoute::class);
});


Plugin::routes();
