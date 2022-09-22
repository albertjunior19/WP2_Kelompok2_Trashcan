<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['p/(:num)/(:any)/(:any)'] = 'home/single/$1/$2/$3';
$route['shops'] = 'home/all_pro';
$route['kategori/(:any)'] = 'home/tag/$1';
$route['kontak'] = 'home/kontak_kami';
$route['cari'] = 'home/cari_key';
$route['search'] = 'home/cari_s';
$route['account'] = 'home/akun';
$route['register'] = 'home/signup';
$route['login'] = 'home/sigin';
$route['logout'] = 'home/sigout';
$route['checkout'] = 'home/lanjut';
$route['getcost'] = 'home/getcost';
$route['cost'] = 'home/cost';
$route['send'] = 'home/send';
$route['method'] = 'home/met';
$route['change'] = 'home/ganti';
$route['blog'] = 'home/all_artikel';
$route['artikel/(:any)'] = 'home/single_blog/$1';
