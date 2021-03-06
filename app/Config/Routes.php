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

$routes->match(['get','post'],'edit_post/(:num)', 'Community::edit_post/$1', ['filter' => 'auth']);
$routes->match(['get','post'],'edit_shared_post', 'Users::edit_shared_post', ['filter' => 'auth']);
$routes->match(['get','post'],'add_comment', 'Community::add_comment', ['filter' => 'auth']);
$routes->match(['get','post'],'add_comment_reply', 'Community::add_comment_reply', ['filter' => 'auth']);
$routes->match(['get','post'],'add_shared_comment', 'Users::add_shared_comment1', ['filter' => 'auth']);
$routes->match(['get','post'],'join_community', 'Community::join_community', ['filter' => 'auth']);
$routes->match(['get','post'],'report_post', 'Community::report_post', ['filter' => 'auth']);
$routes->match(['get','post'],'share_post', 'Community::share_post', ['filter' => 'auth']);
$routes->match(['get','post'],'save_post', 'Community::save_post', ['filter' => 'auth']);

$routes->get('delete-shared-post/(:num)', 'Community::delete_shared_post/$1', ['filter' => 'auth']);
$routes->match(['get','post'],'delete-post/(:num)/(:num)', 'Community::delete_post/$1/$2', ['filter' => 'auth']);
$routes->match(['get','post'],'update-post/(:num)', 'Community::update_post/$1', ['filter' => 'auth']);

// $routes->match(['get', 'post'], 'Search::search', ['filter' => 'auth']);

//search
// $routes->get('search/(:any)', 'Search::search', ['filter' => 'auth']);

// $routes->get('dashboard', 'Dashboard::index', ['filter' => 'auth']);

$routes->get('post', 'Users::post', ['filter' => 'auth']);
$routes->get('post-view', 'Users::post_view', ['filter' => 'auth']);

$routes->get('post-share/(:num)/(:num)', 'Users::post_share/$1/$2', ['filter' => 'auth']);
$routes->get('cafe', 'Users::cafe', ['filter' => 'auth']);
$routes->get('cartoon-novel', 'Users::cartoonnovel', ['filter' => 'auth']);
$routes->get('settings', 'Users::settings', ['filter' => 'auth']);


$routes->get('article', 'Users::article', ['filter' => 'auth']);
$routes->get('article-publish', 'Users::article_publish', ['filter' => 'auth']);

$routes->get('category-create', 'Community::categoryCreate', ['filter' => 'auth']);
$routes->get('cafe-style', 'Community::cafeStyle', ['filter' => 'auth']);
$routes->get('cafe-view', 'Community::cafeStyleView', ['filter' => 'auth']);
$routes->get('blog-style', 'Community::blogStyle', ['filter' => 'auth']);
$routes->get('cartoon-style', 'Community::cartoonStyle', ['filter' => 'auth']);
$routes->get('meeting-style', 'Community::meetingStyle', ['filter' => 'auth']);
$routes->get('settings-gallery', 'Community::settingsGallery', ['filter' => 'auth']);
$routes->get('gallery-settings', 'Community::settingsGallery1', ['filter' => 'auth']);
$routes->get('community-private/(:num)', 'Community::community_private/$1', ['filter' => 'auth']);
$routes->get('accept_user_community/(:num)', 'Community::accept_user_community/$1', ['filter' => 'auth']);
$routes->get('reject_user_community/(:num)', 'Community::reject_user_community/$1', ['filter' => 'auth']);

//community
$routes->get('community', 'Community::community', ['filter' => 'auth']);
$routes->get('manager-create-community', 'Community::manager_create_community', ['filter' => 'auth']);
// $routes->get('sub-category', 'Category::sub_category', ['filter' => 'auth']);


$routes->match(['get','post'],'user_join', 'Community::user_join');

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
// $routes->get('/emoticon-store', 'Emoticonstore::index', ['filter' => 'auth']); @lx
$routes->get('/store/emoticon', 'Emoticonstore::index', ['filter' => 'auth']);
$routes->get('/my-emoticon-store', 'Emoticonstore::my_emoticon_store', ['filter' => 'auth']);
$routes->get('/emoticon-store-list/(:num)', 'Emoticonstore::my_emoticon_store_list/$1', ['filter' => 'auth']);
$routes->get('/delete-single-sticker/(:num)/(:num)', 'Emoticonstore::delete_single_sticker/$1/$2', ['filter' => 'auth']);
$routes->get('/smile', 'Community::smile', ['filter' => 'auth']);


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


//managers
$routes->get('/manage-community/(:num)', 'Managers::dashboard/$1', ['filter' => 'auth']);
$routes->get('/manage-community/category/(:num)', 'Managers::category/$1', ['filter' => 'auth']);
$routes->get('/manage-community/users/(:num)', 'Managers::users/$1', ['filter' => 'auth']);
$routes->get('/manage-community/reported-posts/(:num)', 'Managers::reported_posts/$1', ['filter' => 'auth']);
$routes->get('/manage-community/community-settings/(:num)', 'Managers::community_settings/$1', ['filter' => 'auth']);
$routes->get('/manage-community/ip-management/(:num)', 'Managers::ip_management/$1', ['filter' => 'auth']);
$routes->get('/manage-community/block-list/(:num)', 'Managers::block_list/$1', ['filter' => 'auth']);

