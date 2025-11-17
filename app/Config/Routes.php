<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/registrasi', 'RegistrasiController::registrasi');
$routes->post('/login', 'loginController::login');

$routes->group('biodata', function ($routes) {
    $routes->post('/', 'BiodataController::create');
    $routes->get('/', 'BiodataController::list');
    $routes->get('(:segment)', 'BiodataController::detail/$1');
    $routes->put('(:segment)', 'BiodataController::ubah/$1');
    $routes->delete('(:segment)', 'BiodataController::hapus/$1');
});
