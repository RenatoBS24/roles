<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/api/user/username/(:segment)', 'UserController::showByUsername/$1');
$routes->resource('/api/user', ['controller' => 'UserController']);


$routes->group('modules', function ($routes) {
    $routes->get('/', 'ModuleController::index');
    $routes->post('create', 'ModuleController::create');
});
