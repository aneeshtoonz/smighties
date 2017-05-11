// Drawing tool initialisation
//
var JSON_CONTENT_TYPE = 'application/json; charset=utf-8';
var w = 943;
var h = 707;
var websiteId = 1;
var compId = null;
var compMode = false;

var colours = ['#ffffff', '#000000', '#7b777b', '#adacad', '#a2ddc6', '#009088', '#0755a4',
                   '#4298d9', '#44c3d9', '#847ada', '#9047a7', '#e78bb8', '#dc1a25', '#eb5f10',
                   '#ef9c00', '#eebc15', '#eee071', '#e5b084', '#a25b1d', '#6f380a', '#98a224',
                   '#398905', '#165335'];

// var stickerItems = [
//     { index: 1, id: 1, count: 11, label: "Halloween" },
//     { index: 2, id: 2, count: 11, label: "My Little Pony" },
//     { index: 3, id: 3, count: 7, label: "Sail Boat" },
//     { index: 4, id: 4, count: 9, label: "Truck" },
//     { index: 5, id: 5, count: 47, label: "Masks" },
//     { index: 6, id: 6, count: 33, label: "Animals" },
//     { index: 7, id: 7, count: 37, label: "Hair" },
//     { index: 8, id: 8, count: 20, label: "Props" },
//     { index: 9, id: 9, count: 9, label: "Monkey" },
//     { index: 10, id: 10, count: 10, label: "Bucket" },
//     { index: 11, id: 11, count: 10, label: "Snail" },
//     { index: 12, id: 12, count: 10, label: "Truck" },
//     { index: 13, id: 13, count: 10, label: "PegCat" },
//     { index: 14, id: 14, count: 10, label: "BlueCat" },
//     { index: 15, id: 15, count: 10, label: "Bee" },
//     { index: 16, id: 16, count: 10, label: "Dumbo" },
//     { index: 17, id: 17, count: 10, label: "Wildernuts" },
//     { index: 18, id: 18, count: 10, label: "ElephantBoy" },
//     { index: 19, id: 19, count: 10, label: "Racoon" }
// ];

var stickerItems = [
    { index: 1, id: 1, count: 1, label: "Halloween" }
];

var sizes = [5, 15, 30, 50, 80];

var colourpaletteTouching = false;
var currentColourIndex = 1;
var currentColour = colours[currentColourIndex];
var stickerpackshowing = 0;
var stickerPacksTouching = false;
var stickersCurrentX = 0;
var currentSize = 10;
var currentTool = "pencil";

var colourpalette = document.getElementById("colourpalette");
var colourpaletteContext = colourpalette.getContext("2d");
var colourpalettesStartY = 0;
var paletteGap = 59;
var paletteDotStartY = 18 + paletteGap;
var colourpaletteSpeed = 0;
var colourpaletteImage = [];
var paletteDotImage = [];
var snapUp = false;
var snapDown = false;
var snapLeft = false;
var snapRight = false;
var colourpalettedownarrowvisible = true;
var colourpaletteuparrowvisible = false;


var stickerpaletteTouching = false;
var stickerpalette = document.getElementById("stickerpalette");
var stickerpaletteContext = stickerpalette.getContext("2d");
var stickerpaletteY = 0;
var stickerpalettesStartY = 0;
var stickerpaletteItemHeight = 75;
var stickerpaletteSpeed = 0;
var stickerpalettesnapUp = false;
var stickerpalettesnapDown = false;
var stickerpalettedownarrowvisible = true;
var stickerpaletteuparrowvisible = false;

var stickers = document.getElementById("stickers");
var stickersContext = stickers.getContext("2d");
var stickersStartX = 0;
var stickersSpeed = 0;
var stickersGap = 88;
var currentStickerPack = null;
var stickerleftarrowvisible = false;
var stickerrightarrowvisible = true;


var stickers1 = ['001,514,269', '002,486,275', '003,534,255', '004,547,436', '005,576,275', '006,208,142', '007,208,142', '008,757,402', '009,885,838', '010,830,269', '011,826,755', '012,928,1104', '013,1099,891',
                 '014,770,729', '015,1249,1002', '016,1061,1322', '017,836,1480', '018,876,1362', '019,1038,814', '020,934,916', '021,1028,964', '022,1295,1435', '023,1164,550', '024,700,243', '025,764,482',
                 '026,672,337', '027,987,771', '028,490,305', '029,480,298', '030,719,442'];
var stickers2 = [];
var stickers3 = [];
var stickers4 = ['001,506,573', '002,401,584', '003,487,487', '004,669,578', '005,742,421', '006,768,514', '007,721,493', '008,662,433', '009,575,528', '010,394,601', '011,593,496', '012,319,686',
                 '013,362,587', '014,592,755', '015,604,563', '016,683,595', '017,561,487', '018,855,596', '019,1187,439'];
var stickerpacks = [];
stickerpacks.push(stickers1);
stickerpacks.push(stickers2);
stickerpacks.push(stickers3);
stickerpacks.push(stickers4);

var imageManager = null;

$(document).ready(function () {
    init();
});

var allbuttons = $('.allbuttons');
var audioSamples = new Array();

