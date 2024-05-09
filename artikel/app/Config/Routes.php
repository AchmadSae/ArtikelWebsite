<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('blog', ['namespace' => '\App\Controllers'], function ($routes) {
    $routes->get('/', 'ArtikelController::index'); // Route for default page
    $routes->get('(:segment)', 'ArtikelController::find/$1'); // Route for dynamic segments
});
$routes->get('/create_artikel', 'RequestArtikelController::index');
$routes->get('/login', 'Auth::login');
$routes->get('/signUp', 'Auth::signUp');


