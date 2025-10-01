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
$routes->group('bahan-baku', ['filter' => 'auth:gudang'], function($routes){
  // $routes->get('/', 'UserController::index');
  // $routes->get('create', 'UserController::create');
  // $routes->post('create', 'UserController::store');
  // $routes->get('detail/(:num)', 'UserController::detail/$1');
  // $routes->delete('delete/(:num)', 'UserController::delete/$1');
  // $routes->get('edit/(:num)', 'UserController::edit/$1');
  // $routes->post('edit/(:num)', 'UserController::update/$1');
  $routes->get('/', 'BahanBakuController::index');
  $routes->get('create', 'BahanBakuController::create');
  $routes->post('create', 'BahanBakuController::store');
  $routes->get('detail/(:num)', 'BahanBakuController::detail/$1');
  $routes->delete('delete/(:num)', 'BahanBakuController::delete/$1');
  $routes->get('edit/(:num)', 'BahanBakuController::edit/$1');
  $routes->post('edit/(:num)', 'BahanBakuController::update/$1');
  
});