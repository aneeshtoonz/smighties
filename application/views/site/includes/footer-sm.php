<div class="container-fluidic footer-bg visible-lg">

  <div class="container footer">

      <div class="pull-left footer-links">
        <a href="<?php echo HOST_URL?>/privacy-policy" class="coppa-lg">PRIVACY POLICY</a>
        <a href="<?php echo HOST_URL?>/terms-of-use" class="coppa-lg">TERMS</a>
        <a href="<?php echo HOST_URL?>/news">NEWS ROOM</a>
        <!-- <a href="<?php //echo HOST_URL?>/blog">BLOG</a> -->
        <a href="<?php echo HOST_URL?>/contact">CONTACT</a>
      </div>

      <div class="pull-right footer-copyright">
         <a href="mailto:info@herotainment.com">HEROTAINMENT, LLC</a> .  COPYRIGHT &copy; <?php echo date('Y')?>
      </div>

  </div>

</div>

<!-- Modal-->
<div class="modal animated rubberBand fade" id="collapsbleMenu" tabindex="-1" role="dialog" aria-labelledby="collapsbleMenu">

  <div class="modal-dialog sidemenu-modal" role="document">

      <button type="button" class="button-close" data-dismiss="modal" aria-label="Close"></button>

      <ul class="sidenav">

          <li><a href="<?php echo HOST_URL?>/">Home</a></li>
          <li><a href="#" class="submenu__view">Smighties TV</a>
              <div class="submenu__item">
                 <a href="<?php echo HOST_URL?>/smighties-tv"><i class="ion-monitor"></i> Web TV</a>
                 <a href="<?php echo HOST_URL?>/smighties-music"><i class="ion-music-note"></i> Theme Music</a>
              </div>
          </li>
          <li><a href="#" class="submenu__view">Fun Space</a>
            <div class="submenu__item">
               <a href="<?php echo HOST_URL?>/games"><i class="ion-monitor"></i> Games</a>
               <a href="<?php echo HOST_URL?>/smighty-friend"><i class="ion-music-note"></i> Smighty Friend</a>
               <a href="<?php echo HOST_URL?>/facebook-smighty-badge"><i class="ion-music-note"></i> Smighty Avatar</a>
            </div>
          </li>
          <li><a href="#" class="submenu__view">Smightypedia</a>
            <div class="submenu__item">
               <a href="<?php echo HOST_URL?>/smightypedia"><i class="ion-monitor"></i> Meet Smighties</a>
               <a href="<?php echo HOST_URL?>/villains"><i class="ion-music-note"></i> Villians</a>
            </div>
          </li>
          <li><a href="#" class="submenu__view">Downloads</a>
            <div class="submenu__item">
               <a href="<?php echo HOST_URL?>/downloads/posters"><i class="ion-easel"></i> Posters</a>
               <a href="<?php echo HOST_URL?>/downloads/wallpapers"><i class="ion-images"></i> Wallpapers</a>
               <a href="<?php echo HOST_URL?>/downloads/stickers"><i class="ion-happy-outline"></i> Stickers/Emoticons</a>
            </div>
          </li>
          <li><a href="<?php echo HOST_URL?>/parents">Parents</a></li>
          <li><a href="<?php echo HOST_URL?>/contact" class="last__child">Contact Us</a></li>

      </ul>

  </div>

</div>

<script type="text/javascript">

  $(function(){

      var sub__menu = $('.submenu__view');

      sub__menu.on('click', function(e) {

          e.preventDefault();
          var elem__this = $(this);
          elem__this.parent().find('.submenu__item').slideToggle();
          return false;
      });

  })

</script>
