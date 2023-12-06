<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'Welcome/login';

$route['superadmin/dashboard'] = 'SuperAdminController/dashboard';
$route['getUsers'] = 'Welcome/getUsers';
$route['superadmin/addUser'] = 'SuperAdminController/addUser';
$route['addUser'] = 'Welcome/addUser';
$route['deleteUser'] = 'Welcome/deleteUser';