<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * ---------------------------------------------------------------
 * Konfigurasi Rute Aplikasi
 * ---------------------------------------------------------------
 *
 * File ini mendefinisikan semua rute untuk aplikasi, termasuk:
 * 
 * - Rute autentikasi menggunakan layanan 'auth'.
 * - Rute halaman utama.
 * - Rute upload file (GET untuk form, POST untuk aksi upload).
 * 
 * Grup Admin:
 * - Rute presenter resourceful untuk mengelola data alumni dan pegawai/mahasiswa.
 * - Rute manajemen user (daftar, tampilan pembuatan, dan aksi pembuatan).
 * 
 * Grup API:
 * - Rute resource RESTful untuk data pegawai/mitra kerja dan alumni (hanya index dan create).
 * - Endpoint autentikasi JWT untuk login API.
 *
 * Setiap grup menggunakan namespace dan controller yang sesuai untuk organisasi.
 */
service('auth')->routes($routes, ['namespace' => '\App\Controllers\Auth']);
$routes->get('/', 'Home::index');

$routes->get('upload', 'UploadController::index');
$routes->post('upload', 'UploadController::upload');

$routes->group('admin', ['filter' => 'session'], static function ($routes) {
    $routes->presenter('alumni-terbaik-ulm', ['controller' => 'Admin\AlumniTerbaikULMPresenter']);
    $routes->presenter('alumni-predikat-pujian-ulm', ['controller' => 'Admin\AlumniPredikatPujianULMPresenter']);
    $routes->presenter('on-going-pegawai-pelajar', ['controller' => 'Admin\OnGoingPegawaiPelajarPresenter']);
    $routes->presenter('calon-pegawai-pelajar', ['controller' => 'Admin\CalonPegawaiPelajarPresenter']);
    $routes->presenter('pegawai-mitra-kerja', ['controller' => 'Admin\PegawaiMitraKerjaPresenter']);
    $routes->get('user', 'Auth\UserController::index');
    $routes->get('user/create', 'Auth\UserController::createView');
    $routes->post('user', 'Auth\UserController::create');
});

$routes->group('api', ['filter' => 'jwt'], static function ($routes) {
    $routes->resource('pegawai-mitra-kerja', ['controller' => 'Api\PegawaiMitraKerjaController', 'only' => ['index', 'create']]);
    $routes->resource('calon-pegawai-pelajar', ['controller' => 'Api\CalonPegawaiPelajarController', 'only' => ['index', 'create']]);
    $routes->resource('on-going-pegawai-pelajar', ['controller' => 'Api\OnGoingPegawaiPelajarController', 'only' => ['index', 'create']]);
    $routes->resource('alumni-predikat-pujian-ulm', ['controller' => 'Api\AlumniPredikatPujianULMController', 'only' => ['index', 'create']]);
    $routes->resource('alumni-terbaik-ulm', ['controller' => 'Api\AlumniTerbaikULMController', 'only' => ['index', 'create']]);
});

$routes->post('auth/jwt', 'Auth\LoginController::jwtLogin');

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