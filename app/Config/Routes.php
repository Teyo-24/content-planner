<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/landing', 'Home::page');

// file
$routes->get('serve-file/(:any)', 'ContentPlannerController::serve/$1');

// Hashtag Generator 
$routes->get('/hashtag', 'HashtaggeneratorController::index');
$routes->get('/generate-hashtags', 'HashtaggeneratorController::generate');

// calender
$routes->get('/', 'ContentPlannerController::calender');

// content Planner
$routes->get('/content-planner', 'ContentPlannerController::index');
$routes->post('/content-planner/add', 'ContentPlannerController::add');

// input data content
$routes->get('/input-data-content', 'ContentPlannerController::all_input');

// Sosial Media
$routes->post('/add_sosial_media', 'ContentPlannerController::add_sosial_media');
$routes->post('/update_sosial_media', 'ContentPlannerController::update_sosial_media');
$routes->post('/delete_sosial_media', 'ContentPlannerController::delete_sosial_media');

// Content Type
$routes->post('/add_content_type', 'ContentPlannerController::add_content_type');
$routes->post('/update_content_type', 'ContentPlannerController::update_content_type');
$routes->post('/delete_content_type', 'ContentPlannerController::delete_content_type');

// Content Pillar
$routes->post('/add_content_pillar', 'ContentPlannerController::add_content_pillar');
$routes->post('/update_content_pillar', 'ContentPlannerController::update_content_pillar');
$routes->post('/delete_content_pillar', 'ContentPlannerController::delete_content_pillar');

// Status
$routes->post('/add_status', 'ContentPlannerController::add_status');
$routes->post('/update_status', 'ContentPlannerController::update_status');
$routes->post('/delete_status', 'ContentPlannerController::delete_status');
