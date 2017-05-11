<script type="text/javascript" src="<?php echo PLUGINS_PATH?>/drawjs/dist/drawingboard.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/1.7.11/fabric.min.js"></script>

<link rel="stylesheet" href="<?php echo PLUGINS_PATH?>/drawjs/dist/drawingboard.css" />

<div class="page-wrapper">

      <div class="container-fluidic container-tv-header">

          <div class="container">

              <?php $this->load->view('site/includes/menu');?>

              <div class="clearfix"></div>

              <div class="page-title">
                <h1 class="grd-txt">Share your ideas</h1>
                <h2>Draw your ideas and submit to us</h2>
              </div>

              <div class="clearfix"></div>

              <div class="menu-tabs visible-lg">

                  <a href="<?php echo HOST_URL?>/games" class="active">
                    <span class="left"></span>
                    <span class="middle">Drawing</span>
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
                                         
                                    </div>

                              </div>

                              <script type="text/javascript">

                                	 var myBoard = new DrawingBoard.Board('drawpad', {
                                     controlsPosition: 'bottom center',
                                     droppable: true,
                                     background: '#fff'
                                   });

                                   myBoard.ev.bind('board:imageDropped', function(){
                                      console.log("asdasd");
                                   });

                                  //  var canvas = new fabric.Canvas('drawing-board-canvas');
                                  //  var rect = new fabric.Rect();
                                  //  canvas.add(rect);
                                  //  canvas.selection = false; // disable group selection
                                  //  rect.set('selectable', false); // make object unselectable

                              </script>

                              <div class="col-lg-5">

                                  <h2 class="grd-txt normal-font">Make your story and submit</h2>
                                  <p>You can simply upload your image or take a photo with your webcam and put your favourite smighty mask and share your creation with us.</p>
                                  <div class="clearfix"></div>


                                  <div class="clearfix"></div>

                                  <!-- <a href="#" class="button-primary button-sm">Download</a> -->
                                  <button type="submit" class="button-bubble mt-md">
                                      <span class="left"></span>
                                      <span class="middle">Submit</span>
                                      <span class="right"></span>
                                  </button>
                                  <a class="button-bubble mt-md" href="#" id="download-canvas">
                                      <span class="left"></span>
                                      <span class="middle">Download</span>
                                      <span class="right"></span>
                                  </a>

                                  <script type="text/javascript">

                                      function downloadCanvas(link, canvasId, filename) {
                                          link.href = document.getElementById(canvasId).toDataURL();
                                          link.download = filename;
                                      }

                                      /**
                                      * The event handler for the link's onclick event. We give THIS as a
                                      * parameter (=the link element), ID of the canvas and a filename.
                                      */
                                      document.getElementById('download-canvas').addEventListener('click', function() {
                                          downloadCanvas(this, 'drawing-board-canvas', 'DownloadCanvas.png');
                                          return false;
                                      }, false);

                                  </script>

                                  <div class="clearfix"></div>

                                  <div class="col-lg-2">
                                     <a class="ide-item" href="#">
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

                             <h2 class="grd-txt pull-left ml-sm">Some awesome ideas</h2>
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
