/*! CachePicturefill - Offline caching for picturefill responsive image polyfill. Author: Rich Trott | Copyright: Regents of University of California, 2012 | License: MIT */

(function( w ) {
    "use strict";

    var localStorage = w.localStorage,
        image,
        imageSrc,
        dataUri;

    w.picturefillOrig = w.picturefill;
    w.picturefill = function () {
        var cacheImage = function () {
            var canvas, ctx, imageSrc;
            canvas = w.document.createElement("canvas");
            canvas.width = this.width;
            canvas.height = this.height;

            ctx = canvas.getContext("2d");
            ctx.drawImage(this, 0, 0);

            dataUri = canvas.toDataURL();

            imageSrc = this.getAttribute("src");
            localStorage.setItem("pfc_s_"+imageSrc, dataUri);
            w.pfc_index["pfc_s_"+imageSrc] = 1;
            localStorage.setItem("pfc_index", JSON.stringify(w.pfc_index));
        };

        w.picturefillOrig();

        var ps = w.document.getElementsByTagName( "div" );
        // Loop the pictures
        for( var i = 0, il = ps.length; i < il; i++ ){
            if( ps[ i ].getAttribute( "data-picture" ) !== null ){

                image = ps[ i ].getElementsByTagName( "img" )[0];
                if (image) {
                    if ((imageSrc = image.getAttribute("src")) !== null) {
                        if (imageSrc.substr(0,4) !== "data:") {
                            image.addEventListener("load", cacheImage, false); 
                        }
                    }
                }
            }
        }
    };

}( this ));