<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width">
    <title>TinyPop App</title>

    <script src="jquery.min.js"></script>
    <script src="jquery.hammer.js"></script>
    <script src="hammer.min.js"></script>
    <script src="Matrix.js"></script>
    <script src="jquery.freetrans.js"></script>
    <script src="Blob.js"></script>
    <script src="canvas-toBlob.js"></script>
    <script src="FileSaver.min.js"></script>

    <!-- CSS files -->
    <link rel="stylesheet" href="css/tpDraw.css" />
    <link rel="stylesheet" href="css/jquery.freetrans.css" />

    <!-- <link rel="stylesheet" href="fancybox/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <script type="text/javascript" src="fancybox/jquery.fancybox.pack.js?v=2.1.5"></script> -->
</head>
<body>
    <div id="mainwrapper" class="mainwrapper fullsize">
        <div id="splash" class="fullsize screen">
            <a href="#" class="start" onclick="return startApp();" style="display:none;"></a>
            <span class="loading step1"></span>
        </div>

        <div id="app" class="fullsize screen noselect" style="display:none;">
            <a href="#" class="tutorial" onclick="return showTutorial();"><img src="img/ui/button-tutorial.png" /></a>
            <a href="#" class="quit" onclick="return showFront();"><img src="img/ui/icon-quit.png" /></a>

            <div id="colourpaletteholder">
                <canvas id="colourpalette" width="90" height="402"></canvas>
                <div class="uparrow allbuttons" data-method="fScrollColorPalette(1)" style="opacity: 0.25;"></div>
                <div class="downarrow allbuttons" data-method="fScrollColorPalette(-1)"></div>
            </div>

            <div id="stickersholder">
                <canvas id="stickerpalette" width="106" height="402"></canvas>
                <div class="uparrow allbuttons" data-method="fScrollStickerPalette(1)" style="opacity: 0.25;"></div>
                <div class="downarrow allbuttons" data-method="fScrollStickerPalette(-1)"></div>
            </div>

            <div id="stickerspopouts">
                <canvas id="stickers" width="600" height="106"></canvas>
                <div class="leftarrow allbuttons" data-method="fScrollStickers(1)" style="opacity: 0.25;"></div>
                <div class="rightarrow allbuttons" data-method="fScrollStickers(-1)"></div>
                <div id="copyright" style="display:none;"></div>
            </div>

            <div id="sizer">
                <a class="allbuttons size size5" data-size="55" data-method="fToggleCircles('5')"><span class="size5"></span></a>
                <a class="allbuttons size size4" data-size="32" data-method="fToggleCircles('4')"><span class="size4"></span></a>
                <a class="allbuttons size size3" data-size="20" data-method="fToggleCircles('3')"><span class="size3"></span></a>
                <a class="allbuttons size size2" data-size="10" data-method="fToggleCircles('2')"><span class="size2 on"></span></a>
                <a class="allbuttons size size1" data-size="5" data-method="fToggleCircles('1')"><span class="size1"></span></a>
            </div>

            <div id="toolbox">
                <div class="inner">
                    <a id="tool-undo" class="allbuttons" data-method="fUndo()"><img src="img/ui/tool-undo.png" /></a>
                    <a id="tool-redo" class="allbuttons" data-method="fRedo()"><img src="img/ui/tool-redo.png" /></a>
                    <a id="tool-brush" class="allbuttons" data-method=" fShowSizer('brush')"><img src="img/ui/tool-brush.png" /></a>
                    <a id="tool-pencil" class="allbuttons" data-method="fShowSizer('pencil')"><img src="img/ui/tool-pencil.png" /></a>
                    <a id="tool-airbrush" class="allbuttons" data-method="fShowSizer('airbrush')"><img src="img/ui/tool-airbrush.png" /></a>
                    <a id="tool-eraser" class="allbuttons" data-method="fShowSizer('eraser')"><img src="img/ui/tool-eraser.png" /></a>

                    <a class="allbuttons" data-method="fShowAreYouSurePopup()" id="tool-trash"><img src="img/ui/tool-trash.png" /></a>
                    <a id="tool-savetick" data-method="fShowUploadPopup()" class="allbuttons"><img src="img/ui/tool-tick.png" /></a>
                    <div class="fileupload-wrapper">
                        <label for="tool-filebrowse">
                            <img src="img/ui/icon-camera-roll.png" />
                        </label>
                        <div class="fileinput">
                            <input id="tool-filebrowse" type="file" name="files[]" />
                        </div>
                    </div>

                    <a id="tool-upload-fb" class="hiddenbutton fancybox" href="#submit"></a>
                    <a class="hiddenbutton areyousure" href="#areyousure" id="tool-trash-fb"></a>
                    <a id="tool-upload-complete" class="hiddenbutton fancybox" href="#submit-complete"></a>
                </div>
            </div>

            <canvas id="sketchpad" width="943" height="707"></canvas>
            <div id="cursor-pointer" class="size1" style="display:none;"><div class="inner"></div></div>
            <div id="stickerOverlays" style="display:none;"></div>
        </div>

        <div id="help" class="fullsize screen allbuttons" data-method="showApp()">

        </div>
    </div>

    <div style="display:none;">
        <div id="submit" class="section submit">
            <div class="form">
                <div class="row logo">
                    <img src="img/ui/icon-pop.png" />
                </div>

                <h2>Do you want to see your<br />artwork on TV &amp; online?</h2>
                <div class="row childinfo">
                    <div class="left childname">
                        <label for="Name">CHILD'S FIRST NAME</label>
                        <input id="Name" type="text" maxlength="50" />
                        <span id="NameRequired" class="required" style="display: none;">*</span>
                    </div>
                    <div class="right childage">
                        <label for="Age">CHILD'S AGE</label>
                        <select id="Age">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                        </select>
                    </div>
                </div>
                <div class="row confirm">
                    <input id="Terms" type="checkbox" />
                    <label for="Terms">I have given my child permission to share their artwork on POP TV<br />and together we have read and agreed to the <a href="https://www.popfun.co.uk/corp/terms/" target="_blank">Terms and Conditions</a>.</label>
                    <span id="TermsRequired" class="required" style="display: none;">*</span>
                </div>

                <div class="row save">
                    <a href="#" onclick="return fSave();"><img src="img/ui/button-send.png" /></a>
                </div>
            </div>
            <div class="complete" style="display:none;">
                <div class="row logo">
                    <img src="img/ui/icon-pop.png" />
                </div>

                <h2>ARTWORK SUBMITTED TO TINYPOP TV!</h2>
                <p>Look out for your artwork on TinyPop TV channel</p>
                <div class="row channels">
                    <img src="img/ui/tv-logos.png" />
                </div>

                <div class="row close">
                    <a href="#" onclick="return fUploadCompletePopupClose();"><img src="img/ui/refresh.png" style="width:50px;" /></a>
                </div>
            </div>
        </div>
        <div id="submit-competition" class="section submit">
            <div class="form">
                <div class="row logo">
                    <img src="img/ui/icon-pop.png" />
                </div>

                <h2>Are you sure you&apos;ve finished<br />your competition artwork?</h2>

                <div class="row save">
                    <a href="#" onclick=" return fSaveCompetition(); "><img src="img/ui/button-yes.png" /></a>
                    <a href="#" onclick=" return fClosePopup();"><img src="img/ui/button-no.png" /></a>
                </div>
            </div>
            <div class="complete" style="display:none;">
                <div class="row logo">
                    <img src="img/ui/icon-pop.png" />
                </div>

                <h2>ARTWORK SUBMITTED TO TINYPOP TV!</h2>
                <p>Look out for your artwork on TinyPop TV channel</p>
                <div class="row channels">
                    <img src="img/ui/tv-logos.png" />
                </div>

                <div class="row close">
                    <a href="#" onclick="return fUploadCompletePopupClose();"><img src="img/ui/refresh.png" style="width:50px;" /></a>
                </div>
            </div>
        </div>
        <div id="areyousure" class="section">
            <h2>DELETE YOUR ARTWORK?</h2>
            <div class="row">
                <a href="#" onclick="return fClosePopup();" class="cancel"><img src="img/ui/icon-bin.png" /></a>
                <a href="#" onclick="return fClearSketch();" class="okay"><img src="img/ui/icon-tick.png" /></a>
            </div>
        </div>
    </div>

    <script src="tpContent_Draw.js"></script>
    <script src="tpContent_SketchPad.js"></script>
</body>
</html>
