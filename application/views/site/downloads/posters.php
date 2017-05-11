<div class="page-wrapper">

      <div class="container-fluidic container-tv-header">

          <div class="container">

              <?php $this->load->view('site/includes/menu');?>

              <div class="clearfix"></div>

              <div class="page-title">
                <h1 class="grd-txt">Posters</h1>
                <h2>Download your favorite smighties games</h2>
              </div>

              <div class="clearfix"></div>

              <div class="menu-tabs visible-lg">

                  <a href="<?php echo HOST_URL?>/downloads/wallpapers">
                      <i class="ion-images"></i> Wallpapers
                  </a>

                  <a href="<?php echo HOST_URL?>/downloads/posters" class="active">

                    <span class="left"></span>
                    <span class="middle"><i class="ion-easel"></i> Posters</span>
                    <span class="right"></span>
                  </a>

                  <!-- <a href="#"><i class="ion-music-note"></i> E-Cards</a> -->
                  <a href="<?php echo HOST_URL?>/downloads/stickers"><i class="ion-happy-outline"></i> Stickers/Emoticons</a>

              </div>

              <div class="clearfix"></div>

              <div class="row mt-sm image-wrapper">

                   <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">

                     <div class="row">

                       <div class="col-lg-4 item-lg col-xs-12 col-sm-12 col-md-12 hvr-grow">

                           <div class="item">

                               <a class="item-image" style="background: url('<?php echo IMG_PATH?>/video1.png') no-repeat; background-size: cover;" href="<?php echo IMG_PATH?>/video1.png" download="poster1">
                                   <span class="download-icon"></span>
                               </a>

                           </div>

                       </div>

                       <div class="col-lg-4 item-lg col-xs-12 col-sm-12 col-md-12 hvr-grow">

                           <div class="item">

                             <a class="item-image" style="background: url('<?php echo IMG_PATH?>/video2.png') no-repeat; background-size: cover;" href="<?php echo IMG_PATH?>/video2.png" download="poster1">
                                 <span class="download-icon"></span>
                             </a>

                           </div>

                       </div>

                       <div class="col-lg-4 item-lg col-xs-12 col-sm-12 col-md-12 hvr-grow">

                           <div class="item">

                             <a class="item-image" style="background: url('<?php echo IMG_PATH?>/video3.png') no-repeat; background-size: cover;" href="<?php echo IMG_PATH?>/video3.png" download="poster1">
                                 <span class="download-icon"></span>
                             </a>

                           </div>

                       </div>

                       <div class="col-lg-4 item-lg col-xs-12 col-sm-12 col-md-12 hvr-grow">

                           <div class="item">

                             <a class="item-image" style="background: url('<?php echo IMG_PATH?>/video1.png') no-repeat; background-size: cover;" href="<?php echo IMG_PATH?>/video1.png" download="poster1">
                                 <span class="download-icon"></span>
                             </a>

                           </div>

                       </div>

                     </div>

                   </div>

              </div>

              <div class="clearfix"></div>

          </div>

      </div>

      <?php $this->load->view('site/includes/footer-sm');?>

    </div>
