<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Movie');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

#Movie
$routes->get('video/(:num)/(:any)', 'Movie::video/$1/$2');
$routes->get('/series/(:num)/(:any)', 'Movie::series/$1/$2');
$routes->get('/series/(:num)/(:segment)/(:num)/(:any)', 'Movie::series/$1/$2/$3/$4');

$routes->get('player/(:num)/(:any)', 'Movie::player/$1/$2');
$routes->get('search/(:any)', 'Movie::video_search/$1');
$routes->get('popular', 'Movie::popular');
$routes->get('moviedata_popular', 'Movie::moviedata_popular');
$routes->get('category/(:num)/(:any)', 'Movie::video_bycate/$1/$2');
$routes->get('year/(:num)', 'Movie::video_byyear/$1');
$routes->get('contract', 'Movie::contract');

$routes->get('countview/(:num)', 'Movie::countView/$1');
$routes->post('save_requests', 'Movie::save_requests');
$routes->post('con_ads', 'Movie::con_ads');
$routes->post('saveReport', 'Movie::saveReport');

#Av
$routes->get('av', 'Av::index');
$routes->get('av/(:num)/(:any)', 'Av::video/$1/$2');
$routes->get('av/clips/(:num)/(:any)', 'Av::clips/$1/$2');

$routes->get('av/player/(:num)/(:any)', 'Av::player/$1/$2');
$routes->get('av/search/(:any)', 'Av::video_search/$1');
$routes->get('av/popular', 'MovAvie::popular');
$routes->get('av/category/(:num)/(:any)', 'Av::category/$1/$2');
$routes->get('av/genres/(:num)/(:any)', 'Av::video_genres/$1/$2');
$routes->get('av/contract', 'Av::contract');

$routes->get('countview/(:num)', 'Av::countView/$1');
$routes->post('save_requests', 'Av::save_requests');
$routes->post('con_ads', 'Av::con_ads');
$routes->post('saveReport', 'Av::saveReport');

#clip
$routes->get('clip', 'Av::clip');
$routes->get('clip/(:num)/(:any)', 'Av::video_clip/$1/$2');
$routes->get('clip/genres/(:num)/(:any)', 'Av::video_genres_clip/$1/$2');
$routes->get('clip/search/(:any)', 'Av::clip_search/$1');



/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
