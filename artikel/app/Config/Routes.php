<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('', ['namespace' => '\App\Controllers'], function ($routes) {
    $routes->get('/', 'ArtikelController::index'); // Route for default page
    $routes->get('search/(:segment)', 'ArtikelController::find/$1'); // Route for dynamic segments
});
$routes->group('creator', ['filter' => 'auth'], function ($routes) {
    $routes->get('create_artikel', 'RequestArtikelController::index');
    // Add other routes that require authentication here
});
$routes->group('auth', ['namespace' => '\App\Controllers'], function ($routes) {
    $routes->get('/', 'AuthController::index');
    $routes->get('logOut', 'AuthController::logOut');
    $routes->post('login', 'AuthController::login');
    $routes->post('signUp', 'AuthController::signUp');
});



