/**
 *
 * @author trott
 * @copyright Copyright (c) 2010-12 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120208
 */

// Google Analytics API requires this to be a global
var _gaq = _gaq || [];

mwf.analytics = function() {
    
    this.key = "UA-15855907-1";
    this.pathKeys = [{
        a:"UA-552286-29", 
        s:"/library/"
    }];

    this.trackPageview = function(url) {
        url = url || window.location.pathname + window.location.search + window.location.hash; 
        if (this.key) {
            _gaq.push(["_trackPageview",url]);
        }
    
        for (var i = 0; i < this.pathKeys.length; i++) {
            if (url.substring(0,this.pathKeys[i].s.length) == this.pathKeys[i].s)
                _gaq.push(["t"+i+"._trackPageview",url]);
        }
    }

    this.init = function(ua) {
        ua = ua || navigator.userAgent;
        if(this.key) {
            _gaq.push(["_setAccount", this.key]);
        }
    
        for (var i = 0; i < this.pathKeys.length; i++) {
            _gaq.push(["t"+i+"._setAccount",this.pathKeys[i].a]);
        }
    
        if (/ mwf\-native\-[a-z]*\/[\d\.]*$/.test(ua)) {
            // Special tracking for native client.
            // @todo: Make this configurable (on|off, at least) and customizable
            //   (might want to track native container version number, for example)
            // @todo: Possible to integration test this with PHP code?
            _gaq.push(['_setCustomVar', 1, 'mwf_native_client', '1']);       
        }

        this.trackPageview();

        if (_gaq.length!=0) {
            (function() {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();
        }
    }
    return this;
}();

this.init();