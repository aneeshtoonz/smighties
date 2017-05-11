<!DOCTYPE html>
<html class=bg-black>
<head>
<meta charset=UTF-8>
<title><?php echo SITE_NAME;?></title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name=viewport>
<link href="<?php echo ADMIN_CSS_PATH;?>/bootstrap.min.css" rel=stylesheet type=text/css />
<link href="<?php echo ADMIN_CSS_PATH;?>/font-awesome.min.css" rel=stylesheet type=text/css />
<link href="<?php echo ADMIN_CSS_PATH;?>/AdminLTE.css" rel=stylesheet type=text/css />
<!--[if lt IE 9]>
<script src=https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js></script>
<script src=https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js></script>
<![endif]-->
</head>
<body class=bg-black>
<div class=form-box id=login-box>
<div class=header><?php echo SITE_NAME;?></div>
<form action method=post name=login>
<div class="body bg-gray">
<?php $this->load->view('shared/alerts');?>
<div class=form-group>
<input type=text name=username class=form-control placeholder="User Name" maxlength="15"/>
</div>
<div class=form-group>
<input type=password name=password class=form-control placeholder=Password maxlength="15"/>
</div>
</div>
<div class=footer>
<button type=submit class="btn bg-red btn-block" onClick="return checkNull()" name=login>Sign in</button>
</div>
</form>
<div class="margin text-center">
<span style=color:#CCCCCC><?php echo POWERED_MSG?></span>
<br/>
</div>
</div>
<script src=http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js></script>
<script src="<?php echo ADMIN_JS_PATH;?>/bootstrap.min.js" type="text/javascript"></script>
<script type=text/javascript>function checkNull()
{if(document.login.username.value=="")
{alert("Username is a Required field");document.login.username.focus();return false;}
if(document.login.password.value=="")
{alert("Password is a Required field");document.login.password.focus();return false;}
return true}</script>
</body>
</html>
