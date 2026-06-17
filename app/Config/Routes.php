<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/accueil', 'Home::index');

$routes->get('/seed', 'SeedController::index');
$routes->get('/test', 'TestController::index');

$routes->post('/caisseSelect', 'Home::caisseSelect');
$routes->get('/achat', 'AchatController::index');
$routes->post('/achat/store', 'AchatController::store');
$routes->post('/achat/cloturer', 'AchatController::cloturer');

$routes->get('/', 'LoginController::index');
$routes->post('/login/connexion', 'LoginController::connexion');
