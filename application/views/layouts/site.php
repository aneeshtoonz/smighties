<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Smighties | Small but mightiest</title>
    <meta name="keywords" content="Smighties | Small but mightiest" />
    <meta name="description" content="Smighties | Small but mightiest" />
    <link href="" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <link rel="stylesheet" href="<?php echo CSS_PATH?>/styles.css"/>
    <link rel="stylesheet" href="<?php echo CSS_PATH?>/bootstrap.min.css"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="<?php echo JS_PATH?>/bootstrap.min.js"></script>
    <script src="<?php echo JS_PATH?>/response.min.js"></script>

    <script type="text/javascript">

        (function($, R) {

                R.ready(function() {

                  var __viewport_width = R.viewportH();

                  // Resize the viewport on laptop, mobile and other handheld devices
                  if(__viewport_width <= 700) {
                      $('.footer-bg').css('position', 'relative');
                  }

                });

                $(document).on('click','.play-intro-video', function(e){

                    var container = $('#container-home'),
                        __elem = $(this),
                        __smight_layer = $('.smighty-layer-home'),
                        __clouds_layer = $('.clouds'),
                        __tab_layer = $('.home-tabs'),
                        __close_video = $('#close-video-btn__action'),
                        __flag_container = $('.flag-container');

                    e.preventDefault();

                    __elem.hide();
                    __elem.parent().hide();

                    __smight_layer.hide();
                    __clouds_layer.hide();
                    __flag_container.hide();
                    __close_video.removeClass('hidden').fadeIn(250);
                    __tab_layer.css({'marginTop': '10px'}); /*160px*/
                    $('.video-container').removeClass('hidden');

                    var intro__vid = document.getElementById("intro__video");
                    intro__vid.play();

                    if(mobileAndTabletcheck()){

                        if (intro__vid.requestFullscreen) {
                            intro__vid.requestFullscreen();
                        } else if (intro__vid.mozRequestFullScreen) {
                            intro__vid.mozRequestFullScreen();
                        } else if (intro__vid.webkitRequestFullscreen) {
                            intro__vid.webkitRequestFullscreen();
                        }
                    }

                    container.css('background', "transparent");
                    return false;

                });

                $(document).on('click','#close-video-btn__action', function(e){

                    var intro__vid = document.getElementById("intro__video");
                    intro__vid.pause();

                    var container = $('#container-home'),
                        __elem = $(this),
                        __smight_layer = $('.smighty-layer-home'),
                        __clouds_layer = $('.clouds'),
                        __tab_layer = $('.home-tabs'),
                        __play_video = $('.play-intro-video'),
                        __flag_container = $('.flag-container');

                    e.preventDefault();
                    __elem.show();
                    __smight_layer.show();
                    __clouds_layer.show();
                    // __play_video.fadeIn(250);

                    __play_video.show();
                    __play_video.parent().show();

                    __flag_container.show();
                    __elem.addClass('hidden').fadeOut(250);
                    __tab_layer.css({'marginTop': '120px'})

                    $('.video-container').addClass('hidden');
                    container.css('background', "url('<?php echo IMG_PATH?>/mainbg.jpg') no-repeat 50% 0px");
                    return false;

                });

                document.addEventListener("webkitfullscreenchange", function(){

                   var intro__vid = document.getElementById("intro__video");
                   intro__vid.pause();

                    var container = $('#container-home'),
                        __elem = $('.close-intro-video'),
                        __smight_layer = $('.smighty-layer-home'),
                        __clouds_layer = $('.clouds'),
                        __tab_layer = $('.home-tabs'),
                        __play_video = $('.play-intro-video'),
                        __flag_container = $('.flag-container');

                    __smight_layer.fadeIn(250);
                    __clouds_layer.fadeIn(250);
                    __play_video.fadeIn(250);
                    __flag_container.fadeIn(250);
                    __elem.addClass('hidden').fadeOut(250);
                    __tab_layer.css({'marginTop': '120px'})

                    $('.video-container').addClass('hidden');
                    container.css('background', "url('<?php echo IMG_PATH?>/mainbg.jpg') no-repeat 50% 0px");
                    return false;
                });

                // Check the type of handheld device - Mobile or tablet
                var mobileAndTabletcheck = function() {
                    var check = false;
                    (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
                    return check;
                };

          }(this.jQuery, this.Response));

    </script>

</head>

<body class="<?php echo $class__styles?>" data-responsejs='{
  "create": [{
    "prop": "width",
    "prefix": "min-width- r src",
    "breakpoints": [0, 320, 481, 641, 961, 1025]
  }]
}'>

  <?php $this->load->view($content)?>

</body>
</html>
