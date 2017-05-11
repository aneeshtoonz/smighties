<ul class="sidebar-menu">
<li class="<?php echo($menuActive == 'dashboard') ? 'active' : '';?>">
<a href="<?php echo HOST_URL . "/" . ADMIN_URL?>/Dashboard">
<i class="fa fa-dashboard"></i> <span>Dashboard</span>
</a>
</li>
<div class="subhead2">Website Manage</div>
<li class="<?php echo($menuActive == 'cms') ? 'active' : '';?>">
<a href="<?php echo HOST_URL . "/" . ADMIN_URL?>/Seo_manager">
<i class="fa fa-bar-chart-o"></i> <span>SEO Pages</span>
</a>
</li>
<li class="<?php echo($menuActive == 'course') ? 'active' : '';?>">
<a href="<?php echo HOST_URL . "/" . ADMIN_URL?>/Course">
<i class="fa fa-bar-chart-o"></i> <span>Courses</span>
</a>
</li>
<li class="<?php echo($menuActive == 'testimonials') ? 'active' : '';?>">
<a href="<?php echo HOST_URL . "/" . ADMIN_URL?>/Testimonials">
<i class="fa fa-bar-chart-o"></i> <span>Testimonials</span>
</a>
</li>
<li class="<?php echo($menuActive == 'news') ? 'active' : '';?>">
<a href="<?php echo HOST_URL . "/" . ADMIN_URL?>/News">
<i class="fa fa-bar-chart-o"></i> <span>News</span>
</a>
</li>
<li class="<?php echo($menuActive == 'blog') ? 'active' : '';?>">
<a href="<?php echo HOST_URL . "/" . ADMIN_URL?>/Blog">
<i class="fa fa-bar-chart-o"></i> <span>Blog</span>
</a>
</li>
<!-- <li class="<?php //echo($menuActive == 'comments') ? 'active' : '';?>">
<a href="<?php //echo HOST_URL . "/" . ADMIN_URL?>/Comments">
<i class="fa fa-bar-chart-o"></i> <span>Comments Filter</span>
</a>
</li>-->

<div class="subhead2">Toonz Events</div>
<li class="<?php echo($menuActive == 'poster_design_competition') ? 'active' : '';?>">
<a href="<?php echo HOST_URL . "/" . ADMIN_URL?>/Poster_design_competition">
<i class="fa fa-bar-chart-o"></i> <span>Poster Design Competition LP</span>
</a>
</li>
<li class="<?php echo($menuActive == 'courses') ? 'active' : '';?>">
<a href="<?php echo HOST_URL . "/" . ADMIN_URL?>/Courses">
<i class="fa fa-bar-chart-o"></i> <span>Courses LP</span>
</a>
</li>
<li class="<?php echo($menuActive == 'gaminglp') ? 'active' : '';?>">
<a href="<?php echo HOST_URL . "/" . ADMIN_URL?>/Gaminglp">
<i class="fa fa-bar-chart-o"></i> <span>Gaming Main LP</span>
</a>
</li>
<li class="<?php echo($menuActive == 'gaming') ? 'active' : '';?>">
<a href="<?php echo HOST_URL . "/" . ADMIN_URL?>/Gaming">
<i class="fa fa-bar-chart-o"></i> <span>Gaming Launch</span>
</a>
</li>

<div class="subhead2">Settings</div>
<li class="<?php echo($menuActive == 'settings') ? 'active' : '';?>">
<a href="<?php echo HOST_URL . "/" . ADMIN_URL?>/Settings/change_password">
<i class="fa fa fa-star"></i> <span>Change Password</span>
</a>
</li>
<li>
<a href="<?php echo HOST_URL . "/" . ADMIN_URL?>/Logout">
<i class="fa fa-sign-out"></i> <span>Log Out</span>
</a>
</li>
<li>
<a href="#">
<span><?php echo POWERED_MSG?></span>
</a>
</li>
</ul>
