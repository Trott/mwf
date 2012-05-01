mwf.ucsf = mwf.ucsf || {};

mwf.ucsf.callAnalytics = function () {
    var path = (window.location.hash == '#/main_menu') ? '/' : window.location.hash.substr(4);
    mwf.site.analytics.trackPageview(path);
}

window.addEventListener('hashchange', mwf.ucsf.callAnalytics, false);

mwf.ucsf.toggleHeaderAndFooter = function () {
    var header = document.getElementById('header');
    var footer = document.getElementById('footer');
    var topButton = document.getElementById('button-top');
            
    var headFootStyle = location.hash=="#/main_menu" ? "" : "display:block";
    if (topButton) {
        if ((location.hash=="#/main_menu") || mwf.userAgent.isNative()) {
            topButton.setAttribute("style","display:none");
        } else {
            topButton.setAttribute("style","display:inline");
        }
    }
            
    if (header)
        header.setAttribute("style",headFootStyle);
            
    if (footer && mwf.userAgent.isNative() && mwf.userAgent.getOS()==="iphone_os" && location.hash==="#/main_menu") {
        footer.setAttribute("style","display:none");
    } else {
        footer.setAttribute("style","")
    }
}

window.addEventListener('hashchange', mwf.ucsf.toggleHeaderAndFooter, false);
window.addEventListener('DOMContentLoaded', mwf.ucsf.toggleHeaderAndFooter, false);

mwf.ucsf.nativeAndroidDisplayFix = function () {
    if (mwf.userAgent.isNative() && mwf.userAgent.getOS()=='android' && location.hash=="#/main_menu") {
        document.getElementById('main_menu').setAttribute("style", "display:inline");
    }
}

window.addEventListener('hashchange', mwf.ucsf.nativeAndroidDisplayFix, false);