<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.7.11/fabric.min.js"></script>

<div class="page-wrapper">

      <div class="container-fluidic container-tv-header">

          <div class="container">

              <?php $this->load->view('site/includes/menu');?>

              <div class="clearfix"></div>

              <div class="page-title">
                <h1 class="grd-txt">Smightyze yourself</h1>
                <h2>Draw your ideas and submit to us</h2>
              </div>

              <div class="clearfix"></div>

              <div class="menu-tabs visible-lg">

                  <a href="<?php echo HOST_URL?>/games" class="active">
                    <span class="left"></span>
                    <span class="middle">Smightyze</span>
                    <span class="right"></span>
                  </a>
                  <a href="<?php echo HOST_URL?>/smighty-friend">Smighty Friend</a>
                  <a href="<?php echo HOST_URL?>/facebook-smighty-badge">Facebook Badge</a>

              </div>

              <div class="clearfix"></div>

              <div class="row video-load-container">

                  <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">

                      <div class="row">

                         <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 online-pad">

                              <div class="col-lg-7">

                                    <div class="drawing-pad" id="drawpad">
                                        <canvas id="drawing-board-canvas" width="500" height="350"/>
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="mt-md">
                                      <a href="#" class="button-primary button-sm" id="downloadBtn">Download</a>
                                      <button class="button-primary button-sm">Submit</button>
                                    </div>

                              </div>

                              <div class="col-lg-5">

                                  <h2 class="grd-txt normal-font">Create a Smighty out of you</h2>
                                  <p>You can simply upload your image or take a photo with your webcam and put your favourite smighty mask and share your creation with us.</p>
                                  <div class="clearfix"></div>

                                  <div class="clearfix"></div>
                                  <div class="hidden">
                                      <input type="file" name="userfile" id="userfile" />
                                  </div>

                                  <button type="button" class="button-bubble mt-md" id="btnCamera">
                                      <span class="left"></span>
                                      <span class="middle">Take Photo</span>
                                      <span class="right"></span>
                                  </button>

                                  <button type="button" class="button-bubble mt-md" id="uploadPhoto">
                                      <span class="left"></span>
                                      <span class="middle text">Upload</span>
                                      <span class="right"></span>
                                  </button>

                                  <script type="text/javascript">

                                      function downloadCanvas(link, canvasId, filename) {
                                          link.href = document.getElementById(canvasId).toDataURL();
                                          link.download = filename;
                                      }

                                      var canvas = new fabric.Canvas('drawing-board-canvas', {backgroundColor: '#ddd'});

                                      $(function(){

                                          var __elem_btn_camera = $('#btnCamera'),
                                              __elem_btn_upload = $('#uploadPhoto'),
                                              __upload_handler = $('#userfile');

                                          navigator.getMedia = ( navigator.getUserMedia || // use the proper vendor prefix
                                                                 navigator.webkitGetUserMedia ||
                                                                 navigator.mozGetUserMedia ||
                                                                 navigator.msGetUserMedia);

                                          navigator.getMedia({video: true}, function() {

                                              // webcam is available
                                              console.log("camera is available");
                                              __elem_btn_camera.show();
                                              __elem_btn_upload.html('Upload');
                                          }, function() {

                                              // webcam is not available
                                              console.log("camera is not available");
                                              __elem_btn_camera.hide();
                                              __elem_btn_upload.find('span.text').html('Upload Photo');
                                          });

                                          __elem_btn_upload.on('click', function(e){
                                              e.preventDefault();
                                              __upload_handler.trigger('click');
                                              return false;
                                          });

                                          __upload_handler.on('change', function(e){

                                              e.preventDefault();
                                              var reader = new FileReader();
                                              reader.onload = function (event) {
                                                  console.log('fdsf');
                                                  var imgObj = new Image();
                                                  imgObj.src = event.target.result;
                                                  imgObj.onload = function () {

                                                      var image = new fabric.Image(imgObj);
                                                      image.set({
                                                          left: 250,
                                                          top: 250,
                                                          angle: 20,
                                                          padding: 10,
                                                          cornersize: 10
                                                      });
                                                      //image.scale(getRandomNum(0.1, 0.25)).setCoords();
                                                      canvas.add(image);

                                                      // end fabricJS stuff
                                                  }

                                              }

                                          });

                                          document.getElementById('userfile').onchange = function handleImage(e) {
                                              var reader = new FileReader();
                                              reader.onload = function (event) { console.log('fdsf');
                                                  var imgObj = new Image();
                                                  imgObj.src = event.target.result;
                                                  imgObj.onload = function () {
                                                      // start fabricJS stuff

                                                      var image = new fabric.Image(imgObj);
                                                      image.set({
                                                          left: 0,
                                                          top: 0,
                                                          angle: 0,
                                                          padding: 10,
                                                          cornersize: 10,
                                                          scaleX: 300 / imgObj.width,
                                                          scaleY: 300 / imgObj.height
                                                      });

                                                      canvas.add(image);

                                                  }

                                              }

                                              reader.readAsDataURL(e.target.files[0]);
                                          }

                                          $(document).on('keyup', function(e){
                                              if(e.which === 46) {
                                                 canvas.getActiveObject().remove();
                                              }
                                          });

                                          document.getElementById('downloadBtn').addEventListener('click', function() {
                                              canvas.discardActiveObject();
                                              canvas.renderAll();
                                              downloadCanvas(this, 'drawing-board-canvas', 'DownloadCanvas.png');
                                              return false;
                                          }, false);

                                      });

                                      function addCanvasImage(image) {

                                           fabric.Image.fromURL(image, function(oImg){
                                                oImg.hasBorders = false;
                                                oImg.hasControls = true;

                                                // ... Modify other attributes
                                                canvas.insertAt(oImg,0);
                                                canvas.setActiveObject(oImg);
                                          });

                                      }

                                      fabric.Object.prototype.set({
                                          transparentCorners: false,
                                          borderColor: '#4243D2',
                                          cornerColor: '#4243D2',
                                          cornerStyle: 'circle'
                                      });

                                  </script>

                                  <div class="clearfix"></div>

                                  <div class="drag-shape-holder">

                                      <a href="#" onclick="javascript: addCanvasImage('<?php echo IMG_PATH?>/nerdy-smighty.png'); return false;">
                                          <img src="<?php echo IMG_PATH?>/nerdy-smighty.png" style="width: 100%"/>
                                      </a>

                                      <a href="#" onclick="javascript: addCanvasImage('<?php echo IMG_PATH?>/nerdy-smighty.png'); return false;">
                                          <img src="<?php echo IMG_PATH?>/nerdy-smighty.png" style="width: 100%"/>
                                      </a>

                                      <a href="#" onclick="javascript: addCanvasImage('<?php echo IMG_PATH?>/nerdy-smighty.png'); return false;">
                                          <img src="<?php echo IMG_PATH?>/nerdy-smighty.png" style="width: 100%"/>
                                      </a>

                                      <a href="#" onclick="javascript: addCanvasImage('<?php echo IMG_PATH?>/nerdy-smighty.png'); return false;">
                                          <img src="<?php echo IMG_PATH?>/nerdy-smighty.png" style="width: 100%"/>
                                      </a>

                                      <a href="#" onclick="javascript: addCanvasImage('<?php echo IMG_PATH?>/nerdy-smighty.png'); return false;">
                                          <img src="<?php echo IMG_PATH?>/nerdy-smighty.png" style="width: 100%"/>
                                      </a>

                                      <a href="#" onclick="javascript: addCanvasImage('<?php echo IMG_PATH?>/nerdy-smighty.png'); return false;">
                                          <img src="<?php echo IMG_PATH?>/nerdy-smighty.png" style="width: 100%"/>
                                      </a>

                                  </div>

                              </div>

                              <div class="clearfix"></div>

                         </div>

                      </div>

                      <div class="row">

                          <!-- Show all the submitted ideas online-->
                          <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 online-pad">

                             <h2 class="grd-txt pull-left ml-sm">Some Smighty faces around</h2>
                             <p class="mt-lg ml-md pull-left">See the ideas submitted from the kids all over the world.</p>

                             <div class="clearfix"></div>

                             <div class="col-lg-2">
                                <a class="ide-item" href="#"></a>
                             </div>
                             <div class="col-lg-2">
                                <a class="ide-item" href="#"></a>
                             </div>
                             <div class="col-lg-2">
                                <a class="ide-item" href="#"></a>
                             </div>
                             <div class="col-lg-2">
                                <a class="ide-item" href="#"></a>
                             </div>
                             <div class="col-lg-2">
                                <a class="ide-item" href="#"></a>
                             </div>
                             <div class="col-lg-2">
                                <a class="ide-item" href="#"></a>
                             </div>
                             <div class="col-lg-2">
                                <a class="ide-item" href="#"></a>
                             </div>
                             <div class="col-lg-2">
                                <a class="ide-item" href="#"></a>
                             </div>
                             <div class="col-lg-2">
                                <a class="ide-item" href="#"></a>
                             </div>
                             <div class="col-lg-2">
                                <a class="ide-item" href="#"></a>
                             </div>
                             <div class="col-lg-2">
                                <a class="ide-item" href="#"></a>
                             </div>
                             <div class="col-lg-2">
                                <a class="ide-item" href="#"></a>
                             </div>

                             <div class="clearfix"></div>

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
