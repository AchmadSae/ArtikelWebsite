<?php


use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('', ['namespace' => '\App\Controllers'], function ($routes) {
    $routes->get('/', 'ArticleController::index'); // Route for default page
    $routes->get('search/(:segment)', 'ArticleController::find/$1'); // Route for dynamic segments
    $routes->post('insight_and_comment', 'FeedbackController::sendComment');
});
$routes->group('creator', ['filter' => 'auth'], function ($routes) {
    $routes->get('create_article', 'RequestArticleController::index');
    $routes->post('request_article', 'RequestArticleController::addArticle');
    // Add other routes that require authentication here
});
$routes->group('auth', ['namespace' => '\App\Controllers'], function ($routes) {
    $routes->get('/', 'AuthController::index');
    $routes->get('logOut', 'AuthController::logOut');
    $routes->post('login', 'AuthController::login');
    $routes->get('signUp', 'AuthController::signUp');
    $routes->post('register', 'AuthController::register');
});



