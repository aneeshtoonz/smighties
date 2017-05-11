
var actions = [];
var sketchstickers = [];

var isSketching = false;
var sketchpad = document.getElementById("sketchpad");
var sketchpadContext = sketchpad.getContext("2d");

var currentSketchImage = [];
var action = [];
var density = 2;
var actionRedoBuffer = [];

var lastPoint = [];

var isGuiVisible = true;

function fHideGui() {
    if( isGuiVisible ) {
        isGuiVisible = false;

        fHidePopOutItems();
        $( '#stickersholder' ).addClass( 'slideout' );
        $( '#colourpaletteholder' ).addClass( 'slideout' );
        $( '#toolbox' ).addClass( 'slideout' );
        $( '#app .tutorial' ).addClass( 'slideout' );
        $( '#app .quit' ).addClass( 'slideout' );
    }
}


function fShowGui(delay) {
    if( !isGuiVisible ) {
        isGuiVisible = true;

        setTimeout( function() {
            $( '#stickersholder' ).removeClass( 'slideout' );
            $( '#colourpaletteholder' ).removeClass( 'slideout' );
            $( '#toolbox' ).removeClass( 'slideout' );
            $( '#app .tutorial' ).removeClass( 'slideout' );
            $( '#app .quit' ).removeClass( 'slideout' );
        }, delay );
    }
}

Hammer(sketchpad).on("dragup dragdown dragleft dragright touch release", function (ev) {
    ev.gesture.preventDefault();

    var offsetX = 0;
    var offsetY = 0;
    if( isChrome ) {
    }

    if (ev.type == "touch") {
        fHideGui();

        isSketching = true;
        action = {
            tool: currentTool,
            colour: currentColour,
            colourIndex: currentColourIndex,
            size: currentSize,
            events: []
        };

        lastPoint = { x: ( ev.gesture.center.pageX - canvasOffet.left ) + offsetX, y: ( ev.gesture.center.pageY - canvasOffet.top ) + offsetY };

    }

    if (ev.type == "release") {
        isSketching = false;
        actions.push(action);
        action = [];

        fClearRedoBuffer();
        fShowGui(1000);
    }

    if (isSketching) {
        action.events.push({
            x: ( ev.gesture.center.pageX - canvasOffet.left ) + offsetX,
            y: ( ev.gesture.center.pageY - canvasOffet.top ) + offsetY,
            event: ev.type,
            params: null
        });
    }

    fSketchEvents();

});

function fClearRedoBuffer() {
    actionRedoBuffer = new Array();
}

