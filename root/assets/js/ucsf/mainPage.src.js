mwf.ucsf = mwf.ucsf || {};

mwf.ucsf.toggleHeaderAndFooter = function() {
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

if ("onhashchange" in window) {
    window.onhashchange = mwf.ucsf.toggleHeaderAndFooter;
}

document.addEventListener('DOMContentLoaded', mwf.ucsf.toggleHeaderAndFooter, false);
