<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//$routes->get('/api/user/username/(:segment)', 'UserController::showByUsername/$1');
//$routes->get('/api/user/(:segment)', 'UserController::showUserWithModules/$1');
//$routes->resource('/api/user', ['controller' => 'UserController']);

$routes->group('admin', ['filter' => 'auth:FUNCIONARIO'], function ($routes) {
    $routes->get('api/user/username/(:segment)', 'UserController::showByUsername/$1');
    $routes->get('api/user/(:segment)', 'UserController::showUserWithModules/$1');
    $routes->resource('api/user', ['controller' => 'UserController']);
    $routes->get('api/menu-system/user/(:num)', 'MenuSystemController::show/$1');
    $routes->get('module/', 'ModuleController::index');
    $routes->post('module/create', 'ModuleController::create');
    $routes->put('module/update/(:num)', 'ModuleController::update/$1');
    $routes->post('update', 'UsuarioMenuController::update');
    $routes->delete('delete/(:num)', 'UsuarioMenuController::delete/$1');
});
//RUTAS LIBRES
$routes->group('auth', function ($routes) {
    $routes->post('login', 'UserController::login');
});
/*
$routes->group('modules', function ($routes) {
    $routes->get('/', 'ModuleController::index');
    $routes->post('create', 'ModuleController::create');
    $routes->put('update/(:num)', 'ModuleController::update/$1');
});


$routes->group('/api/permission', function ($routes) {
    $routes->post('update', 'UsuarioMenuController::update');
    $routes->delete('delete/(:num)', 'UsuarioMenuController::delete/$1');
});
*/