function fSketchEvents() {

    if( action.tool == "sticker" ) {
        fDrawStickerInPlace( action.img, action.x, action.y, action.scalex, action.scaley, action.angle );
        return;
    }

    if( action.events && action.events.length ) {
        if (action.tool == "eraser") {
            var oldcomposite;
            oldcomposite = sketchpadContext.globalCompositeOperation;
            sketchpadContext.globalCompositeOperation = "destination-out";
            action.colour = "rgba(0,0,0,1)";
        }

        sketchpadContext.lineJoin = sketchpadContext.lineCap = "round";


        if( action.tool == "airbrush" ) {
            var thisActionEvent = action.events[action.events.length - 1];

            if( thisActionEvent.params == null ) {
                thisActionEvent.params = Math.random() * 360;
            }

            var img = imageManager._images["spray" + action.colourIndex];
            var hW = img.width >> 1;
            var hH = img.height >> 1;

            sketchpadContext.save();
            sketchpadContext.translate( thisActionEvent.x + -hW, thisActionEvent.y + -hH );
            sketchpadContext.translate( hW, hH );
            sketchpadContext.rotate( DegToRad( thisActionEvent.params ) );

            var scale = 1;
            switch( action.size ) {
                case 80:
                    scale = 1;
                    break;
                case 50:
                    scale = 0.7;
                    break;
                case 30:
                    scale = 0.5;
                    break;
                case 15:
                    scale = 0.3;
                    break;
                case 5:
                    scale = 0.1;
                    break;

            }

            sketchpadContext.scale( scale, scale );
            sketchpadContext.translate( -hW, -hH );

            sketchpadContext.drawImage( img, 0, 0 );
            sketchpadContext.restore();

        } else if (action.tool == "brush") {

            var currentPoint = { x: action.events[action.events.length - 1].x, y: action.events[action.events.length - 1].y };

            var dist = distanceBetween(lastPoint, currentPoint);
            var angle = angleBetween( lastPoint, currentPoint );

            var img = imageManager._images["brush" + action.colourIndex];
            var hW = img.width >> 1;
            var hH = img.height >> 1;



            var scale = 1;
            switch( action.size ) {
                case 80:
                    scale = 1;
                    break;
                case 50:
                    scale = 0.7;
                    break;
                case 30:
                    scale = 0.5;
                    break;
                case 15:
                    scale = 0.3;
                    break;
                case 5:
                    scale = 0.1;
                    break;

            }

            for( var i = 0; i < dist; i++ ) {
                sketchpadContext.save();

                x = lastPoint.x + ( Math.sin( angle ) * i );
                y = lastPoint.y + ( Math.cos( angle ) * i );
                sketchpadContext.translate( x + -hW, y + -hH );
                sketchpadContext.translate( hW, hH );

                sketchpadContext.scale( scale, scale );
                sketchpadContext.translate( -hW, -hH );

                sketchpadContext.drawImage( img, 0, 0 );
                sketchpadContext.restore();
            }

            lastPoint = currentPoint;

        } else {

            sketchpadContext.beginPath();
            sketchpadContext.moveTo(action.events[0].x, action.events[0].y);

            var _ref = action.events;

            var p1 = action.events[0];
            var p2 = action.events[1];

            if (action.events.length == 1) {
                p2 = p1;
            }

            for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                event = _ref[_i];
                var midPoint = midPointBtw(p1, p2);
                sketchpadContext.quadraticCurveTo(p1.x, p1.y, midPoint.x, midPoint.y);
                p1 = action.events[_i];
                p2 = action.events[_i + 1];
            }

            sketchpadContext.lineTo(p1.x, p1.y);
            sketchpadContext.strokeStyle = action.colour;
            sketchpadContext.lineWidth = action.size;
            sketchpadContext.stroke();
        }

        if (action.tool == "eraser") {
            sketchpadContext.globalCompositeOperation = oldcomposite;
        }
    }
}

function clearPad() {
    console.log( "clearPad" );

    sketchpadContext.save();
    sketchpadContext.fillStyle = "#ffffff";
    sketchpadContext.fillRect( 0, 0, w, h );
    sketchpadContext.restore();
}

function fRedraw() {
    //sketchpadContext.clearRect( 0, 0, w, h );
    clearPad();

    for( var i = 0; i < actions.length; i++ ) {
        action = actions[i];
        lastPoint = { x: action.x, y: action.y };

        switch( action.tool ) {
            case "brush":
            case "airbrush":
                for( var a = 0; a < actions[i].events.length; a++ ) {
                    action = {
                        tool: actions[i].tool,
                        colour: actions[i].colour,
                        size: actions[i].size,
                        colourIndex: actions[i].colourIndex,
                        events: []
                    };

                    action.events.push( actions[i].events[a] );
                    fSketchEvents();
                }
                break;
            default:
                fSketchEvents();
                break;
        }
    }
}


function getRandomFloat(min, max) {
    return Math.random() * (max - min) + min;
}

function distanceBetween(point1, point2) {
    return Math.sqrt(Math.pow(point2.x - point1.x, 2) + Math.pow(point2.y - point1.y, 2));
}

function angleBetween(point1, point2) {
    return Math.atan2(point2.x - point1.x, point2.y - point1.y);
}

function fAddSketchImage(src, x, y, w, h) {
    if (src) {
        var image = new Image();
        image.src = src;
        image.onload = function () {
            var imageItem = { image: this, x: x, y: y, w: w, h: h };
            renderImage(sketchpadContext, imageItem);
            currentSketchImage = imageItem;
        }
    }
}

function fClearSketch() {
    //sketchpadContext.clearRect( 0, 0, w, h );
    clearPad();

    stickerOverlayCount = 0;
    $('#stickerOverlays').html('');
    actions = [];

    fClosePopup();

    return false;
}

function midPointBtw(p1, p2) {
    return {
        x: p1.x + (p2.x - p1.x) / 2,
        y: p1.y + (p2.y - p1.y) / 2
    };
}
