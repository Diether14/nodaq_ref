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
$routes->get('/', 'Users::login', ['filter' => 'noauth']);
$routes->get('logout', 'Users::logout');
$routes->match(['get','post'],'register', 'Users::register', ['filter' => 'noauth']);
$routes->match(['get','post'],'login', 'Users::login', ['filter' => 'noauth']);
$routes->match(['get','post'],'profile', 'Users::profile', ['filter' => 'auth']);
$routes->get('/view-profile/(:num)', 'Users::view_profile/$1', ['filter' => 'auth']);
$routes->match(['get','post'],'settings', 'Users::settings', ['filter' => 'auth']);
$routes->match(['get','post'],'update_profile', 'Users::update_profile', ['filter' => 'auth']);
$routes->match(['get','post'],'update_mode', 'Users::update_mode', ['filter' => 'auth']);
$routes->match(['get','post'],'update_profile_info', 'Users::update_profile_info', ['filter' => 'auth']);
$routes->match(['get','post'],'save_post', 'Users::save_post', ['filter' => 'auth']);
$routes->match(['get','post'],'edit_post', 'Users::edit_post', ['filter' => 'auth']);
$routes->match(['get','post'],'edit_shared_post', 'Users::edit_shared_post', ['filter' => 'auth']);
$routes->match(['get','post'],'add_comment', 'Users::add_comment', ['filter' => 'auth']);
$routes->match(['get','post'],'add_shared_comment', 'Users::add_shared_comment', ['filter' => 'auth']);
$routes->match(['get','post'],'join_community', 'Category::join_community', ['filter' => 'auth']);
$routes->match(['get','post'],'report_post', 'Category::report_post', ['filter' => 'auth']);
$routes->match(['get','post'],'share_post', 'Category::share_post', ['filter' => 'auth']);
$routes->match(['get','post'],'add_upvote', 'Category::add_upvote', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'add_devote', 'Category::add_devote', ['filter' => 'auth']);

$routes->get('delete-shared-post/(:num)', 'Category::delete_shared_post/$1', ['filter' => 'auth']);
$routes->get('delete-post/(:num)', 'Category::delete_post/$1', ['filter' => 'auth']);

// $routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('dashboard', 'Users::dashboard', ['filter' => 'auth']);
$routes->get('post', 'Users::post', ['filter' => 'auth']);
$routes->get('post-view', 'Users::post_view', ['filter' => 'auth']);
$routes->get('post-view/(:num)', 'Users::post_view/$1', ['filter' => 'auth']);
$routes->get('post-share/(:num)/(:num)', 'Users::post_share/$1/$2', ['filter' => 'auth']);
$routes->get('cafe', 'Users::cafe', ['filter' => 'auth']);
$routes->get('cartoon-novel', 'Users::cartoonnovel', ['filter' => 'auth']);
$routes->get('settings', 'Users::settings', ['filter' => 'auth']);


$routes->get('article', 'Users::article', ['filter' => 'auth']);
$routes->get('article-publish', 'Users::article_publish', ['filter' => 'auth']);

$routes->get('category-create', 'Category::categoryCreate', ['filter' => 'auth']);
$routes->get('cafe-style', 'Category::cafeStyle', ['filter' => 'auth']);
$routes->get('cafe-view', 'Category::cafeStyleView', ['filter' => 'auth']);
$routes->get('blog-style', 'Category::blogStyle', ['filter' => 'auth']);
$routes->get('cartoon-style', 'Category::cartoonStyle', ['filter' => 'auth']);
$routes->get('meeting-style', 'Category::meetingStyle', ['filter' => 'auth']);
$routes->get('settings-gallery', 'Category::settingsGallery', ['filter' => 'auth']);
$routes->get('gallery-settings', 'Category::settingsGallery1', ['filter' => 'auth']);
$routes->get('community-join/(:num)', 'Category::community_join/$1', ['filter' => 'auth']);


//community
$routes->get('community', 'Category::community', ['filter' => 'auth']);
$routes->match(['get','post'],'user_save_community', 'Category::save_community', ['filter' => 'auth']);


//administrator
$routes->get('/admin', 'Admin::index', ['filter' => 'auth']);
$routes->get('/create-community', 'Admin::create_community', ['filter' => 'auth']);
$routes->get('/community-table', 'Admin::community_table', ['filter' => 'auth']);

$routes->get('/vote-list/(:num)', 'Admin::vote_list/$1', ['filter' => 'auth']);
$routes->get('/post-list/(:num)', 'Admin::post_list/$1', ['filter' => 'auth']);



$routes->get('/reports-list', 'Admin::reports_list', ['filter' => 'auth']);
$routes->get('/users-list', 'Admin::users_list', ['filter' => 'auth']);
$routes->get('/community-users/(:num)', 'Admin::community_users/$1', ['filter' => 'auth']);
$routes->get('/community-admins', 'Admin::community_admins', ['filter' => 'auth']);
// $routes->get('/community-create-admin', 'Admin::community_create_admin', ['filter' => 'auth']);
$routes->match(['get','post'],'community-create-admin', 'Admin::community_create_admin', ['filter' => 'auth']);
// $routes->match(['get','post'],'save_community', 'Admin::save_community', ['filter' => 'auth']);

//emoticon store
$routes->get('/emoticon-store', 'Emoticonstore::index', ['filter' => 'auth']);
$routes->get('/my-emoticon-store', 'Emoticonstore::my_emoticon_store', ['filter' => 'auth']);
$routes->get('/emoticon-store-list/(:num)', 'Emoticonstore::my_emoticon_store_list/$1', ['filter' => 'auth']);
$routes->get('/delete-single-sticker/(:num)/(:num)', 'Emoticonstore::delete_single_sticker/$1/$2', ['filter' => 'auth']);


//admin functions
$routes->match(['get','post'],'save_community', 'Admin::save_community', ['filter' => 'auth']);
$routes->match(['get','post'],'update_community', 'Admin::update_community', ['filter' => 'auth']);
$routes->match(['get','post'],'update_community_photo', 'Admin::update_community_photo', ['filter' => 'auth']);
$routes->get('delete_community/(:num)', 'Admin::delete_community/$1', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'community_ban_user', 'Admin::community_ban_user', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'update_admin_user', 'Admin::update_admin_user', ['filter' => 'auth']);
$routes->get('/add_assistant_manager/(:num)/(:num)', 'Admin::add_assistant_manager/$1/$2', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'community_ban_post', 'Admin::community_ban_post', ['filter' => 'auth']);

//picture
$routes->match(['get','post'],'change_profile', 'Users::change_profile');
$routes->match(['get','post'],'change_cover', 'Users::change_cover');
$routes->match(['get','post'],'add_sticker', 'Emoticonstore::add_sticker');
$routes->match(['get','post'],'add_multiple_sticker', 'Emoticonstore::add_multiple_sticker');
$routes->match(['get','post'],'update_sticker', 'Emoticonstore::update_sticker');

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
