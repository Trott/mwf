/*! CachePicturefill - Offline caching for picturefill responsive image polyfill. Author: Rich Trott | Copyright: Regents of University of California, 2012 | License: MIT */

(function( w ) {
    "use strict";

    var applicationCache = w.applicationCache,
        localStorage = w.localStorage,
        canvas = w.canvas,
        sources,
        src;

    
    // We'll use this to clear the cache index when appcache updates.
    var clearCacheIndex = function () {
        localStorage.setItem('pfc_index', JSON.stringify({}));
    };

    // If appcache updates, clear the cache index.
    // Appcache + localStorage + canvas requirement = no need to worry about attachEvent.
    // Anything that has appcache + localStorage + canvas is going to have addEventListener.
    applicationCache.addEventListener('updateready', clearCacheIndex, false);
 
    // If the updateready event has already fired, clear the cache index.
    if(applicationCache.status === applicationCache.UPDATEREADY) {
      clearCacheIndex(); 
    }

    var ps = w.document.getElementsByTagName( "div" );        
    // Loop the pictures
    for( var i = 0, il = ps.length; i < il; i++ ){
        if( ps[ i ].getAttribute( "data-picture" ) !== null ){

            sources = ps[ i ].getElementsByTagName( "div" );

            // See which ones are cached in localStorage. Use the cached value.
                for( var j = 0, jl = sources.length; j < jl; j++ ){
                    if ((src = sources[j].getAttribute( "data-src" )) !== null ) {
                        if ((datauri = localStorage.getItem(src)) !== null) {
                            sources[j].setAttribute('data-src', datauri);
                        }
                    }
                }
        }
    }

}( this ));