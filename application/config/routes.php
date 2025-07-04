<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Auth
$route['<auth>login'] = 'auth/login';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/logout';
$route['waiting_approval'] = 'auth/waiting_approval';
$route['login_rejected'] = 'auth/login_rejected';

// Admin
$route['admin/login'] = 'admin/login';
$route['admin/logout'] = 'admin/logout';

$route['admin/approved_user'] = 'admin/approved_user';
$route['admin/manage_user'] = 'admin/manage_user';
$route['admin/approve_user/(:num)'] = 'admin/approve_user/$1';
$route['admin/reject_user/(:num)'] = 'admin/reject_user/$1';
$route['admin/set_pending/(:num)'] = 'admin/set_pending/$1';
