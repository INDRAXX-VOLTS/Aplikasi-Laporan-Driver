<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index'); // Assuming 'Login' is your controller and 'index' is the method for the home page
$routes->post('/login', 'Login::login_action'); // Assuming 'Login' is your controller and 'login_action' is the method for processing the login
$routes->get('/home', 'HomeController::index'); // Assuming 'LayoutController' is the controller for the layout page

$routes->get('daftarkendaraan/daftar_kendaraan', 'Daftarkendaraan::daftar_kendaraan');
$routes->post('add_kendaraan', 'Daftarkendaraan::add_kendaraan'); 
$routes->post('edit_kendaraan', 'Daftarkendaraan::edit_kendaraan'); 
$routes->post('delete_kendaraan', 'Daftarkendaraan::delete_kendaraan'); 
$routes->get('tambah_daftar_kendaraan', 'Daftarkendaraan::tambah_daftar');

$routes->get('driver/driver', 'Driver::driver');
$routes->post('add_driver', 'Driver::add_driver'); 
$routes->post('edit_driver', 'Driver::edit_driver'); 
$routes->post('delete_driver', 'Driver::delete_driver'); 
$routes->get('tambah_driver', 'Driver::tambah_driver');

$routes->get('laporan/laporan', 'Laporan::laporan');
$routes->post('add_laporan', 'Laporan::add_laporan'); 
$routes->post('edit_laporan', 'Laporan::edit_laporan'); 
$routes->post('delete_laporan', 'Laporan::delete_laporan'); 
$routes->get('tambah_laporan', 'Laporan::tambah_laporan');

$routes->get('/logout', 'Login::logout');