var canvasOffet = null;
var loadingFrame = 1;
var isChrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
var returnUrl = "";
var isGallery = true;
var currentStickerPlaced = null;
var uploadPopupID = "submit";

function init() {
    imageManager = new ImageManager();
    imageManager._baseURL = "img/";
    imageManager._onLoaded = null;

    returnUrl = decodeURI(getParameterByName("returnUrl"));
    compId = getParameterByName("compId");

    compMode = (returnUrl != null && returnUrl != "") || (compId != null && compId != "");

    // If we have a returnUrl property then it is a competition we need to upload to and redirect
    if (compMode) {
        isGallery = false;

        // Set competition popup on save
        $('#tool-upload-fb').attr('href', '#submit-competition');
        uploadPopupID = "submit-competition";
    }

    //console.log( "isGallery:" + isGallery );

    setSize();

    var images = new Array();

    for (var i = 0; i < stickerItems.length; i++) {
        images.push({ path: "stickers/" + stickerItems[i].id + "/thumbs/" + stickerItems[i].id + ".png", key: "sticker" + stickerItems[i].id });

        // for (var a = 1; a <= stickerItems[i].count - 1; a++) {
        //     var key = "sticker" + stickerItems[i].id + "_" + a;
        //
        //     images.push({ path: "stickers/" + stickerItems[i].id + "/thumbs/" + a + ".png", key: key });
        // }
    }

    for (var i = 0; i < 23; i++) {
        //images.push({ path: "brush/brush2-" + i + ".png", key: "brush" + i });
        //images.push({ path: "spray-rounded/spray-rounded-" + i + ".png", key: "spray" + i });
    }

    //audioSamples["swish1"] = new Audio('sound/Swish-1.mp3');

    imageManager._load(images);
    setTimeout(loadingLoop, 500);


}

//Function to check if current window and the top window are Cross-Origin
var isCrossOrigin = function () {
    try {
        //try to access the document object
        if (top.document || top.document.domain) {
            //we have the same document.domain value!
        }
    } catch (e) {
        //We don't have access, it's cross-origin!
        return true;
    }
    return false;
};

