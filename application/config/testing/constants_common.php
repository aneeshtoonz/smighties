<?php
/*
|==========================================================================
| 						Website Settings
|==========================================================================
*/
define("SITE_NAME", "Toonz Academy");
define("SITE_URL", "http://www.toonzacademy.com/");
define("SITE_URL2", "http://www.toonzacademy.com/");
define("INFO_EMAIL", "info@www.toonzacademy.com");
define("ADMIN_VERSION", "version 5.0.1");
define("NO_REPLY", "no-reply@www.toonzacademy.com");
define("POWERED_MSG", "Copyright © ". date('Y') .", Powered By Toonz Web Manager");

/*
|--------------------------------------------------------------------------
| 	General Paths
|--------------------------------------------------------------------------
*/
define("HTTP", "http://");
define("HTTP_HOST", $_SERVER["HTTP_HOST"] . '/livework/toonzacademyseo');
define("ROOT_PATH", $_SERVER['DOCUMENT_ROOT'] . '/livework/toonzacademyseo/');
define("HOST_URL", HTTP . HTTP_HOST);

define("SITE_LAYOUT", "layouts/site");
define("COMMON_FORMS", "layouts/common_forms");
define("ADMIN_VIEWS", "administrator");
define("SITE_VIEWS", "site");

define("SITE_MODELS", "site");
define("ADMIN_FOLDER", "administrator");
define("PUBLIC_FOLDER", "assets");
define("UPLOADS_FOLDER", "uploads");

define("ADMIN_LAYOUT", "layouts/administrator");
define("ADMIN_LOGIN", "Administrator/Login");
define("ADMIN_DASH", "Administrator/Dashboard");
define("ADMIN_URL", "Administrator");

/*
|--------------------------------------------------------------------------
| 	Admin static assets Paths
|--------------------------------------------------------------------------
*/
define("ADMIN_IMG_PATH", HTTP . HTTP_HOST . "/images/" . ADMIN_FOLDER);
define("ADMIN_CSS_PATH", HTTP . HTTP_HOST . "/css/" . ADMIN_FOLDER);
define("ADMIN_JS_PATH", HTTP . HTTP_HOST . "/js/" . ADMIN_FOLDER);

define("CSS_PATH", HOST_URL . "/css");
define("IMG_PATH", HOST_URL . "/images");
define("JS_PATH", HOST_URL . "/js");

define("LP_THEME_COURSES_CSS_PATH", HOST_URL . "/themes/courses/css");
define("LP_THEME_COURSES_IMG_PATH", HOST_URL . "/themes/courses/images");
define("LP_THEME_COURSES_JS_PATH", HOST_URL . "/themes/courses/js");

/*
|--------------------------------------------------------------------------
| 	Site assets Paths
|--------------------------------------------------------------------------
*/
define("INCLUDE_PATH", ROOT_PATH . "/application/views/include");
define("PLUGINS_PATH", HTTP . HTTP_HOST . "/plugins");
define("MISC_PATH", ROOT_PATH . "/misc");
define("CLASSES_PATH", ROOT_PATH . "/classes");

/*
|--------------------------------------------------------------------------
| 	Site assets Paths
|--------------------------------------------------------------------------
*/
define("TESTIMONIAL_UP_PATH", ROOT_PATH . "/images/team");
define("TESTIMONIAL_SHOW_PATH", HTTP . HTTP_HOST . "/images/team");

/*
|--------------------------------------------------------------------------
| Collections consts
|--------------------------------------------------------------------------
*/
define("TBL_USERS", "tbl_users");
define("TBL_CMS", "tbl_cms");
define("TBL_NEWS", "blog_table");
define("TBL_BLOG", "tblblog");
define("TBL_BLOG_COMMENTS", "tblcomments");
define("TBL_COURSES", "tbl_courses");
define("TBL_POSTER_DESIGN", "tbl_poster_design_competition");
define("TBL_TESTIMONIALS", "tbl_testimonials");
define("TBL_COURSES_GENERAL", "tbl_general_course_page_views");
define("TBL_COURSES_GENERAL_QUERY", "tbl_general_course_query");
define("TBL_COMPETITIONS", "tbl_competitions");
define("TBL_LOGS", "tbl_logs");
define("TBL_POSTER_DESIGN_TRAFFIC", "tbl_views");
