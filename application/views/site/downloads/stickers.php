<div class="page-wrapper">

      <div class="container-fluidic container-tv-header">

          <div class="container">

              <?php $this->load->view('site/includes/menu');?>

              <div class="clearfix"></div>

              <div class="page-title">
                <h1 class="grd-txt">Download Stickers</h1>
                <h2>Download your favorite smighties games</h2>
              </div>

              <div class="clearfix"></div>

              <div class="menu-tabs visible-lg">

                  <a href="<?php echo HOST_URL?>/downloads/wallpapers">
                      <i class="ion-images"></i> Wallpapers
                  </a>

                  <a href="<?php echo HOST_URL?>/downloads/posters">
                      <i class="ion-easel"></i> Posters
                  </a>

                  <!-- <a href="#"><i class="ion-music-note"></i> E-Cards</a> -->
                  <a href="<?php echo HOST_URL?>/downloads/stickers" class="active">
                    <span class="left"></span>
                    <span class="middle"><i class="ion-happy-outline"></i> Stickers/Emoticons</span>
                    <span class="right"></span>

                  </a>

              </div>

              <div class="clearfix"></div>

              <div class="row mt-sm image-wrapper">

                   <div class="col-lg-12 col-lg-12 col-xs-12 col-sm-12 col-md-12">

                     <div class="row">

                       <div class="col-lg-4 item-lg col-xs-12 col-sm-12 col-md-12 hvr-grow">

                           <div class="item">

                               <div class="item-image">
                                   <span class="download-icon"></span>
                               </div>

                           </div>

                           <div class="item-episode text-center">Sticker Collection Name</div>

                       </div>

                     </div>

                   </div>

              </div>

              <div class="clearfix"></div>

          </div>

      </div>

      <?php $this->load->view('site/includes/footer-sm');?>

    </div>
