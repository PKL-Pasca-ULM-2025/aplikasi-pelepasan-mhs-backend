<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
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

service('auth')->routes($routes, ['namespace' => '\App\Controllers\Auth']);
$routes->get('/', 'Home::index');

$routes->get('upload', 'UploadController::index');
$routes->post('upload', 'UploadController::upload');

// $routes->addRedirect('login', 'admin/login');


$routes->group('admin', static function ($routes) {
    $routes->presenter('alumni-terbaik-ulm', ['controller' => 'Admin\AlumniTerbaikULMPresenter']);
    $routes->presenter('alumni-predikat-pujian-ulm', ['controller' => 'Admin\AlumniPredikatPujianULMPresenter']);
    $routes->presenter('on-going-pegawai-pelajar', ['controller' => 'Admin\OnGoingPegawaiPelajarPresenter']);
    $routes->presenter('calon-pegawai-pelajar', ['controller' => 'Admin\CalonPegawaiPelajarPresenter']);
    $routes->presenter('pegawai-mitra-kerja', ['controller' => 'Admin\PegawaiMitraKerjaPresenter']);
    $routes->get('user', 'Auth\UserController::index');
    $routes->get('user/create', 'Auth\UserController::createView');
    $routes->post('user', 'Auth\UserController::create');
});

$routes->group('api', static function ($routes) {
    $routes->resource('pegawai-mitra-kerja', ['controller' => 'Api\PegawaiMitraKerjaController', 'only' => ['index', 'create']]);
    $routes->resource('calon-pegawai-pelajar', ['controller' => 'Api\CalonPegawaiPelajarController', 'only' => ['index', 'create']]);
    $routes->resource('on-going-pegawai-pelajar', ['controller' => 'Api\OnGoingPegawaiPelajarController', 'only' => ['index', 'create']]);
    $routes->resource('alumni-predikat-pujian-ulm', ['controller' => 'Api\AlumniPredikatPujianULMController', 'only' => ['index', 'create']]);
    $routes->resource('alumni-terbaik-ulm', ['controller' => 'Api\AlumniTerbaikULMController', 'only' => ['index', 'create']]);
    $routes->post('auth/jwt', 'Auth\LoginController::jwtLogin');
});

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}