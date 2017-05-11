<div class="container-fluidic container-home" id="container-home">

        <div class="container">

            <?php $this->load->view('site/includes/menu', array('current_item' => $current_item));?>

            <div class="clearfix"></div>

            <div class="container video-container hidden">

                <button type="button" class="close-video" id="close-video-btn__action"></button>
                <!-- <iframe src="https://www.youtube.com/embed/UM_4pAUAp2E?rel=0" frameborder="0" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"></iframe> -->
                <video controls id="intro__video">
                  <source src="<?php echo IMG_PATH?>/smitghties-video.mp4" type='video/mp4;codecs="avc1.42E01E, mp4a.40.2"' />
                </video>

            </div>

            <div class="clearfix"></div>

            <div class="container text-center play-intro">
                <a href="#" class="play-intro-video"></a>
                <a href="#" class="close-intro-video hidden"></a>
            </div>

            <div class="clearfix"></div>

            <div class="container flag-container">
                <div class="flag-green visible-md visible-lg" id="flag-green"></div>
                <div class="flag-blue-wave visible-md visible-lg"></div>
                <div class="flag-blue-wave-down visible-md visible-lg"></div>
                <div class="flag-orange-wave-down visible-md visible-lg"></div>

                <div class="flag-red-main-tower"></div>
            </div>

            <div class="clouds"></div>

            <div class="clearfix"></div>

            <div class="container visible-lg">

                <div class="col-lg-12 smighty-layer-home">

                    <a href="#" class="dude-smighty"></a>
                    <a href="#" class="melody-smighty"></a>
                    <a href="#" class="blossom-smighty"></a>
                    <a href="#" class="nerdy-smighty"></a>
                    <a href="#" class="zipzap-smighty"></a>

                </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">

              <div class="container text-center home-tabs">

                  <div class="col-lg-4 col-xs-12 col-sm-12 col-md-4">
                      <a class="home-tab tab1 hvr-grow" href="<?php echo HOST_URL?>/games">
                        <img src="images/smighties-fun-space.png" class="pull-left" />
                        <p class="text-left"><span>SMIGHTIES</span><br/>
                          FUN<br/>
                          SPACE<br/>
                        </p>
                        <div class="clearfix"></div>
                      </a>
                  </div>

                  <div class="col-lg-4 col-xs-12 col-sm-12 col-md-4">
                      <a class="home-tab tab2 hvr-grow" href="<?php echo HOST_URL?>/smighties-tv">
                        <img src="images/watch-smighties-tv.png" class="pull-left" />
                        <p class="text-left"><span>WATCH</span><br/>
                          SMIGHTIES<br/>
                          TV<br/>
                        </p>
                        <div class="clearfix"></div>
                      </a>
                  </div>

                  <div class="col-lg-4 col-xs-12 col-sm-12 col-md-4">
                      <a class="home-tab tab3 hvr-grow" href="<?php echo HOST_URL?>/smightypedia">
                        <img src="images/meet-the-smighities.png" class="pull-left" />
                        <p class="text-left"><span>MEET</span><br/>
                          THE<br/>
                          SMIGHTIES<br/>
                        </p>
                        <div class="clearfix"></div>
                      </a>
                  </div>

              </div>

            </div>

            <div class="clearfix"></div>

        </div>

        <?php $this->load->view('site/includes/footer');?>

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

      });

    </script>
