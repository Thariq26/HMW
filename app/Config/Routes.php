<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->setAutoRoute(true);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
#$routes->get('/', 'Home::index');
$routes->get('dashboard', 'dashboard::index');
$routes->get('/dashboard/ruangan', 'dashboard::ruagan');
$routes->get('ruangan/create', 'ruangan::create');
$routes->get('ruangan/store', 'ruangan::store');
$routes->get('ruangan/edit/(:num)', 'ruangan::edit/$1');
$routes->get('ruangan/update/(:num)', 'ruangan::update/$1');
$routes->get('ruangan/delete/(:num)', 'ruangan::delete/$1');
$routes->get('ruangan/update_status/(:num)/(:any)', 'Ruangan::update_status/$1/$2');



$routes->get('/roomcategory/create', 'roomcategory::create');
$routes->get('/roomcategory/store', 'roomcategory::store');
$routes->get('roomcategory/edit/(:num)', 'roomcategory::edit/$1');
$routes->get('roomcategory/update/(:num)', 'roomcategory::update/$1');
$routes->get('roomcategory/delete/(:num)', 'roomcategory::delete/$1');


$routes->get('/cancelcategory/create', 'cancelcategory::create');
$routes->get('/cancelcategory/store', 'cancelcategory::store');
$routes->get('cancelcategory/edit/(:num)', 'cancelcategory::edit/$1');
$routes->get('cancelcategory/update/(:num)', 'cancelcategory::update/$1');
$routes->get('cancelcategory/delete/(:num)', 'cancelcategory::delete/$1');


$routes->get('/food/create', 'food::create');
$routes->get('/food/store', 'food::store');
$routes->get('food/edit/(:num)', 'food::edit/$1');
$routes->get('food/update/(:num)', 'food::update/$1');
$routes->get('food/delete/(:num)', 'food::delete/$1');


$routes->get('/roompricings/create', 'roompricings::create');
$routes->get('/roompricings/store', 'roompricings::store');
$routes->get('/roompricings/edit/(:num)', 'roompricings::edit/$1');
$routes->get('/roompricings/update/(:num)', 'roompricings::update/$1');
$routes->get('/roompricings/delete/(:num)', 'roompricings::delete/$1');
$routes->get('/roompricings/view/(:num)', 'roompricings::view/$1');

//Routes Registration
$routes->get('/register', 'Register::index');
$routes->post('/register/process', 'Register::process');
$routes->post('/register/login', 'Register::login');

//Routes Login
$routes->post('/login', 'login::index');
$routes->post('/login/process', 'login::process');
$routes->post('/login/logout', 'login::logout');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
