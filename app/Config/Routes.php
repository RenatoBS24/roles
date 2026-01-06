<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/api/user/username/(:segment)', 'UserController::showByUsername/$1');
$routes->resource('/api/user', ['controller' => 'UserController']);


