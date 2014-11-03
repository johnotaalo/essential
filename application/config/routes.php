<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "analytics";
$route['404_override'] = '';

// MNCH Routes
$route['mnch/home']='analytics/reporting/index';
$route['404_override'] = '';

$route['mnch/takesurvey']='survey/active_survey';#active survey url
$route['mnch/assessment']='survey/index'; #active survey home page url
$route['mnch/analytics']='analytics/active_results/';#active results url

$route['mnch/session/new']='auth/go';#log in url
$route['mnch/session/close']='auth/logout';#log out url

#Admin Routes
$route['admin']= 'c_admin/index';
$route['firepad']= 'c_admin/firepad';

# IMCI Routes
$route['imci/home'] = 'home';

$route['imci/account/create'] = 'account/create';
$route['imci/account/access'] = 'account/access';
$route['imci/account/forgot_password'] = 'account/forgot_password';

$route['imci/account'] = 'account';
$route['imci/account/profile'] = 'account/profile';
$route['imci/account/edit/:num'] = 'account/edit/:num';
$route['imci/account/logout'] = 'account/logout';

$route['imci/learn'] = 'learn';
$route['imci/learn/content/read'] = 'learn/content/read';
$route['imci/learn/content/see'] = 'learn/content/see';

$route['imci/test'] = 'test';

$route['imci/test'] = 'test';
$route['imci/test/practice/:num'] = 'test/practice/:num';
$route['imci/test/start/:num'] = 'test/start/:num';

$route['imci/manage'] = 'manage';
$route['imci/manage/users/admins/view'] = 'manage/users/admins/view';
$route['imci/manage/users/trainees/view'] = 'manage/users/trainees/view';
$route['imci/manage/media/pictures/view'] = 'manage/media/pictures/view';
$route['imci/manage/media/videos/view'] = 'manage/media/videos/view';
$route['imci/manage/exams/view'] = 'manage/exams/view';
$route['imci/manage/users/perfomance/view'] = 'manage/users/perfomance/view';

$route['imci/manage/upload/admin'] = 'manage/upload/admin';
$route['imci/manage/upload/media'] = 'manage/upload/media';
$route['imci/manage/upload/material'] = 'manage/upload/material';
$route['imci/manage/upload/exam'] = 'manage/upload/exam';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
