<header>

    <a href="<?php echo HOST_URL?>/" class="logo pull-left"></a>

    <nav class="main-nav pull-right visible-lg visible-md">
       <ul>
         <li><a href="<?php echo HOST_URL?>/" class="hvr-pop <?php echo ($current_item =='home') ? 'home' : ''?> <?php echo ($current_item =='home') ? 'active' : ''?>"><i class="ion-home"></i> HOME</a></li>
          <li><a href="<?php echo HOST_URL?>/smighties-tv" class="hvr-pop <?php echo ($current_item =='home') ? 'home' : ''?> <?php echo ($current_item =='tv_index') ? 'active' : ''?>">SMIGHTIES TV</a></li>
          <li><a href="<?php echo HOST_URL?>/games" class="hvr-pop <?php echo ($current_item =='home') ? 'home' : ''?> <?php echo ($current_item =='funspace') ? 'active' : ''?>">FUN SPACE</a></li>
          <li><a href="<?php echo HOST_URL?>/smightypedia" class="hvr-pop <?php echo ($current_item =='home') ? 'home' : ''?> <?php echo ($current_item =='pedia') ? 'active' : ''?>">SMIGHTYPEDIA</a></li>
          <li><a href="<?php echo HOST_URL?>/downloads/wallpapers" class="hvr-pop <?php echo ($current_item =='home') ? 'home' : ''?> <?php echo ($current_item =='downloads') ? 'active' : ''?>">GOODIES</a></li>
          <!-- <li><a href="<?php //echo HOST_URL?>/parents">PARENTS</a></li> -->
       </ul>
    </nav>

    <div class="sm-menu visible-xs visible-sm" data-toggle="modal" data-target="#collapsbleMenu">
        <img src="<?php echo IMG_PATH?>/more.png" alt="" />
    </div>

</header>
