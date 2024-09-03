<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/content-planner', 'ContentPlannerController::index');
$routes->post('/content-planner/add', 'ContentPlannerController::add');

$routes->get('/input-data-content', 'ContentPlannerController::all_input');

$routes->post('/update_sosial_media', 'ContentPlannerController::update_sosial_media');