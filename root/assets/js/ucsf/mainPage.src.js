var ucsf = ucsf || {};

ucsf.callAnalytics = function () {
    "use strict";
    var path = (window.location.hash === '#/main_menu') ? '/' : window.location.hash.substr(4);
    mwf.analytics.trackPageview(path);
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
