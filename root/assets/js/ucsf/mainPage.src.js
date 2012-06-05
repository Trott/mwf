var ucsf = ucsf || {};

ucsf.callAnalytics = function (event) {
    "use strict";
    // Analytics fires on page load, so if we're redirecting from something
    // without a hash to the default hash, don't do anything.
    if (event.oldURL.indexOf('#') !== -1) {
        var path = (window.location.hash === '#/main_menu') ? '/' : window.location.hash.substr(4);
        mwf.analytics.trackPageview(path);
    }
};

window.addEventListener('hashchange', ucsf.callAnalytics, false);

ucsf.toggleHeaderAndFooter = function () {
    "use strict";
    var header = document.getElementById('header'),
        headFootStyle = location.hash === "#/main_menu" ? "" : "display:block";

    if (header) {
        header.setAttribute("style", headFootStyle);
    }
};

window.addEventListener('hashchange', ucsf.toggleHeaderAndFooter, false);
window.addEventListener('DOMContentLoaded', ucsf.toggleHeaderAndFooter, false);
