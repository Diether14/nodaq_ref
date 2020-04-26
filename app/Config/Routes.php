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
$routes->setDefaultController('Users');
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
$routes->get('/', 'Users::index', ['filter' => 'noauth']);
$routes->get('logout', 'Users::logout');
$routes->match(['get','post'],'register', 'Users::register', ['filter' => 'noauth']);
$routes->match(['get','post'],'login', 'Users::login', ['filter' => 'noauth']);
$routes->match(['get','post'],'profile', 'Users::profile', ['filter' => 'auth']);
// $routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('blog', 'Users::blog', ['filter' => 'auth']);
$routes->get('cafe', 'Users::cafe', ['filter' => 'auth']);
$routes->get('cartoon-novel', 'Users::cartoonnovel', ['filter' => 'auth']);

$routes->get('article', 'Users::article', ['filter' => 'auth']);
$routes->get('article-publish', 'Users::article_publish', ['filter' => 'auth']);

$routes->get('category-create', 'Category::categoryCreate', ['filter' => 'auth']);
$routes->get('cafe-style', 'Category::cafeStyle', ['filter' => 'auth']);

// $routes->group('users', function($routes)
// {
//         // $routes->add('users/create', 'Crud\Users::create');
//         $routes->add('test', 'UserInterface\Users::index');
//         // $routes->add('users/test', 'Crud\Users::test');
        
// });

// $routes->group('crud/ajax', function($routes)
// {
//         $routes->add('book', 'Crud\Ajax\Book::index');
        
// });

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
