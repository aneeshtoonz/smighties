<?php
/*
|==========================================================================
| 						Website Settings
|==========================================================================
*/
define("SITE_NAME", "Mighty Smighties");
define("SITE_URL", "http://www.smightiesworld.com/");
define("SITE_URL2", "http://www.smightiesworld.com/");
define("INFO_EMAIL", "info@smightiesworld.com");
define("ADMIN_VERSION", "version 5.0.1");
define("NO_REPLY", "no-reply@smightiesworld.com");
define("POWERED_MSG", "Copyright © ". date('Y') .", Powered By Toonz Web Manager");

/*
|--------------------------------------------------------------------------
| 	General Paths
|--------------------------------------------------------------------------
*/
define("HTTP", "http://");
define("HTTP_HOST", $_SERVER["HTTP_HOST"] . '/smighties');
define("ROOT_PATH", $_SERVER['DOCUMENT_ROOT'] . '/smighties/');
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
define("SMIGHTIES_UP_PATH", ROOT_PATH . "/uploads/smighties");
define("SMIGHTIES_SHOW_PATH", HTTP . HTTP_HOST . "/uploads/smighties");

define("SMIGHTIES_CARD_UP_PATH", HTTP . HTTP_HOST . "/uploads/smighties_card");
define("SMIGHTIES_CARD_SHOW_PATH", HTTP . HTTP_HOST . "/uploads/smighties_card");

define("AVATAR_TEMP_UP_PATH", ROOT_PATH . "uploads/avatar/temp");
define("AVATAR_UP_PATH", ROOT_PATH . "uploads/avatar");
define("AVATAR_SHOW_PATH", HTTP . HTTP_HOST . "/uploads/avatar");
define("AVATAR_BADGE_PATH", ROOT_PATH . "images/templates/avatar_frame.png");

define("FRIEND_TEMP_UP_PATH", ROOT_PATH . "uploads/friend/temp");
define("FRIEND_UP_PATH", ROOT_PATH . "uploads/friend");
define("FRIEND_SHOW_PATH", HTTP . HTTP_HOST . "/uploads/friend");
define("FRIEND_BADGE_PATH", ROOT_PATH . "images/templates/friend_frame.png");
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

// New table additions as on 25.04.2017 11.07 AM
define("TBL_AFMA_COURSE", "tbl_afma_course_query");
define("TBL_AFMA_PAGE_VIEWS", "tbl_afma_page_views");

define("TBL_SMIGHTIES", "tbl_smighties");
