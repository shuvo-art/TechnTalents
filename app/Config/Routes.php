<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/loginCheck', 'Auth::loginCheck');
$routes->get('/logout', 'Auth::logout');

$routes->get('/questions', 'Questions::index');
$routes->get('/questions/add', 'Questions::add');
$routes->post('/questions/create', 'Questions::create');
$routes->get('/questions/delete/(:num)', 'Questions::delete/$1');
$routes->get('/questions/edit/(:num)', 'Questions::edit/$1');
$routes->post('/questions/update/(:num)', 'Questions::update/$1');
