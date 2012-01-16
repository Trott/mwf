/**
 *
 * @author trott
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20111123
 *
 * @requires mwf.userAgent
 */

mwf.site.analytics.trackPageview = function(url) {
    if (mwf.site.analytics.key) {
        _gaq.push(["_trackPageview",url]);
    }
}

if(mwf.site.analytics.key){
    var _gaq = _gaq || [];
    _gaq.push(["_setAccount", mwf.site.analytics.key]);
    
    if (mwf.userAgent.isNative()) {
        // Special tracking for native client
        _gaq.push(['_setCustomVar', 1, 'VNCT', mwf.userAgent.getOS(), 1]);
        _gaq.push(['_setCustomVar', 2, 'SNCT', mwf.userAgent.getOS(), 2]);       
        _gaq.push(['_setCustomVar', 3, 'PNCT', mwf.userAgent.getOS(), 3]);       
    }
    
    _gaq.push(["_trackPageview"]);
    
    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();
}