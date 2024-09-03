<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/landing', 'Home::page');

// Hashtag Generator 
$routes->get('/hashtag', 'HashtaggeneratorController::index');
$routes->get('/generate-hashtags', 'HashtaggeneratorController::generate');

// content Planner
$routes->get('/content-planner', 'ContentPlannerController::index');
$routes->post('/content-planner/add', 'ContentPlannerController::add');

// input data content
$routes->get('/input-data-content', 'ContentPlannerController::all_input');

// Sosial Media
$routes->post('/update_sosial_media', 'ContentPlannerController::update_sosial_media');
