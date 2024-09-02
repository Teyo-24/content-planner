<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/content-planner', 'ContentPlannerController::index');
$routes->post('/content-planner/add', 'ContentPlannerController::add');