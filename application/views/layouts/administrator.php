<!DOCTYPE html>
<html>
<head>
<meta charset=UTF-8>
<title><?php echo SITE_NAME;?></title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name=viewport>
<link href="<?php echo ADMIN_CSS_PATH;?>/bootstrap.min.css" rel=stylesheet type=text/css />
<link href="<?php echo ADMIN_CSS_PATH;?>/font-awesome.min.css" rel=stylesheet type=text/css />
<link href="<?php echo ADMIN_CSS_PATH;?>/ionicons.min.css" rel=stylesheet type=text/css />
<link href="<?php echo ADMIN_CSS_PATH;?>/morris/morris.css" rel=stylesheet type=text/css />
<link href="<?php echo ADMIN_CSS_PATH;?>/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel=stylesheet type=text/css />
<link href="<?php echo ADMIN_CSS_PATH;?>/AdminLTE.css" rel=stylesheet type=text/css />
<!--[if lt IE 9]>
<script src=https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js></script>
<script src=https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js></script>
<![endif]-->
</head>
<body class=skin-blue>
<header class=header>
<a href="<?php echo HOST_URL . "/" . ADMIN_URL?>/Dashboard" class="logo">
<?php echo SITE_NAME;?>
</a>
<nav class="navbar navbar-static-top" role=navigation>
<a href=# class="navbar-btn sidebar-toggle" data-toggle=offcanvas role=button>
<span class=sr-only>Toggle navigation</span>
<span class=icon-bar></span>
<span class=icon-bar></span>
<span class=icon-bar></span>
</a>
<div class=navbar-right>
<ul class="nav navbar-nav">
<?php //include('inc_apps/notification_adminapps.php');?>
<?php //include('inc_apps/apps_admin_profile_topside.php');?>
</ul>
</div>
</nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
<aside class="left-side sidebar-offcanvas">
<section class=sidebar>
<div class=user-panel>
<div class="pull-left info">
<p>Hello, <?php echo $user['full_name'];?></p>
<a href=#><i class="fa fa-circle text-success"></i> Online</a>
</div>
</div>
<?php $this->load->view('shared/side-menu', array('menuActive' => $menuActive));?>
</section>
</aside>
<aside class=right-side>
<?php $this->load->view($content);?>
</aside>
</div>

<script src="<?php echo ADMIN_JS_PATH;?>/jquery.min.js"></script>
<script src="<?php echo ADMIN_JS_PATH;?>/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<script src="<?php echo ADMIN_JS_PATH;?>/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo PLUGINS_PATH;?>/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>

<script src="//cloud.tinymce.com/stable/tinymce.min.js?apiKey=p0xnk2stpv7y4fbc2q4cu0nlqb6d2iwez5henm28fi62t0qt"></script>
<script>tinymce.init({ selector:'.editor' });</script>
<script src="<?php echo ADMIN_JS_PATH;?>/AdminLTE/app.js" type="text/javascript"></script>
<script type=text/javascript>$(function(){$('.remove-item-action').on('click',function(e){if(confirm("Do you want to delete this item? No UNDO!")==true){return true;}else{return false;}});})</script>
</body>
</html>
