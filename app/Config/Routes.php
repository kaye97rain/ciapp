<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// $routes->get('office', 'OfficeController::index');
$routes->resource('offices',['controller'=> 'OfficeController']);
$routes->resource('tickets',['controller'=> 'TicketController']);

service('auth')->routes($routes);
