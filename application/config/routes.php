<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'Welcome/login';
$route['logout'] = 'Welcome/logout';

$route['superadmin/dashboard'] = 'SuperAdminController/dashboard';
$route['admin/dashboard'] = 'AdminController/dashboard';
$route['user/dashboard'] = 'UserController/dashboard';
$route['getUsers'] = 'Welcome/getUsers';
$route['superadmin/addUser'] = 'SuperAdminController/addUser';
$route['admin/addUser'] = 'AdminController/addUser';
$route['addUser'] = 'Welcome/addUser';
$route['editUser/(:any)'] = 'Welcome/editUser/$1';
$route['deleteUser'] = 'Welcome/deleteUser';
$route['actionUser'] = 'Welcome/actionUser';
$route['user/register'] = 'UserController/register';
$route['user/addUser'] = 'Welcome/register';

//for task 2 use this route
$route['getPageUsers'] = 'Pagination';
$route['getPageUsers/(:num)'] = 'Pagination/index/$1';