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
  $routes->get('/', 'BahanBakuController::index');
  $routes->get('create', 'BahanBakuController::create');
  $routes->post('create', 'BahanBakuController::store');
  // $routes->get('detail/(:num)', 'BahanBakuController::detail/$1');
  $routes->delete('delete/(:num)', 'BahanBakuController::delete/$1');
  $routes->get('edit/(:num)', 'BahanBakuController::edit/$1');
  $routes->post('edit/(:num)', 'BahanBakuController::update/$1');
  $routes->get('permintaan', 'PermintaanController::showAll');
  $routes->put('permintaan/tolak/(:num)', 'PermintaanController::tolak/$1');
  $routes->put('permintaan/terima/(:num)', 'PermintaanController::terima/$1');



});

$routes->group('dapur', ['filter' => 'auth:dapur'], function($routes){
  $routes->get('permintaan', 'PermintaanController::index');
  $routes->post('permintaan', 'PermintaanController::store');
});