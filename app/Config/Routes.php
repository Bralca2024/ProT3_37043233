<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('principal', 'Home::index');
$routes->get('formulario', 'Home::formulario');
$routes->get('quienes_somos', 'Home::quienes_somos');
$routes->get('acerca_de', 'Home::acerca_de');
$routes->get('registro', 'Home::registro');
$routes->get('login', 'Home::login');
// $routes->get('recuperar_cuenta', 'Home::recuperar_cuenta');
// Rutas del registro
$routes->get('/registro', 'usuario_Controller::create');
$routes->post('/enviar-form', 'usuario_Controller::formValidation');
// Rutas del login
$routes->get('/login', 'login_Controller');
$routes->post('/enviarLogin', 'login_Controller::auth');
$routes->get('/panel', 'panel_Controller::index', ['filter' => 'auth']);
$routes->get('/logout', 'login_Controller::logout');
$routes->get('/nuestros_cursos', 'cursos_Controller::index');
// Rutas de panel
$routes->group('', ['filter' => 'admin'], function ($routes) {
  $routes->get('/dashboard', 'crud_Controller::index');
  $routes->get('/create', 'crud_Controller::addUser');
  $routes->post('/store', 'crud_Controller::store');
  $routes->get('(:num)/edit/', 'crud_Controller::edit/$1');
  $routes->post('updateData/(:num)', 'crud_Controller::update/$1');
  $routes->get('(:num)/delete', 'crud_Controller::delete/$1');
  $routes->get('/activate', 'crud_Controller::indexActivate');
  $routes->get('activate/(:num)', 'crud_Controller::activate/$1');
});
// Usuario
$routes->group('', ['filter' => 'client'], function ($routes) {
  $routes->get('/user_Profile', 'usuario_Controller::indexUserProfile');
  $routes->get('(:num)/editProfile/', 'usuario_Controller::editProfile/$1');
  $routes->post('updateProfile/(:num)', 'usuario_Controller::updateProfile/$1');
});
