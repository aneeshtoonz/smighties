<div class="page-wrapper">

      <div class="container-fluidic container-tv-header">

          <div class="container">

              <?php $this->load->view('site/includes/menu');?>

              <div class="clearfix"></div>

              <div class="page-title">
                <h1 class="grd-txt"
                data-min-width-320='Meet the Smighties'
                data-min-width-481='Meet the Smighties and Villains'
                data-min-width-961='Meet the Smighties and Villains'>Meet the Smighties and Villains</h1>
                <h2 class="visible-lg visible-md">Know your Smighties and villains</h2>
              </div>

              <div class="clearfix"></div>

              <div class="menu-tabs pull-left visible-lg">

                  <a href="<?php echo HOST_URL?>/smightypedia">
                    Smighties
                  </a>
                  <a href="<?php echo HOST_URL?>/villains" class="active">
                    <span class="left"></span>
                    <span class="middle">Villians</span>
                    <span class="right"></span>

                  </a>

              </div>

              <div class="clearfix"></div>

              <div class="video-load-container">

                <div class="block">

                    <div class="row">

                      <div class="hvr-bounce-out col-lg-3 col-xs-6 col-sm-6 col-md-3 smighty-item" data-toggle="modal" data-target="#myModal">

                           <div class="image" style="background: url('images/smighty-image-list.jpg') no-repeat; background-size: cover;">

                               <div class="profile-btm">
                                   Sneevil
                               </div>

                           </div>

                           <div class="clearfix"></div>

                           <div class="smighty-footer">
                               <button>More Info</button>
                               <div class="clearfix"></div>
                           </div>

                           <div class="clearfix"></div>

                      </div>

                      <div class="hvr-bounce-out col-lg-3 col-xs-6 col-sm-6 col-md-3 smighty-item" data-toggle="modal" data-target="#myModal">

                           <div class="image" style="background: url('images/smighty-image-list.jpg') no-repeat; background-size: cover;">

                               <div class="profile-btm">
                                   Mr. Biggs
                               </div>

                           </div>

                           <div class="clearfix"></div>

                           <div class="smighty-footer">
                               <button>More Info</button>
                               <div class="clearfix"></div>
                           </div>

                           <div class="clearfix"></div>

                      </div>

                    </div>

                </div>

              </div>

              <div class="clearfix"></div>

          </div>

      </div>

      <?php $this->load->view('site/includes/footer-sm');?>

    </div>

    <!-- Modal-->
    <div class="modal animated jello fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog profile-modal" role="document">

          <button type="button" class="button-close" data-dismiss="modal" aria-label="Close">
            <i class="ion-close-round"></i>
          </button>

          <div class="profile-left pull-left">

              <h2 class="text-left">Kissy</h2>

              <div class="text-center profile-image">
                  <img src="images/smighty-profile.png" />
              </div>

              <div class="text-center">
                    <button type="submit" class="button-bubble">
                        <span class="left"></span>
                        <span class="middle">Get Smighty Card</span>
                        <span class="right"></span>
                   </button>
              </div>

          </div>

          <div class="profile-right">

              <div class="profile-info">
                  <p class="head">PERSONALITY</p>
                  <p>Intelligent</p>
              </div>

              <div class="profile-info">
                  <p class="head">POWER</p>
                  <p>Walking encyclopedia of facts</p>
              </div>

              <div class="profile-info">
                  <p class="head">WEAKNESS</p>
                  <p>Amnesia</p>
              </div>

              <div class="profile-info">
                  <p class="head">FAVOURITE COLOR</p>
                  <p>Brown</p>
              </div>

              <div class="profile-info">
                  <p class="head">FAVOURITE FOOD</p>
                  <p>Edamame</p>
              </div>

              <div class="profile-info">
                  <p class="head">BIRTHDAY</p>
                  <p>January 1</p>
              </div>

              <div class="row">
                  <div class="col-lg-6">
                    <div class="profile-info">
                        <p class="head">ELEMENT</p>
                        <p>EARTH</p>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="profile-info">
                        <p class="head">RARITY</p>
                        <p>VERY RARE</p>
                    </div>
                  </div>
              </div>

              <div class="clearfix"></div>

          </div>

      </div>
    </div>
