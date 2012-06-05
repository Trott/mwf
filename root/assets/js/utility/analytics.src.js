/**
 *
 * @author trott
 * @copyright Copyright (c) 2010-12 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120208
 */

// Google Analytics API requires this to be a global
var _gaq = _gaq || [];
(function (d, t) {
    var g = d.createElement(t),
        s = d.getElementsByTagName(t)[0];
    g.src = '//www.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g, s);
}(document, 'script'));

mwf.analytics = (function () {
    // Key for the entire site. Tracks everything.
    var key = "UA-15855907-1",
    // Keys for just particular paths. Tracks only things in those paths.
        pathKeys = [{a: "UA-552286-29", s: "/library/"}];

    return {
        trackPageview: function (url) {
            var i;
            url = url || window.location.pathname + window.location.search + window.location.hash;
            _gaq.push(["_trackPageview", url]);

            for (i = 0; i < pathKeys.length; i = i + 1) {
                if (url.substring(0, pathKeys[i].s.length) === pathKeys[i].s) {
                    _gaq.push(["t" + i + "._trackPageview", url]);
                }
            }
        },

        init: function (ua) {
            var i;
            ua = ua || navigator.userAgent;
            _gaq.push(["_setAccount", key]);

            for (i = 0; i < pathKeys.length; i = i + 1) {
                _gaq.push(["t" + i + "._setAccount", pathKeys[i].a]);
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
}());

mwf.analytics.init();