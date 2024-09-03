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
