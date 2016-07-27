<?php
return [

/**
 * controller: Company
 */
	'GET admin/company' => 'admin/company/index',
	'GET admin/companies' => 'admin/company/index',
	'GET admin/company/<id:\d+>' => 'admin/company/view',
	'POST admin/company' => 'admin/company/create',
	'PUT admin/company/<id:\d+>' => 'admin/company/update',
	'DELETE admin/company/<id:\d+>' => 'admin/company/delete',
/**
 * controller: Project
 */
	'GET admin/projects' => 'admin/project/index',
	'GET admin/project' => 'admin/project/index',
	'GET admin/project/<id:\d+>' => 'admin/project/view',
	'POST admin/project' => 'admin/project/create',
	'PUT admin/project/<id:\d+>' => 'admin/project/update',
	'DELETE admin/project/<id:\d+>' => 'admin/project/delete',

/**
 * controller: User
 */
	'GET admin/users' => 'admin/user/index',
	'GET admin/user' => 'admin/user/index',
	'GET admin/user/<id:\d+>' => 'admin/user/view',
	'POST admin/user' => 'admin/user/create',
	'PUT admin/user/<id:\d+>' => 'admin/user/update',
	'DELETE admin/user/<id:\d+>' => 'admin/user/delete',

];