//managers functions


$routes->match(['get','post'],'remove_ac', 'Managers::remove_ac');
$routes->match(['get','post'],'ban_user', 'Managers::ban_user');
$routes->match(['get', 'post'], 'ac_settings', 'Managers::ac_settings');
$routes->match(['get', 'post'], 'block_settings', 'Managers::block_settings');
$routes->match(['get', 'post'], '/manager/save-community', 'Managers::save_community');
$routes->match(['get', 'post'], 'update_community_cover', 'Managers::update_community_cover');
$routes->match(['get', 'post'], 'community_questions', 'Managers::community_questions');
$routes->match(['get', 'post'], 'remove_community', 'Managers::remove_community');
$routes->match(['get','post'],'update_slug', 'Managers::update_slug');


$routes->get('/accept_user/(:num)/(:num)', 'Managers::accept_user/$1/$2', ['filter' => 'auth']);
$routes->get('/reject_user/(:num)/(:num)', 'Managers::reject_user/$1/$2', ['filter' => 'auth']);
$routes->get('/make_ac/(:num)/(:num)', 'Managers::make_ac/$1/$2', ['filter' => 'auth']);
$routes->get('/unblock/(:num)/(:num)', 'Managers::unblock/$1/$2', ['filter' => 'auth']);



//community
$routes->get('square/(:any)/(:num)/(:num)/(:num)', 'Community::square/$1/$2/$3/$4', ['filter' => 'auth']);

//community pages - lex
// $routes->get('square/(:any)/(:num)', 'Community::square/$1/$2', ['filter' => 'auth']);

// $routes->get('community/(:num)/(:num)', 'Community::community_join/$1/$2', ['filter' => 'auth']);
$routes->match(['get', 'post'], 'community/upload-picture', 'Community::upload_picture');
$routes->match(['get','post'],'user_save_community', 'Community::save_community', ['filter' => 'auth']);
$routes->get('home', 'Community::community_home', ['filter' => 'auth']);
$routes->get('communities', 'Community::communities', ['filter' => 'auth']);
$routes->get('community-manage/(:any)/(:num)/(:num)/(:num)', 'Community::manage_community/$1/$2/$3/$4', ['filter' => 'auth']);

$routes->match(['get','post'],'add_category', 'Community::add_category');

$routes->get('manage-members/(:any)/(:num)/(:num)/(:num)', 'Community::manage_members/$1/$2/$3/$4', ['filter' => 'auth']);
$routes->get('manage-reports/(:any)/(:num)/(:num)/(:num)', 'Community::manage_reports/$1/$2/$3/$4', ['filter' => 'auth']);
$routes->get('manage-blocked-users/(:any)/(:num)/(:num)/(:num)', 'Community::manage_blocked_users/$1/$2/$3/$4', ['filter' => 'auth']);
$routes->get('manage-settings/(:any)/(:num)/(:num)/(:num)', 'Community::manage_settings/$1/$2/$3/$4', ['filter' => 'auth']);
$routes->get('/delete_category/(:num)/(:num)', 'Community::delete_category/$1/$2', ['filter' => 'auth']);
$routes->match(['get','post'],'update_category', 'Community::update_category');
$routes->match(['get', 'post'], 'add_subclass', 'Community::add_subclass');
$routes->match(['get', 'post'], 'update_subclass', 'Community::update_subclass');
$routes->get('/delete_subclass/(:num)/(:num)', 'Community::delete_subclass/$1/$2', ['filter' => 'auth']);
$routes->get('post-view/(:num)', 'Community::post_view/$1', ['filter' => 'auth']);
$routes->get('post-edit/(:num)', 'Community::post_edit/$1', ['filter' => 'auth']);
$routes->match(['get','post'],'upvote', 'Community::upvote', ['filter' => 'auth']);
// $routes->get('/remove_ac/(:num)/(:num)', 'Managers::remove_ac/$1/$2', ['filter' => 'auth']);


/* ALEX'S ROUTES */
$routes->match(['get','post'],'community/search', 'Community::searchCommunity');


// notifications

$routes->match(['get','post'],'notifications/get/(:any)/(:any)', 'Notifications::selectNotifications/$1/$2');
$routes->match(['get', 'post'], 'notifications/add', 'Notifications::addNotification');


// policy pages routes
$routes->get('disclaimer-for-intelectual-property', 'PolicyController::disclaimerForIntelectualProperty');
$routes->get('terms-and-conditions', 'PolicyController::termsAndConditions');
$routes->get('gdpr-privacy-notice', 'PolicyController::gdprPrivacyNotice');
$routes->get('privacy-policy', 'PolicyController::privacyPolicy');
$routes->get('cookie-policy', 'PolicyController::cookiePolicy');
$routes->get('ccpa-for-nodaq', 'PolicyController::ccpaForNodaq');

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
