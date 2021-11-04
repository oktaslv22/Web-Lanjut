<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', function(){
	$data = [
		"tittle" => "Blog - Home",
	];
	echo view('layouts/header', $data);
	echo view('layouts/navbar');
	echo view('v_home');
	echo view('layouts/footer');
});
$routes->get('/admin','Templating::index');
$routes->get('/admin/post','AdminPostsController::index');
$routes->get('/admin/post/create','AdminPostsController::create');
$routes->post('/admin/post/store','AdminPostsController::store');
$routes->get('/admin/post/delete/(:segment)','AdminPostsController::delete/$1');
$routes->get('/admin/post/edit/(:segment)','AdminPostsController::edit/$1');
$routes->post('/admin/post/update/(:segment)','AdminPostsController::update/$1');
$routes->get('/register','Register::register');
$routes->post('/saveRegister','Register::saveRegister');
// $routes->get('/biodata/(:alpha)/(:num)','Biodata::fungsiBaru/$1/$2');
$routes->get('/post', 'PostController::index');
$routes->get('/about' ,function(){
	$data = [
		"tittle" => "Blog - About",
	];
	echo view('layouts/header',$data);
	echo view('layouts/navbar');
	echo view('v_about');
	echo view('layouts/footer');
});
// $routes->get('/', 'Home::show');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}