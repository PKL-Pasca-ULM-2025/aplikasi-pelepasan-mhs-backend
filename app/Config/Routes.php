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
$routes->get('/', 'Home::index');

service('auth')->routes($routes);

$routes->get('upload', 'UploadController::index');
$routes->post('upload', 'UploadController::upload');

$routes->resource('api/pegawai-mitra-kerja', ['controller' => 'PegawaiMitraKerjaController', 'except' => ['new', 'show', 'edit', 'delete']]);
$routes->presenter('pegawai-mitra-kerja', ['controller' => 'PegawaiMitraKerjaPresenter']);

$routes->resource('api/calon-pegawai-pelajar', ['controller' => 'CalonPegawaiPelajarController', 'except' => ['new', 'show', 'edit', 'delete']]);
$routes->presenter('calon-pegawai-pelajar', ['controller' => 'CalonPegawaiPelajarPresenter']);

$routes->resource('api/on-going-pegawai-pelajar', ['controller' => 'OnGoingPegawaiPelajarController', 'except' => ['new', 'show', 'edit', 'delete']]);
$routes->presenter('on-going-pegawai-pelajar', ['controller' => 'OnGoingPegawaiPelajarPresenter']);

$routes->resource('api/alumni-predikat-pujian-ulm', ['controller' => 'AlumniPredikatPujianULMController', 'except' => ['new', 'edit', 'delete', 'show']]);
$routes->presenter('alumni-predikat-pujian-ulm', ['controller' => 'AlumniPredikatPujianULMPresenter']);

$routes->resource('api/alumni-terbaik-ulm', ['controller' => 'AlumniTerbaikULMController', 'except' => ['new', 'edit', 'delete', 'show']]);
$routes->presenter('alumni-terbaik-ulm', ['controller' => 'AlumniTerbaikULMPresenter']);

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