/*! PicturefillCache - Offline caching for picturefill responsive image polyfill. Author: Rich Trott | Copyright: Regents of University of California, 2012 | License: MIT */

(function( w ) {
    "use strict";

    var localStorage = w.localStorage,
        applicationCache = w.applicationCache,
        image,
        imageSrc,
        dataUri,
        pfc_index_string,
        pfc_index;

    pfc_index_string = localStorage.getItem('pfc_index') || '{}';
    pfc_index = JSON.parse(pfc_index_string);

    // We'll use this to clear the cache index when appcache updates.
    var clearCacheIndex = function () {
        localStorage.setItem('pfc_index', JSON.stringify({}));
    };

    // If appcache updates, clear the cache index.
    // Appcache == IE10 or later == no need to worry about attachEvent (IE8 and earlier)
    // Anything that has appcache is going to have addEventListener.
    applicationCache.addEventListener('updateready', clearCacheIndex, false);

    // If the updateready event has already fired, clear the cache index.
    if(applicationCache.status === applicationCache.UPDATEREADY) {
      clearCacheIndex();
    }

    var srcFromCacheRan = false;
    var srcFromCache = function ( ps ) {
        var sources, src;

        // Loop the pictures
        for( var i = 0, il = ps.length; i < il; i++ ){
            if( ps[ i ].getAttribute( "data-picture" ) !== null ){

                sources = ps[ i ].getElementsByTagName( "div" );
                // See which ones are cached in localStorage. Use the cached value.
                for( var j = 0, jl = sources.length; j < jl; j++ ){
                    if ((src = sources[j].getAttribute( "data-src" )) !== null ) {
                        if ( pfc_index.hasOwnProperty('pfc_s_' + src)) {
                            sources[j].setAttribute('data-src', localStorage.getItem('pfc_s_' + src));
                        }
                    }
                }
            }
        }
    };

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
        pfc_index["pfc_s_"+imageSrc] = 1;
        localStorage.setItem("pfc_index", JSON.stringify(pfc_index));
    };

    w.picturefillOrig = w.picturefill;
    w.picturefill = function () {
        var ps = w.document.getElementsByTagName( "div" );

        if (! srcFromCacheRan ) {
            srcFromCacheRan = true;
            srcFromCache( ps );
        }

        w.picturefillOrig();

        // Loop the pictures
        for( var i = 0, il = ps.length; i < il; i++ ){
            if( ps[ i ].getAttribute( "data-picture" ) !== null ){

                image = ps[ i ].getElementsByTagName( "img" )[0];
                if (image) {
                    if ((imageSrc = image.getAttribute("src")) !== null) {
                        if (imageSrc.substr(0,5) !== "data:") {
                            image.addEventListener("load", cacheImage, false);
                        }
                    }
                }
            }
        }
    };

}( this ));