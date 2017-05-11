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
$route['default_controller'] = 'welcome';
$route['index'] = 'Welcome/index';
$route['aboutus'] = 'Welcome/about';
$route['privacy-policy'] = "Welcome/privacy";
$route['terms-of-use'] = "Welcome/terms";
$route['contact'] = "Welcome/contact";

// Smighties TV
$route["smighties-tv"] = "Tv/index";
$route["smighties-music"] = "Tv/music";

// Smighties Fun Space
$route["games"] = "Fun/games";
$route["smighty-friend"] = "Fun/friend";
$route["facebook-smighty-badge"] = "Fun/avatar";
$route["smighty-art"] = "Fun/smighty_art";
$route["smightyze"] = "Fun/smightyze";

// Smighties Pedia
$route["smightypedia"] = "Welcome/pedia";
$route["villains"] = "Welcome/villains";

// Downloads
$route["downloads/wallpapers"] = "Downloads/wallpapers";
$route["downloads/posters"] = "Downloads/posters";
$route["downloads/stickers"] = "Downloads/stickers";

// News
$route["news"] = "News/index";
$route["news/(:any)"] = "News/details/$1";

// Blog
$route["blog"] = "Blog/index";
$route["blog/(:any)"] = "Blog/details/$1";

// Parents
$route["parents"] = "Parents/index";

// Async function calls
$route['async/smighties'] = "Async/get_smighties";
$route['async/smighty-profile/(:any)'] = "Async/smighty_profile/$1";
$route['async/avatar'] = "Async/generate_avatar";
$route['async/smighty-friend'] = "Async/smighty_friend";

$route['webcp'] = 'Administrator/Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
