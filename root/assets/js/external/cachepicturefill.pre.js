/*! CachePicturefill - Offline caching for picturefill responsive image polyfill. Author: Rich Trott | Copyright: Regents of University of California, 2012 | License: MIT */
//TODO: Merge this with .post.js so that all the looping through divs happens inside picturefill().
(function( w ) {
    "use strict";

    var applicationCache = w.applicationCache,
        localStorage = w.localStorage,
        sources,
        src,
        pfc_index_string;

    
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

    pfc_index_string = localStorage.getItem('pfc_index') || '{}';
    w.pfc_index = JSON.parse(pfc_index_string);
    var ps = w.document.getElementsByTagName( "div" );
    // Loop the pictures
    for( var i = 0, il = ps.length; i < il; i++ ){
        if( ps[ i ].getAttribute( "data-picture" ) !== null ){

            sources = ps[ i ].getElementsByTagName( "div" );
            // See which ones are cached in localStorage. Use the cached value.
            for( var j = 0, jl = sources.length; j < jl; j++ ){
                if ((src = sources[j].getAttribute( "data-src" )) !== null ) {
                    if ( w.pfc_index.hasOwnProperty('pfc_s_'+src)) {
                        sources[j].setAttribute('data-src', localStorage.getItem('pfc_s_'+src));
                    }
                }
            }
        }
    }

}( this ));