function getParameterByName(name) {
    name = name.toLowerCase().replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");

    var search = "";
    if (isCrossOrigin()) {
        search = window.location.search;
    } else {
        search = parent.window.location.search;
    }

    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(search.toLowerCase());
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

function startApp() {
    showScreen("app");

    resourcesLoaded();
    fClearSketch();

    return false;
}

function showTutorial() {
    showScreen("help");
    fHideStickers();
    return false;
}

function showFront() {
    showScreen("splash");
    fHideStickers();
    return false;
}

function showApp() {
    showScreen("app");

    return false;
}

function fClosePopup() {
    $.fancybox.close();

    return false;
}

function showScreen(id) {
    $('.screen').hide();
    $('#' + id).show();
}

function setSize() {
    /*w = $( window ).width();
    h = $( window ).height();*/

    $('#mainwrapper').css('width', w + 'px');
    $('#mainwrapper').css('height', h + 'px');

    canvasOffet = $('#mainwrapper').offset();
}

function loadingLoop() {
    $('.loading').removeClass('step1').removeClass('step2').removeClass('step3').removeClass('step4');
    $('.loading').addClass('step' + loadingFrame);

    loadingFrame++;
    if (loadingFrame > 4) {
        loadingFrame = 1
    }

    if (imageManager._loaded) {
        $('.loading').hide();
        $('.start').fadeIn();
    }
    else {
        setTimeout(loadingLoop, 500);
    }
}

function resourcesLoaded() {
    $('#background_image').attr({ width: w, height: h }).css({ width: w + 'px', height: h + 'px' });
    $('#sketchpad').attr({ width: w, height: h }).css({ width: w + 'px', height: h + 'px' });
    $('#stickerOverlays').css({ width: w + 'px', height: h + 'px' });

    setupFileBrowseEvent();
    paletteMoving = setInterval(function () { movePalettes() }, 33);

    fRenderStickerPalette();

    fAddImage("img/ui/colourpalette.png", 14, colourpalettesStartY, 55, 1353);
    fAddPaletteDotImage("img/ui/palettedot.png", 30, paletteDotStartY, 20, 20);

    allbuttons.bind('touchstart click', function (e) {
        e.preventDefault();
        eval($(this).data('method'));
    });

    Hammer(colourpalette).on("dragup dragdown touch release tap", function (ev) {
        ev.gesture.preventDefault();

        if (ev.type == "tap") {
            var colourpaletteholderoffset = $('#colourpaletteholder').position();
            var tapY = ev.gesture.center.pageY - colourpaletteImage.y - (canvasOffet.top + colourpaletteholderoffset.top);
            var si = ((tapY - 30) / paletteGap) >> 0;

            paletteDotImage.x = 34;
            paletteDotImage.y = ((si * paletteGap) + 20) + colourpaletteImage.y;
            paletteDotStartY = paletteDotImage.y;
            colourpaletteContext.clearRect(0, 0, colourpalette.width, colourpalette.height);
            renderCanvasImage(colourpaletteContext, colourpaletteImage);
            renderCanvasImage(colourpaletteContext, paletteDotImage);
            currentColourIndex = si;
            currentColour = colours[si];
        }

        if (ev.type == "release") {
            colourpaletteTouching = false;
        }

        if (ev.type == "touch") {
            colourpaletteTouching = true;
            colourpalettesStartY = colourpaletteImage.y;
            paletteDotStartY = paletteDotImage.y;
            colourpaletteSpeed = 0;
            snapUp = false;
            snapDown = false;
        }

        if (ev.type == "dragup" || ev.type == "dragdown") {

            colourpaletteImage.y = colourpalettesStartY + (ev.gesture.deltaY * 0.7);
            paletteDotImage.x = 34;
            paletteDotImage.y = paletteDotStartY + (ev.gesture.deltaY * 0.7);
            colourpaletteContext.clearRect(0, 0, colourpalette.width, colourpalette.height);
            renderCanvasImage(colourpaletteContext, colourpaletteImage);
            renderCanvasImage(colourpaletteContext, paletteDotImage);

            if (ev.gesture.deltaY < 0) {
                colourpaletteSpeed = -ev.gesture.velocityY * 20;
            } else {
                colourpaletteSpeed = ev.gesture.velocityY * 20;
            }

            updateColorPaletteScrollButtons();
        }

    });

    Hammer(stickerpalette).on("dragup dragdown touch release tap", function (ev) {
        ev.gesture.preventDefault();

        if (ev.type == "tap") {
            var stickerholderoffset = $('#stickersholder').position();

            var tapY = ev.gesture.center.pageY - stickerpaletteStartY - (canvasOffet.top + stickerholderoffset.top);
            var si = ((tapY - 30) / stickerpaletteItemHeight) >> 0;

            fShowStickers(si + 1)
        }

        if (ev.type == "release") {
            stickerpaletteTouching = false;
        }

        if (ev.type == "touch") {
            stickerpaletteTouching = true;
            stickerpaletteStartY = stickerpaletteY;
            stickerpaletteSpeed = 0;
            stickerpalettesnapUp = false;
            stickerpalettesnapDown = false;
            fHideStickers();
        }

        if (ev.type == "dragup" || ev.type == "dragdown") {

            stickerpaletteY = stickerpaletteStartY + (ev.gesture.deltaY * 0.7);
            fRenderStickerPalette();

            if (ev.gesture.deltaY < 0) {
                stickerpaletteSpeed = -ev.gesture.velocityY * 20;
            } else {
                stickerpaletteSpeed = ev.gesture.velocityY * 20;
            }

            updateStickerPaletteScrollButtons();
        }

    });

    Hammer(stickers).on("dragleft dragright touch release tap", function (ev) {
        ev.gesture.preventDefault();

        if (ev.type == "tap") {
            var barpos = $('#stickers').offset();

            var x = ev.gesture.center.pageX - barpos.left;
            var cs = Math.abs(stickersCurrentX) + x;
            var si = (cs / stickersGap) >> 0;

            currentStickerPlaced = (si + 1);

            fCreateStickerOverlay('img/stickers/' + currentStickerPack.id + '/' + (si + 1) + '.png', 512, 512);
        }

        if (ev.type == "release") {
            stickerPacksTouching = false;
        }

        if (ev.type == "touch") {
            stickerPacksTouching = true;
            stickersStartX = stickersCurrentX;
            stickersSpeed = 0;
            snapLeft = false;
            snapRight = false;
        }

        if (ev.type == "dragleft" || ev.type == "dragright") {

            stickersCurrentX = stickersStartX + (ev.gesture.deltaX * 0.7);

            fRenderCurrentStickerPack();

            if (ev.gesture.deltaX < 0) {
                stickersSpeed = -ev.gesture.velocityX * 20;
            } else {
                stickersSpeed = ev.gesture.velocityX * 20;
            }

            updateStickerScrollButtons();
        }

    });

    $('.fancybox').fancybox({
        'autoscale': false,
        'padding': [0],
        'overlayOpacity': '0.8',
        'overlayColor': '#000000'
    });

    $('.areyousure').fancybox({
        'autoscale': false,
        'padding': [0],
        'overlayOpacity': '0.8',
        'overlayColor': '#000000'
    });

    $('#colourpaletteholder, #stickersholder, #toolbox').mousedown(function () {
        if (currentStickerPack != null) {
            fHideStickers();
        }
    });
    /*$( document ).mousedown( function() {
        if( currentStickerPack != null ) {
            fHideStickers();
        }
    } );*/

    /*$( '#sketchpad' ).mousemove( function( e ) {
        var pos = $( '#sketchpad' ).offset();

        $( '#cursor-pointer' ).css( 'left', (e.pageX - pos.left) + 'px' );
        $( '#cursor-pointer' ).css( 'top', ( e.pageY - pos.top ) + 'px' );
    } );

    $( '#sketchpad' ).bind( "mouseout", function() {
        $( '#cursor-pointer' ).css( 'left', '-9999px' );
    } );*/
    fClearSketch();
}

function updateStickerScrollButtons() {

    if (currentStickerPack && stickersCurrentX < -((currentStickerPack.count - 8) * stickersGap)) {
        if (stickerrightarrowvisible) {
            $('#stickerspopouts .rightarrow').fadeTo("slow", 0.25);
            stickerrightarrowvisible = false;
        }
    }
    else {
        if (!stickerrightarrowvisible) {
            $('#stickerspopouts .rightarrow').fadeTo("slow", 1);
            stickerrightarrowvisible = true;
        }
    }

    if (stickersCurrentX > 10) {
        if (stickerleftarrowvisible) {
            $('#stickerspopouts .leftarrow').fadeTo("slow", 0.25);
            stickerleftarrowvisible = false;
        }
    }
    else {
        if (!stickerleftarrowvisible) {
            $('#stickerspopouts .leftarrow').fadeTo("slow", 1);
            stickerleftarrowvisible = true;
        }
    }
}

function updateStickerPaletteScrollButtons() {
    var topy = -stickerpaletteItemHeight * (stickerItems.length - 6);

    if (stickerpaletteY < topy) {
        if (stickerpalettedownarrowvisible) {
            $('#stickersholder .downarrow').fadeTo("slow", 0.25);
            stickerpalettedownarrowvisible = false;
        }
    }
    else {
        if (!stickerpalettedownarrowvisible) {
            $('#stickersholder .downarrow').fadeTo("slow", 1);
            stickerpalettedownarrowvisible = true;
        }
    }

    if (stickerpaletteY > -10 && stickerpaletteSpeed > 0) {
        if (stickerpaletteuparrowvisible) {
            $('#stickersholder .uparrow').fadeTo("slow", 0.25);
            stickerpaletteuparrowvisible = false;
        }
    }
    else {
        if (!stickerpaletteuparrowvisible) {
            $('#stickersholder .uparrow').fadeTo("slow", 1);
            stickerpaletteuparrowvisible = true;
        }
    }
}

function updateColorPaletteScrollButtons() {
    var topy = -stickerpaletteItemHeight * (stickerItems.length - 6);

    if (colourpaletteImage.y < -960) {
        if (colourpalettedownarrowvisible) {
            $('#colourpaletteholder .downarrow').fadeTo("slow", 0.25);
            colourpalettedownarrowvisible = false;
        }
    }
    else {
        if (!colourpalettedownarrowvisible) {
            $('#colourpaletteholder .downarrow').fadeTo("slow", 1);
            colourpalettedownarrowvisible = true;
        }
    }

    if (colourpaletteImage.y > -10) {
        if (colourpaletteuparrowvisible) {
            $('#colourpaletteholder .uparrow').fadeTo("slow", 0.25);
            colourpaletteuparrowvisible = false;
        }
    }
    else {
        if (!colourpaletteuparrowvisible) {
            $('#colourpaletteholder .uparrow').fadeTo("slow", 1);
            colourpaletteuparrowvisible = true;
        }
    }
}

function setupFileBrowseEvent() {
    document.getElementById('tool-filebrowse').addEventListener('change', handleFileSelect, false);
}

function fRenderStickerPalette() {
    stickerpaletteContext.clearRect(0, 0, stickerpalette.width, stickerpalette.height);
    stickerpaletteContext.save();

    var y = stickerpaletteY;
    for (var i = 0; i < stickerItems.length; i++) {
        var img = imageManager._images["sticker" + stickerItems[i].id];

        stickerpaletteContext.drawImage(img, 24, y);
        y += stickerpaletteItemHeight;
    }
    stickerpaletteContext.restore();
}

function movePalettes() {
    var diff = 0;

    if (!colourpaletteTouching) {
        if (snapUp) {
            diff = (0 - colourpaletteImage.y) * 0.33;
            colourpaletteImage.y += diff;
            paletteDotImage.y += diff;
            updateColorPaletteScrollButtons();
        } else if (snapDown) {
            diff = (-960 - colourpaletteImage.y) * 0.33;
            colourpaletteImage.y += diff;
            paletteDotImage.y += diff;
            updateColorPaletteScrollButtons();
        } else if (colourpaletteSpeed > 0.1 || colourpaletteSpeed < -0.1) {
            colourpaletteSpeed *= 0.94;
            colourpaletteImage.y += colourpaletteSpeed;
            paletteDotImage.y += colourpaletteSpeed;

            if (colourpaletteImage.y < -960 && colourpaletteSpeed < 0) {
                snapDown = true;
            }
            if (colourpaletteImage.y > -10 && colourpaletteSpeed > 0) {
                snapUp = true;
            }
            updateColorPaletteScrollButtons();
        }
        colourpaletteContext.clearRect(0, 0, colourpalette.width, colourpalette.height);

        paletteDotImage.x = 34;
        renderCanvasImage(colourpaletteContext, colourpaletteImage);
        renderCanvasImage(colourpaletteContext, paletteDotImage);
    }
    if (!stickerpaletteTouching) {
        if (stickerpalettesnapUp) {
            diff = (0 - stickerpaletteY) * 0.33;
            stickerpaletteY += diff;
            updateStickerPaletteScrollButtons();

        } else if (stickerpalettesnapDown) {
            diff = ((-((stickerItems.length - 6) * stickerpaletteItemHeight) - stickerpaletteY) + -40) * 0.33;
            stickerpaletteY += diff;
            updateStickerPaletteScrollButtons();

        } else if (stickerpaletteSpeed > 0.1 || stickerpaletteSpeed < -0.1) {
            stickerpaletteSpeed *= 0.94;
            stickerpaletteY += stickerpaletteSpeed;

            var topy = -(stickerpaletteItemHeight * (stickerItems.length - 6) + -40);

            if (stickerpaletteY < topy && stickerpaletteSpeed < 0) {
                stickerpalettesnapDown = true;
            }
            if (stickerpaletteY > -10 && stickerpaletteSpeed > 0) {
                stickerpalettesnapUp = true;
            }

            updateStickerPaletteScrollButtons();
        }

        fRenderStickerPalette();
    }
    if (!stickerPacksTouching && stickerpackshowing != 0) {
        if (snapLeft) {
            diff = (10 - stickersCurrentX) * 0.33;
            stickersCurrentX += diff;

            updateStickerScrollButtons();
        } else if (snapRight) {
            if (currentStickerPack) {
                diff = ((-((currentStickerPack.count - 8) * stickersGap) - stickersCurrentX) - 20) * 0.33;
                stickersCurrentX += diff;

                updateStickerScrollButtons();
            }
        } else if (stickersSpeed > 0.1 || stickersSpeed < -0.1) {
            stickersSpeed *= 0.94;
            stickersCurrentX += stickersSpeed;

            if (currentStickerPack) {
                if (stickersCurrentX < -(((currentStickerPack.count - 8) * stickersGap) - 20) && stickersSpeed < 0) {
                    snapRight = true;
                }
            }
            if (stickersCurrentX > 10 && stickersSpeed > 0) {
                snapLeft = true;
            }

            updateStickerScrollButtons();
        }
        fRenderCurrentStickerPack();
    }
}

function fScrollColorPalette(dir) {
    var sy = colourpaletteImage.y;

    colourpaletteImage.y += dir * 50;
    colourpaletteTouching = false;
    snapDown = false;
    snapUp = false;
    colourpaletteSpeed = 0;

    if (colourpaletteImage.y < -960) {
        colourpaletteImage.y = -960;
    }
    if (colourpaletteImage.y > 0) {
        colourpaletteImage.y = 0;
    }

    var diff = colourpaletteImage.y - sy;
    paletteDotImage.y += diff;
    updateColorPaletteScrollButtons();
}

function fScrollStickerPalette(dir) {
    var topy = -(stickerpaletteItemHeight * (stickerItems.length - 5) + -30);

    stickerpaletteY += dir * 50;
    stickerpaletteTouching = false;
    stickerpalettesnapDown = false;
    stickerpalettesnapUp = false;
    stickerpaletteSpeed = 0;

    if (stickerpaletteY < topy) {
        stickerpaletteY = topy;
    }
    if (stickerpaletteY > -10) {
        stickerpaletteY = -10;
    }

    updateStickerPaletteScrollButtons();
}

function fScrollStickers(dir) {
    stickersCurrentX += dir * 50;
    stickerPacksTouching = false;
    snapRight = false;
    snapLeft = false;
    stickersSpeed = 0;

    if (stickersCurrentX < -(((currentStickerPack.count - 8) * stickersGap) + 20)) {
        stickersCurrentX = -(((currentStickerPack.count - 8) * stickersGap) + 20);
    }
    if (stickersCurrentX > 0) {
        stickersCurrentX = 0;
    }

    updateStickerScrollButtons();
}

function fAddImage(src, x, y, w, h) {
    if (src) {
        var image = new Image();
        image.src = src;
        image.onload = function () {
            var imageItem = { image: this, x: x, y: y, w: w, h: h };
            renderCanvasImage(colourpaletteContext, imageItem);
            colourpaletteImage = imageItem;
        }
    }
}

function fAddPaletteDotImage(src, x, y, w, h) {
    if (src) {
        var image = new Image();
        image.src = src;
        image.onload = function () {
            var imageItem = { image: this, x: x, y: y, w: w, h: h };
            renderCanvasImage(colourpaletteContext, imageItem);
            paletteDotImage = imageItem;
        }
    }
}

function renderCanvasImage(context, img) {
    if (img.image) {
        context.save();
        context.translate(img.x, img.y);
        context.drawImage(img.image, 0, 0);
        context.restore();
    }
}

function fCreateStickerOverlay(src, sW, sH) {
    fCancelStickerPlacement();
    fHideGui();

    var appendMe = '<img id="stickerOverlay" class="overlayCanvas" width="' + sW + '" height="' + sH + '" style="z-index: 3;" />';
    appendMe += '<div id="stickerOverlayTick" class="overlaytick" onclick="fConfirmSticker(true);"></div>';
    appendMe += '<div id="stickerOverlayCross" class="overlaycross" onclick="fConfirmSticker(false);"></div>';

    $('#stickerOverlays').append(appendMe);
    var overlay = document.getElementById("stickerOverlay");
    var overlayTick = document.getElementById("stickerOverlayTick");
    var overlayCross = document.getElementById("stickerOverlayCross");

    var cW = $(overlay).width();
    var cH = $(overlay).height();
    var hW = cW >> 1;
    var hH = cH >> 1;

    $(overlay).attr('src', src);
    $(overlay).fadeIn();

    var startPos = $(overlay).position();
    $(overlayTick).css('left', (startPos.left + cW - 80) + 'px').css('top', (startPos.top + cH) + 'px');
    $(overlayCross).css('left', (startPos.left + cW) + 'px').css('top', (startPos.top + cH) + 'px');

    var sourceScale = 0.5;
    var scalexdiff = 1 - sourceScale;
    var scaleydiff = 1 - sourceScale;
    var x = ((w >> 1) - hW) - (hW * scalexdiff);
    var y = ((h >> 1) - hH) - (hH * scaleydiff);

    $(overlay).freetrans({
        x: x,
        y: y,
        scalex: sourceScale,
        scaley: sourceScale,
        angle: 0,
        'rot-origin': "50% 50%",
        maintainAspectRatio: true
    });

    var overlayControls = $('.ft-controls')[0];

    Hammer(overlayControls).on("dragleft dragright dragup dragdown release touch", function (ev) {
        //ev.gesture.preventDefault();

        if (ev.type == "release") {
            $('.overlaytick').hide();
            $('.overlaycross').hide();

            $(overlayTick).fadeIn();
            $(overlayCross).fadeIn();

        } else if (ev.type == "touch") {

            $(overlayTick).hide();
            $(overlayCross).hide();
        }

        var o = $(overlay).freetrans('getOptions');


        var scalexdiff = 1 - o.scalex;
        var scaleydiff = 1 - o.scaley;
        var x = o.x + hW + (hW * scalexdiff);
        var y = o.y + hH + (hH * scaleydiff) + 40;


        $(overlayTick).css('left', (x - 60) + 'px').css('top', (y) + 'px');
        $(overlayCross).css('left', (x + 60) + 'px').css('top', (y) + 'px');
    });

    fHidePopOutItems();
    $('#stickerOverlays').show();
}

function fConfirmSticker(bln) {
    var $obj = $("#stickerOverlay");

    if (bln) {
        var o = $obj.freetrans('getOptions');

        fDrawStickerInPlace($obj[0], o.x, o.y, o.scalex, o.scaley, o.angle);

        action = {
            tool: "sticker",
            colour: "",
            img: $obj[0],
            x: o.x,
            y: o.y,
            scalex: o.scalex,
            scaley: o.scaley,
            angle: o.angle,
            events: []
        };

        actions.push(action);
    }

    fCancelStickerPlacement();
}

function fCancelStickerPlacement() {
    var $obj = $("#stickerOverlay");

    if ($obj.length > 0) {
        $obj.freetrans('destroy');
        $obj.remove();

        $('#stickerOverlayTick').remove();
        $('#stickerOverlayCross').remove();
    }

    $('#stickerOverlays').hide();
    fShowGui(30);
}

function fDrawStickerInPlace(img, x, y, scalex, scaley, angle) {
    var hW = img.width * 0.5;
    var hH = img.height * 0.5;

    var scalexdiff = 1 - scalex;
    var scaleydiff = 1 - scaley;

    sketchpadContext.save();
    sketchpadContext.translate(x + (scalexdiff * hW), y + (scaleydiff * hH));
    sketchpadContext.translate(hW, hH);
    sketchpadContext.rotate(DegToRad(angle));
    sketchpadContext.scale(scalex, scaley);
    sketchpadContext.translate(-hW, -hH);

    sketchpadContext.drawImage(img, 0, 0);
    sketchpadContext.restore();

    /*if( currentStickerPack != null ) {
        console.log( "Calling ga(): " + currentStickerPack.label + currentStickerPlaced );
        ga( 'send', 'event', 'StickerClicked', currentStickerPack.label + currentStickerPlaced );
    }*/
}

function fShowStickers(index) {

    console.log("fShowStickers:" + index);

    stickersCurrentX = 0;
    stickersSpeed = 0;

    snapRight = false;
    snapLeft = false;

    fHidePopOutItems();

    var stickerholderoffset = $('#stickersholder').position();
    var toppos = ((stickerpaletteItemHeight * index) + (stickerpaletteStartY + 70) - stickerholderoffset.top);
    //toppos += canvasOffet.top;

    $('#stickerspopouts').css('top', toppos + 'px');
    var copyright = "";

    switch (index) {
        case 12:
        case 13:
        case 16:
            // Need to show the copyright
            break;
    }

    if (copyright != "") {
        $('#copyright').html(copyright);
        $('#copyright').show();
    }
    else {
        $('#copyright').hide();
    }

    stickerpackshowing = index;
    stickerImages = [];
    currentStickerPack = null;

    for (var i = 0; i < stickerItems.length; i++) {
        if (stickerItems[i].index == index) {
            currentStickerPack = stickerItems[i];

            console.log("Open stickers:" + currentStickerPack.label);
            ga('send', 'event', 'StickerPack', currentStickerPack.label);

            fRenderCurrentStickerPack();
            break;
        }
    }
}

function fRenderCurrentStickerPack() {
    if (currentStickerPack != null) {
        stickersContext.save();
        stickersContext.clearRect(0, 0, stickers.width, stickers.height);

        for (var i = 1; i < currentStickerPack.count; i++) {
            var imgsrc = 'img/stickers/' + currentStickerPack.id + '/thumbs/' + i + '.png';
            var sid = "sticker" + currentStickerPack.id + "_" + i;
            var img = imageManager._images[sid];

            var x = stickersCurrentX + 15 + ((i - 1) * stickersGap);

            stickersContext.drawImage(img, x, 14);

        }

        stickersContext.restore();
    }
}

function fHideStickers() {
    $('#stickerspopouts').css('top', '-5000px');
    currentStickerPack = null;
}

function fHideAllTools() {

    fHidePopOutItems();

    $('#stickersholder').toggleClass('slideout');
    $('#colourpaletteholder').toggleClass('slideout');
    $('#toolbox').toggleClass('slideout');
    $('#stickersholder').toggleClass('slideout');
    $('#app .tutorial').toggleClass('slideout');
    $('#app .quit').toggleClass('slideout');

}

function fHidePopOutItems() {
    $('#sizer').hide();
    $('#stickerspopouts').css('top', '-5000px');
    stickerpackshowing = 0;

}

function fResetTools() {
    $('#tool-brush').css('bottom', '-45px');
    $('#tool-pencil').css('bottom', '-45px');
    $('#tool-airbrush').css('bottom', '-45px');
    $('#tool-eraser').css('bottom', '-45px');
}

function fBack() {

}

function fUndo() {
    if (actions.length > 0) {
        var actionToRemove = actions[actions.length - 1];

        actionRedoBuffer.push(actionToRemove);
        actions.splice(actions.length - 1, 1);

        fRedraw();
    }
    fHideStickers();
}

function fRedo() {
    if (actionRedoBuffer.length > 0) {
        var redoActionToRemove = actionRedoBuffer[actionRedoBuffer.length - 1];

        actions.push(redoActionToRemove);
        actionRedoBuffer.splice(actionRedoBuffer.length - 1, 1);

        fRedraw();
    }
    fHideStickers();
}

function fShowSizer(tool) {
    $('#sizer').fadeIn();
    fResetTools();

    currentTool = tool;

    $('#tool-' + tool).css('bottom', '0px');

    switch (tool) {
        case "brush":
            $('#sizer').css('left', '114px');
            $('#sizer').css('bottom', '163px');
            break;
        case "pencil":
            $('#sizer').css('left', '208px');
            $('#sizer').css('bottom', '163px');
            break;
        case "airbrush":
            $('#sizer').css('left', '310px');
            $('#sizer').css('bottom', '153px');
            break;
        case "eraser":
            $('#sizer').css('left', '400px');
            $('#sizer').css('bottom', '123px');
            break;
    }

    Click();
    fHideStickers();
}

function DegToRad(d) {
    // Converts degrees to radians
    return d * 0.0174532925199432957;
}

function fToggleCircles(size) {
    $('.size5').removeClass('on');
    $('.size4').removeClass('on');
    $('.size3').removeClass('on');
    $('.size2').removeClass('on');
    $('.size1').removeClass('on');
    $('.size' + size).addClass('on');
    currentSize = sizes[size - 1];

    $('#sketchpad').removeClass('brush1').removeClass('brush2').removeClass('brush3').removeClass('brush4').removeClass('brush5');
    $('#sketchpad').addClass('brush' + size);
}

document.addEventListener("visibilitychange", onVisibilityChange, false);

function onVisibilityChange() {
    if (!document.hidden) {

        if (localStorage.getItem("tpCurrentGalleryItem") == -2) {

            clearPad();
            localStorage.setItem("tpCurrentGalleryItem", -1);
            localStorage.setItem("tpGalleryCount", localStorage.getItem("tpGalleryCount") + 1);

        } else if (localStorage.getItem("tpCurrentGalleryItem") != -1) {

            if (localStorage.getItem("tpGalleryItem" + localStorage.getItem("tpCurrentGalleryItem")) != null) {
                var galleryImage = new Image();
                galleryImage.src = localStorage.getItem("tpGalleryItem" + localStorage.getItem("tpCurrentGalleryItem"));
                clearPad();
                sketchpadContext.drawImage(galleryImage, 0, 0);
            }

        }
    }
}

function ImageManager() {
    this._baseURL = "";
    this._keys = new Array();
    this._images = new Array();
    this._toLoadCount = 0;
    this._loadedCount = 0;
    this._loaded = false;
    this._onLoaded = null;

    this._load = function (list) {
        var img;

        for (var i = 0; i < list.length; i++) {
            this._toLoadCount++;

            img = new Image();
            img.onload = this._loadingComplete;
            img.src = this._baseURL + list[i].path;
            img.imageManager = this;

            this._images[list[i].key] = img;
            this._keys.push(list[i].key);
        }
    }

    this._loadingComplete = function (e) {
        var imageManager = this.imageManager;
        imageManager._loadedCount++;

        if (imageManager._loadedCount == imageManager._toLoadCount) {
            imageManager._loaded = true;
            if (imageManager._onLoaded != null) {
                imageManager._onLoaded();
            }
        }
        this.imageManager = null;
    }
}

function handleFileSelect(evt) {
    var files = evt.target.files;

    console.log(files);

    var output = [];
    for (var i = 0, f; f = files[i]; i++) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var img = new Image();
            img.onload = function () {
                var maxDim = img.width;

                if (img.height > maxDim) {
                    maxDim = img.height;
                }

                var scale = w / maxDim;
                console.log(scale);

                if (scale >= 1) {
                    // No need to scale
                    currentStickerPlaced = "Local";
                    fCreateStickerOverlay(img.src, img.width, img.height);
                }
                else {
                    // Need to scale the image to fit within 250x250
                    var width = (img.width * scale) >> 0;
                    var height = (img.height * scale) >> 0;

                    console.log(width + "," + height);

                    var tempCanvas = document.createElement("canvas");
                    tempCanvas.width = width;
                    tempCanvas.height = height;

                    var ctx = tempCanvas.getContext("2d");
                    ctx.drawImage(img, 0, 0, width, height);
                    var src = tempCanvas.toDataURL();

                    currentStickerPlaced = "Local";
                    fCreateStickerOverlay(src, width, height);
                }

                // To fix bug in Chrome where this change event doesn't fire unless the selected image changes
                // So just delete the input and recreate it
                $('.fileupload-wrapper .fileinput').html('');
                $('.fileupload-wrapper .fileinput').html('<input id="tool-filebrowse" type="file" name="files[]" />');
                setupFileBrowseEvent();
            }

            img.src = reader.result;
        }

        reader.readAsDataURL(f);
    }
}

