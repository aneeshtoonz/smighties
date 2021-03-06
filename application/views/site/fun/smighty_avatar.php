<div class="page-wrapper">

      <div class="container-fluidic container-tv-header">

          <div class="container">

              <?php $this->load->view('site/includes/menu');?>

              <div class="clearfix"></div>

              <div class="page-title">
                <h1 class="grd-txt">Create a Smighty Badge</h1>
                <h2>Create and download facebook badge and share</h2>
              </div>

              <div class="clearfix"></div>

              <div class="menu-tabs visible-lg">

                  <a href="<?php echo HOST_URL?>/games">
                    Games
                  </a>
                  <a href="<?php echo HOST_URL?>/smighty-friend">
                      Smighty Friend
                  </a>
                  <a href="<?php echo HOST_URL?>/facebook-smighty-badge" class="active">
                    <span class="left"></span>
                    <span class="middle">Facebook Badge</span>
                    <span class="right"></span>

                  </a>

              </div>

              <div class="clearfix"></div>

              <div class="block row mt-md blog-content text-left flex-wrapper">

                  <div class="col-lg-8 col-xs-10 col-sm-12 nofloats inline smfriend-wrapper mt-lg">

                      <div class="pull-left smfriend-image">
                          <img src="<?php echo IMG_PATH?>/smighties-dummy-image.png" alt="" />
                      </div>

                      <div class="sm-friend-info text-left">
                          <h2 class="grd-txt mb-md">Facebook Badge</h2>
                          <p>Sign in and create your Smighties facebook badge</p>
                          <button type="button" class="fb-button mt-md" id="fb-signin-btn">
                            <span><i class="ion-social-facebook"></i></span>
                            Login with facebook
                          </button>

                          <a href="#" download="facebook__badge" class="button-bubble hidden mr-xs" id="download-smighty-avatar">
                              <span class="left"></span>
                              <span class="middle">Download</span>
                              <span class="right"></span>
                          </a>

                          <a href="" class="button-bubble hidden" id="share-smighty-avatar">
                              <span class="left"></span>
                              <span class="middle">Share</span>
                              <span class="right"></span>
                          </a>

                      </div>

                  </div>

                  <div class="clearfix"></div>

              </div>

              <div class="clearfix"></div>

          </div>

      </div>

      <?php $this->load->view('site/includes/footer-sm');?>
      <?php $this->load->view('site/partials/fb_sdk');?>

      <script type="text/javascript">

          $(function() {

              var fb__signin = $('#fb-signin-btn'),
                  image__loader = $('.smfriend-image'),
                  fb__sharer = $('#share-smighty-avatar');

              fb__signin.on('click', function(e){

                  image__loader.html('<div class="sm-loading"></div>');

                  FB.login(function(response){

                    // Handle the response object, like in statusChangeCallback() in our demo
                    // code.
                    if (response.status === 'connected') {

                        // Logged into your app and Facebook.
                        FB.api('/me', function(res) {

                          FB.api("/" + res.id + "/picture?width=200", function (response) {

                                if (response && !response.error) {

                                  /* handle the result */
                                  // console.log(response);
                                  $.post('<?php echo HOST_URL?>/async/avatar', {'url': response.data.url, 'id' : res.id}, function(res){
                                      if(res.code == 200) {
                                          image__loader.html('<img src="' + res.data + '" alt="" id="smighty__img__badge"/>');
                                          fb__signin.fadeOut(250, function(){

                                              $('#download-smighty-avatar').removeClass('hidden').fadeIn(200).attr('href', res.data);
                                              $('#share-smighty-avatar').removeClass('hidden').fadeIn(200);
                                          });
                                      } else {
                                          alert("Sorry, image cannot be retrieved from facebook");
                                          image__loader.html('<img src="<?php echo IMG_PATH?>/smighties-dummy-image.png" alt="" />');
                                      }
                                  },'json');

                                } else {
                                    alert("Sorry, image cannot be retrieved from facebook");
                                    image__loader.html('<img src="<?php echo IMG_PATH?>/smighties-dummy-image.png" alt="" />');
                                }
                          });

                        });

                    } else {

                        // The person is not logged into this app or we are unable to tell.
                        alert("Sorry, image cannot be retrieved from facebook. Please login to facebook first");
                        image__loader.html('<img src="<?php echo IMG_PATH?>/smighties-dummy-image.png" alt="" />');
                    }

                  }, {scope: 'public_profile,email,user_friends,publish_actions'});

              });

              // Share smighty facebook badge
              fb__sharer.on('click', function(e) {

                  var __opts = {
                      name: 'Small but Mighty Smighties',
                      link : $('#smighty__img__badge').attr('src'),
                      picture: "Smighties Facebook Badge",
                      caption: 'smightiesworld.com',
                      message: 'Hi please check my smighty badge'
                  };

                  FB.api('/me/feed', 'post', __opts , function(response) {
                      if (!response || response.error) {
                        alert(response.error.message);
                      } else {
                        alert("Thanks for sharing facebook badge on your timeline");
                      }
                  });

                  return false;
              });

          });

      </script>

    </div>
