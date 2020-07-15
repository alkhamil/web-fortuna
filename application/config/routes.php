<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['form-registration'] = 'home/form_registration';
$route['login'] = 'login/index';
$route['login-proses'] = 'login/login_proses';
$route['logout'] = 'login/logout';
$route['registration'] = 'home/registration';
$route['feedback'] = 'home/feedback';
$route['ketersediaan'] = 'home/ketersediaan';
$route['pilihkamar/(:num)'] = 'home/pilihkamar/$1';
$route['reservation'] = 'home/reservation';
$route['my-reservation'] = 'home/my_reservation';
$route['form-upload-pembayaran'] = 'home/form_upload_pembayaran';
$route['upload-pembayaran'] = 'home/upload_pembayaran';


$route['dashboard'] = 'dashboard/index';
$route['grafik'] = 'dashboard/grafik';

$route['tipekamar'] = 'tipekamar/index';
$route['tipekamar/tambah'] = 'tipekamar/tipekamar_tambah';

$route['kamar'] = 'kamar/index';
$route['kamar/tambah'] = 'kamar/kamar_tambah';
$route['kamar/edit'] = 'kamar/kamar_edit';
$route['kamar/hapus/(:num)'] = 'kamar/kamar_hapus/$1';

$route['pemesan'] = 'pemesan/index';


$route['transaksi'] = 'transaksi/index';
$route['transaksi/kirim'] = 'transaksi/send';
$route['transaksi/approve/(:num)'] = 'transaksi/approve/$1';
$route['transaksi/hapus/(:num)'] = 'transaksi/hapus/$1';

$route['pemesanan'] = 'pemesanan/index';
$route['pemesanan/checkout/(:num)'] = 'pemesanan/checkout/$1';
$route['pemesanan/hapus/(:num)'] = 'pemesanan/hapus/$1';

$route['laporan'] = 'laporan/index';
$route['laporan/cari'] = 'laporan/cari';
$route['laporan/cetak-pdf/(:any)/(:any)'] = 'laporan/cetak_pdf/$1/$2';

$route['admin'] = 'admin/index';
$route['admin/tambah'] = 'admin/admin_tambah';
$route['admin/edit'] = 'admin/admin_edit';
$route['admin/hapus/(:num)'] = 'admin/admin_hapus/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