function urlEncode(s) {
    return encodeURIComponent(s);
}

function fSave() {
    var name = $('#Name').val();
    var age = $('#Age').val() >> 0;
    var terms = $('#Terms').is(":checked");
    var fileData = sketchpad.toDataURL();
    var isValid = true;

    fileData = fileData.replace(/^data:image\/(png|jpg);base64,/, "");

    $('#NameRequired').hide();
    $('#TermsRequired').hide();

    if (name == "") {
        $('#NameRequired').show();
        isValid = false;
    }
    if (!terms) {
        $('#TermsRequired').show();
        isValid = false;
    }

    if (!isValid) {
        return false;
    }
    //var data = "childsName=" + urlEncode( name ) + "&childsAge=" + urlEncode( age ) + "&imageData=" + urlEncode( fileData );
    var params = compMode
            ? JSON.stringify({ "name": name, "age": age, "imageData": fileData, "isGallery": isGallery, "compId": getParameterByName("compId"), "websiteId": websiteId })
            : JSON.stringify({ "name": name, "age": age, "imageData": fileData, "isGallery": isGallery, "websiteId": websiteId });

    $.ajax({
        url: '/Be-On-TV/PopArtWeb',
        type: 'POST',
        crossDomain: true,
        data: params,
        contentType: JSON_CONTENT_TYPE,
        dataType: 'json',
        success: function (result) {
            if (result.success) {

                $('#submit .form').hide();
                $('#submit .complete').show();
            }
        },
        error: function (result) {
            console.log("Error");

            $('#submit .form').hide();
            $('#submit .complete').show();
        }
    });

    //$( '#submit .form' ).hide();
    //$( '#submit .complete' ).show();

    return false;
}

