<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'auth']);

$routes->group('auth', function($routes) {
  $routes->get('login', 'AuthController::login', ['as' => 'login']);
  $routes->post('login', 'AuthController::attemptLogin');
  $routes->get('logout', 'AuthController::logout');
});

// admin
$routes->group('users', ['filter' => 'auth:admin'], function($routes){
  $routes->get('/', 'UserController::index');
  $routes->get('create', 'UserController::create');
  $routes->post('create', 'UserController::store');
  $routes->get('detail/(:num)', 'UserController::detail/$1');
  $routes->delete('delete/(:num)', 'UserController::delete/$1');
  $routes->get('edit/(:num)', 'UserController::edit/$1');
  $routes->post('edit/(:num)', 'UserController::update/$1');
});