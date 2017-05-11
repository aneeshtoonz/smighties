<div class="page-wrapper">

      <div class="container-fluidic container-tv-header">

          <div class="container">

              <?php $this->load->view('site/includes/menu');?>

              <div class="clearfix"></div>

              <div class="page-title">
                <h1 class="grd-txt">Smighties TV</h1>
                <h2>Watch your favorite Smighties episodes</h2>
              </div>

              <div class="clearfix"></div>

              <div class="menu-tabs visible-lg">

                  <a href="<?php echo HOST_URL?>/smighties-tv" class="active">
                    <span class="left"></span>
                    <span class="middle"><i class="ion-play"></i> Videos</span>
                    <span class="right"></span>
                  </a>
                  <a href="<?php echo HOST_URL?>/smighties-music"><i class="ion-music-note"></i> Music</a>

              </div>

              <div class="clearfix"></div>

              <div class="video-load-container">

                <div class="row">

                  <div class="col-lg-4 item-lg col-xs-12 col-sm-12 col-md-6 hvr-grow" data-toggle="modal" data-target="#tvModal">

                      <div class="item">

                          <div class="item-image" style="background: url('<?php echo IMG_PATH?>/video1.png') no-repeat; background-size: cover;">
                              <span class="play-icon"></span>
                          </div>

                      </div>

                      <div class="item-episode text-center">Episode 1</div>

                  </div>

                  <div class="col-lg-4 item-lg col-xs-12 col-sm-12 col-md-6 hvr-grow" data-toggle="modal" data-target="#tvModal">

                      <div class="item">

                          <div class="item-image" style="background: url('<?php echo IMG_PATH?>/video2.png') no-repeat; background-size: cover;">
                              <span class="play-icon"></span>
                          </div>

                      </div>

                      <div class="item-episode text-center">Episode 2</div>

                  </div>

                  <div class="col-lg-4 item-lg col-xs-12 col-sm-12 col-md-6 hvr-grow" data-toggle="modal" data-target="#tvModal">

                      <div class="item">

                          <div class="item-image" style="background: url('<?php echo IMG_PATH?>/video3.png') no-repeat; background-size: cover;">
                              <span class="play-icon"></span>
                          </div>

                      </div>

                      <div class="item-episode text-center">Episode 2</div>

                  </div>

                </div>

              </div>

              <div class="clearfix"></div>

          </div>

      </div>

      <?php $this->load->view('site/includes/footer-sm');?>

    </div>

    <!-- Modal rubberBand-->
    <div class="modal animated fade" id="tvModal" tabindex="-1" role="dialog" aria-labelledby="tvModal">

      <button type="button" id="yt-player-close" data-dismiss="modal" aria-label="Close"></button>

      <div class="modal-dialog tvplayer-modal" role="document">

          <div class="tvplayer col-lg-12">
              <!-- <iframe id="player-iframe" src="https://www.youtube.com/embed/UM_4pAUAp2E?rel=0" frameborder="0" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"></iframe> -->
              <div id="player-iframe"></div>
              <div class="clearfix"></div>

              <div class="tvplayer-controls" id="tvplayer-controls">
                  <a href="#" class="tvplayer-controls__prev"></a>
                  <a href="#" class="tvplayer-controls__next"></a>
              </div>

          </div>

          <div class="clearfix"></div>

          <div class="row">
              <div class="col-lg-12 tv-player-caption" id="tv-player-caption">
                  Episode1 : Numbers Song 123 Count | Nursery Rhymes for Children
              </div>
          </div>

          <div class="clearfix"></div>

      </div>

    </div>

    <script type="text/javascript">

        $(function(){

            var __video_array = [
              {'name': 'Episode1: Numbers Song 123 Count | Nursery Rhymes for Children', 'url': 'UM_4pAUAp2E'},
              {'name': 'Episode2: Ice Fruit Jelly Candy Season 3 |Chotoonz TV', 'url': 'rv6_OmxMVF0'},
              {'name': 'Episode3: Funny Videos Invasion of Cute Rabbits| Turtle Hulk VS Fox', 'url' : '2BlZ6YWMn8w'}
            ];

            var __current_item = 0,
                __max_item = __video_array.length,
                __player_iframe = $('#player-iframe'),
                __player_controls = $('#tvplayer-controls'),
                __player_caption = $('#tv-player-caption'),
                __player_prev = __player_controls.find('.tvplayer-controls__prev'),
                __player_next = __player_controls.find('.tvplayer-controls__next');

             if(__video_array.length > 0) {
                  // __player_iframe.attr('src', __video_array[0].url);
                  __player_caption.html(__video_array[0].name);
                  __current_item = 0;

                  if(__current_item === 0) {
                      __player_prev.hide();
                      __player_next.hide();
                  }

                  // If more than one videos
                  if(__video_array.length > 1) {
                      __player_next.show();
                  }
             }

             __player_next.on('click', function(e){
                e.preventDefault();
                __current_item = ++__current_item;

                if(key_exists('name', __video_array[__current_item])) {

                    // __player_iframe.attr('src', __video_array[__current_item].url);
                    __player_caption.html(__video_array[__current_item].name);
                    playVideoYt(__yt_player, __video_array[__current_item].url);

                    if(!key_exists('name', __video_array[__current_item + 1])) {
                        __player_next.hide();
                    } else {
                        __player_next.show();
                    }

                    if(key_exists('name', __video_array[__current_item - 1])) {
                        __player_prev.show();
                    } else {
                        __player_prev.hide();
                    }
                }
                return false;

             });

             __player_prev.on('click', function(e){
                e.preventDefault();
                __current_item = --__current_item;

                if(key_exists('name', __video_array[__current_item])) {

                    // __player_iframe.attr('src', __video_array[__current_item].url);
                    __player_caption.html(__video_array[__current_item].name);
                    playVideoYt(__yt_player , __video_array[__current_item].url);

                    if(key_exists('name', __video_array[__current_item + 1])) {
                        __player_next.show();
                    } else {
                       __player_next.hide();
                    }

                    if(key_exists('name', __video_array[__current_item - 1])) {
                        __player_prev.show();
                    } else {
                       __player_prev.hide();
                    }
                }

                return false;

             });

        });

        /**
       * Check if an array key or object property exists
       * @key - what value to check for
       * @search - an array or object to check in
       */
      function key_exists(key, search) {
          if (!search || (search.constructor !== Array && search.constructor !== Object)) {
              return false;
          }
          for (var i = 0; i < search.length; i++) {
              if (search[i] === key) {
                  return true;
              }
          }
          return key in search;
      }

      var tag = document.createElement('script');
      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      var __yt_player;

      function onYouTubeIframeAPIReady() {
        __yt_player = new YT.Player('player-iframe', {
          videoId: 'UM_4pAUAp2E',
          events: {
            'onReady': onPlayerReady
          }
        });
      }

      function playVideoYt(__yt_player, __videoID) {
        __yt_player.stopVideo();
        __yt_player.loadVideoById({videoId: __videoID});
      }

      function onPlayerReady(event) {
        event.target.playVideo();
      }

      $('#yt-player-close').on('click', function(e){
          __yt_player.pauseVideo();
      });

      $('body').on('hidden.bs.modal', '.modal', function () {
          __yt_player.stopVideo();
      });

    </script>
