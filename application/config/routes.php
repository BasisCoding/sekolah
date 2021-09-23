<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
	| -------------------------------------------------------------------------
	| URI ROUTING
	| -------------------------------------------------------------------------
	| This file lets you re-map URI requests to specific controller functions.
	|
	| Typically there is a one-to-one relationship between a URL string
	| and its corresponding controller class/method. The segments in a
	| URL normally follow this pattern:
	|
	|	example.com/class/method/id/
	|
	| In some instances, however, you may want to remap this relationship
	| so that a different class/function is called than the one
	| corresponding to the URL.
	|
	| Please see the user guide for complete details:
	|
	|	https://codeigniter.com/user_guide/general/routing.html
	|
	| -------------------------------------------------------------------------
	| RESERVED ROUTES
	| -------------------------------------------------------------------------
	|
	| There are three reserved routes:
	|
	|	$route['default_controller'] = 'welcome';
	|
	| This route indicates which controller class should be loaded if the
	| URI contains no data. In the above example, the "welcome" class
	| would be loaded.
	|
	|	$route['404_override'] = 'errors/page_missing';
	|
	| This route will tell the Router which controller/method to use if those
	| provided in the URL cannot be matched to a valid route.
	|
	|	$route['translate_uri_dashes'] = FALSE;
	|
	| This is not exactly a route, but allows you to automatically route
	| controller and method names that contain dashes. '-' isn't a valid
	| class or method name character, so it requires translation.
	| When you set this option to TRUE, it will replace ALL dashes in the
	| controller and method URI segments.
	|
	| Examples:	my-controller/index	-> my_controller/index
	|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'home';
$route['404_override'] = 'Error404';
$route['translate_uri_dashes'] = FALSE;

$route['login']		= 'Auth/LoginController';
	$route['Auth/login']		= 'Auth/LoginController/login';
$route['register']	= 'Auth/RegisterController';
	$route['Auth/register']	= 'Auth/RegisterController/register';
	$route['verification/(:any)']	= 'Auth/RegisterController/verification/$1';
	
$route['logout']	= 'Auth/LoginController/logout';
$route['password']	= 'Auth/LoginController/create_password';


// Route Super Admin
$route['superadmin']		= 'Dashboard/DashboardController';

$route['users-management']	= 'Management/UsersController/index';
	$route['users/getUserById']		= 'Management/UsersController/getUserById';
	$route['users/getUsers']		= 'Management/UsersController/getUsers';
	$route['users/addUsers']		= 'Management/UsersController/addUsers';
	$route['users/updateUsers']		= 'Management/UsersController/updateUsers';
	$route['users/deleteUsers']		= 'Management/UsersController/deleteUsers';

$route['menus-management']	= 'Management/MenusController/index';
	$route['menus/getMenus'] 		= 'Management/MenusController/getAjaxmenu';
	$route['menus/updateMenus'] 	= 'Management/MenusController/postAjaxmenu';
	$route['menus/addMenu'] 		= 'Management/MenusController/addMenu';
	$route['menus/updateMenuById'] 	= 'Management/MenusController/updateMenuById';
	$route['menus/deleteMenuById'] 	= 'Management/MenusController/deleteMenuById';
	
$route['roles-management']	= 'Management/RolesController/index';
	$route['roles/getRoles']		= 'Management/RolesController/getRoles';
	$route['roles/addRole']		= 'Management/RolesController/addRole';
	$route['roles/updateRole']		= 'Management/RolesController/updateRole';
	$route['roles/getRoleMenus']	= 'Management/RolesController/getRoleMenus';

$route['calon-siswa']	= 'PPDB/CalonSiswaController/index';
	$route['calon-siswa/getCalonSiswa']		= 'PPDB/CalonSiswaController/getCalonSiswa';

// Route Siswa
$route['siswa']		= 'Dashboard/DashboardController';

$route['profil-siswa'] = 'Siswa/Profil/index';