var fSaveCompetition_lock = false;
function fSaveCompetition() {
    // Ensure submit hasn't already happened
    if (fSaveCompetition_lock) {
        return false;
    }
    fSaveCompetition_lock = true;

    var fileData = sketchpad.toDataURL();

    fileData = fileData.replace(/^data:image\/(png|jpg);base64,/, "");

    var params = JSON.stringify({ "imageData": fileData });

    $('#submit-competition .row.save').css('opactity', 0.5);

    $.ajax({
        url: '/Be-On-TV/UploadBase64Image',
        type: 'POST',
        data: params,
        contentType: JSON_CONTENT_TYPE,
        dataType: 'json',
        success: function (result) {
            if (result) {
                var imgUrl = result;

                //if (isCrossOrigin()) {
                //    window.location.reload();
                //} else {
                    location.href = returnUrl + questionMarkOrAnd(returnUrl) + "imageUrl=" + urlEncode(imgUrl);
                //}
                //if (result.success) {
                //    $('#submit .form').hide();
                //    $('#submit .complete').show();
                //}

            } else {
                // Allow submit/cancel button
                fSaveCompetition_lock = false;
            }
        },
        error: function (result) {
            fSaveCompetition_lock = false;
            console.log("Error");
        }
    });

    return false;
}

function Click() {
    PlaySound("swish1");
}

function PlaySound(id) {
    audioSamples[id].play();
}

function fSaveToGallery() {
    sketchpad.toBlob(function (blob) {
        saveAs(blob, "PopArt.png");
    });
    fHideStickers();

    return false;
}

function fShowUploadPopup() {
    $('#submit .form').show();
    $('#submit .complete').hide();
    $('#submit-competition .form').show();
    $('#submit-competition .complete').hide();

    $('#tool-upload-fb').click();
}

function fShowAreYouSurePopup() {
    $('#tool-trash-fb').click();
}

function fShowUploadCompletePopup() {
    $('#tool-upload-complete').click();
}

function fUploadCompletePopupClose() {
    fClosePopup();

    if (isCrossOrigin()) {
        window.location.reload();
    } else {
        showFront();
        //parent.window.location.href = "/Be-On-TV/Index/P1";
    }

    return false;
}

function questionMarkOrAnd(url) {
    return (url.indexOf('?') > -1 ? '&' : '?');
}
