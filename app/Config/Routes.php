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
$routes->set404Override();
$routes->setAutoRoute(true);
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
$routes->get('/', 'Web::home');
$routes->get('/profile', 'Web::profile');
$routes->get('/sambutan', 'Web::sambutan');
$routes->get('/visimisi', 'Web::visimisi');
$routes->get('/fasilitas', 'Web::fasilitas');
$routes->get('/ekstrakulikuler', 'Web::ekstrakulikuler');
$routes->get('/news', 'Web::news');
$routes->get('/pengumuman', 'Web::pengumuman');
$routes->get('/prestasi', 'Web::prestasi');
$routes->get('/contact', 'Web::contact');
$routes->get('/foto', 'Web::foto');
$routes->get('/vidio', 'Web::vidio');
$routes->get('/gtk', 'Web::gtk');
$routes->get('/ppdb', 'Web::ppdb');
$routes->get('/news/(:segment)', 'Web::newsdetail/$1');

// $routes->get('/admin', 'admin::home');
$routes->get('/admin', 'admin::home', ['filter' => 'role:admin,super admin,user']);

$routes->get('/admin/news', 'admin::news', ['filter' => 'role:admin,super admin']);
$routes->get('/admin/addNews', 'admin::addNews', ['filter' => 'role:admin,super admin']);
$routes->get('/admin/editNews/(:segment)', 'admin::editNews/$1', ['filter' => 'role:admin,super admin']);
$routes->delete('/admin/news/(:num)', 'admin::deleteNews/$1', ['filter' => 'role:admin,super admin']);
$routes->get('/admin/news/(:any)', 'admin::detailNews/$1', ['filter' => 'role:admin,super admin']);

$routes->get('/admin/foto', 'admin::foto', ['filter' => 'role:admin,super admin']);
$routes->get('/admin/addFoto', 'admin::addFoto', ['filter' => 'role:admin,super admin']);
$routes->get('/admin/editFoto/(:segment)', 'admin::editFoto/$1', ['filter' => 'role:admin,super admin']);
$routes->delete('/admin/foto/(:num)', 'admin::deleteFoto/$1', ['filter' => 'role:admin,super admin']);

$routes->get('/admin/banner', 'admin::banner', ['filter' => 'role:admin,super admin']);

$routes->get('/admin/pesan', 'admin::pesan', ['filter' => 'role:super admin']);
$routes->get('/admin/editPesan/(:segment)', 'admin::editPesan/$1', ['filter' => 'role:admin,super admin']);


$routes->get('/admin/adminList', 'admin::adminList', ['filter' => 'role:super admin']);
$routes->get('/admin/userList', 'admin::userList', ['filter' => 'role:super admin']);
$routes->get('/admin/addAdmin', 'admin::addAdmin', ['filter' => 'role:super admin']);
$routes->get('/admin/userList/(:segment)', 'admin::editAdmin/$1', ['filter' => 'role:super admin']);
$routes->delete('/admin/userList/(:num)', 'admin::deleteAdmin/$1', ['filter' => 'role:super admin']);
$routes->delete('/admin/resetPassword/(:num)', 'admin::resetPassword/$1', ['filter' => 'role:super admin']);
$routes->delete('/admin/timeLine/(:num)', 'admin::deleteTimeine/$1', ['filter' => 'role:super admin']);
$routes->get('/admin/timeLine', 'admin::timeLine', ['filter' => 'role:super admin']);

$routes->get('/user', 'user::index', ['filter' => 'role:user']);
$routes->get('/user/myProfile/(:any)', 'user::myProfile/$1', ['filter' => 'role:user,admin,super admin']);

$routes->get('/user/formulir/(:any)', 'user::formulir/$1', ['filter' => 'role:user']);



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
