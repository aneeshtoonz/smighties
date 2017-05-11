<div class="page-wrapper">

      <div class="container-fluidic container-tv-header">

          <div class="container">

              <?php $this->load->view('site/includes/menu');?>

              <div class="clearfix"></div>

              <div class="page-title">
                <h1 class="grd-txt">Theme Music</h1>
                <h2>Listen to your favorite Smighties songs</h2>
              </div>

              <div class="clearfix"></div>

              <div class="menu-tabs visible-lg">

                  <a href="<?php echo HOST_URL?>/smighties-tv">
                      <i class="ion-play"></i> Videos
                  </a>
                  <a href="<?php echo HOST_URL?>/smighties-music" class="active">
                      <span class="left"></span>
                      <span class="middle"><i class="ion-music-note"></i> Music</span>
                      <span class="right"></span>
                  </a>

              </div>

              <div class="clearfix"></div>

              <div class="video-load-container">

                <div class="row">

                  <div class="col-lg-4 item-lg col-xs-12 col-sm-12 col-md-6 hvr-bounce-out" data-toggle="modal" data-target="#tvModal">
                      <div class="item">
                          <div class="item-image" style="background: url('<?php echo IMG_PATH?>/video1.png') no-repeat; background-size: cover;">
                              <span class="music-icon"></span>
                          </div>
                      </div>
                      <div class="item-episode text-center">Theme Music</div>
                  </div>

                </div>

              </div>

              <div class="clearfix"></div>

          </div>

      </div>

      <?php $this->load->view('site/includes/footer-sm');?>

    </div>

    <!-- Modal-->
    <div class="modal animated jello fade" id="tvModal" tabindex="-1" role="dialog" aria-labelledby="tvModal">

      <div class="modal-dialog tvplayer-modal" role="document">

          <button type="button" id="widget-sc-action" class="button-close" data-dismiss="modal" aria-label="Close"></button>

          <div class="tvplayer col-lg-12 musicplayer">
               <iframe id="sc-widget" width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=http%3A%2F%2Fapi.soundcloud.com%2Ftracks%2F1848538&show_artwork=true"></iframe>
              <div class="clearfix"></div>

          </div>

          <div class="clearfix"></div>

      </div>

    </div>

<script src="https://w.soundcloud.com/player/api.js" type="text/javascript"></script>
<script type="text/javascript">
  (function(){
    var widgetIframe = document.getElementById('sc-widget'),
        widget       = SC.Widget(widgetIframe),
        newSoundUrl = 'http://api.soundcloud.com/tracks/13692671';

    widget.bind(SC.Widget.Events.READY, function() {
      // load new widget
      widget.bind(SC.Widget.Events.FINISH, function() {
        widget.load(newSoundUrl, {
          show_artwork: false
        });
      });
    });

    $('#widget-sc-action').on('click', function(){
        widget.pause();
    });

    $('body').on('hidden.bs.modal', '.modal', function () {
        widget.pause();
    });

  }());
</script>
