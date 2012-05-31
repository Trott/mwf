/**
 *
 * @author trott
 * @copyright Copyright (c) 2010-12 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120208
 */

// Google Analytics API requires this to be a global
var _gaq = _gaq || [];

mwf.analytics = new function(){
    // Key for the entire site. Tracks everything.
    var key = "UA-15855907-1";
    // Keys for just particular paths. Tracks only things in those paths.
    var pathKeys = [{
        a:"UA-552286-29", 
        s:"/library/"
    }];

    this.trackPageview = function(url) {
        url = url || window.location.pathname + window.location.search + window.location.hash; 
        _gaq.push(["_trackPageview",url]);
    
        for (var i = 0; i < pathKeys.length; i++) {
            if (url.substring(0,pathKeys[i].s.length) == pathKeys[i].s)
                _gaq.push(["t"+i+"._trackPageview",url]);
        }
    }

    this.init = function(ua) {
        ua = ua || navigator.userAgent;
        _gaq.push(["_setAccount", key]);
    
        for (var i = 0; i < pathKeys.length; i++) {
            _gaq.push(["t"+i+"._setAccount",pathKeys[i].a]);
        }
    
        if (/ mwf\-native\-[a-z]*\/[\d\.]*$/.test(ua)) {
            // Special tracking for native client.
            // @todo: Make this configurable (on|off, at least) and customizable
            //   (might want to track native container version number, for example)
            // @todo: Possible to integration test this with PHP code?
            _gaq.push(['_setCustomVar', 1, 'mwf_native_client', '1']);       
        }

        this.trackPageview();
    }
};

mwf.analytics.init();