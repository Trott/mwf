mwf.ucsf = mwf.ucsf || {};

mwf.ucsf.callAnalytics = function () {
    var path = (window.location.hash == '#/main_menu') ? '/' : window.location.hash.substr(4);
    mwf.site.analytics.trackPageview(path);
}

document.addEventListener('hashchange',mwf.ucsf.callAnalytics);

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

document.addEventListener('hashchange', mwf.ucsf.toggleHeaderAndFooter);
document.addEventListener('DOMContentLoaded', mwf.ucsf.toggleHeaderAndFooter, false);

mwf.ucsf.nativeAndroidDisplayFix = function () {
    if (mwf.userAgent.isNative() && mwf.userAgent.getOS()=='android' && location.hash=="#/main_menu") {
        document.getElementById('main_menu').setAttribute("style", "display:inline");
    }
}

document.addEventListener('hashchange', mwf.ucsf.nativeAndroidDisplayFix);