<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Auth routes
$route['login'] = 'auth';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/logout';
$route['waiting_approval'] = 'auth/waiting_approval';
$route['login_rejected'] = 'auth/login_rejected';

// Admin routes
$route['admin/dashboard'] = 'admin/dashboard';
$route['admin/approve_user/(:num)'] = 'admin/approve_user/$1';
$route['admin/reject_user/(:num)'] = 'admin/reject_user/$1';

// User routes
$route['user/dashboard'] = 'user/dashboard';

// admin login
$route['admin/login'] = 'admin/login';
