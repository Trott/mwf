if ("onhashchange" in window) {
    window.onhashchange = function() {
        var header = document.getElementById('header');
        var footer = document.getElementById('footer');
        var topButton = document.getElementById('button-top');
            
        var headFootStyle = location.hash=="il/main_menu" ? "" : "display:block";
            
        if (topButton) {
            if ((location.hash=="il/main_menu") || mwf.userAgent.isNative()) {
                topButton.setAttribute("style","display:none");
            } else {
                topButton.setAttribute("style","display:inline");
            }
        }
            
        if (header)
            header.setAttribute("style",headFootStyle);
            
        if (footer && mwf.userAgent.isNative() && mwf.userAgent.getOS()==="iphone_os" && show==="main_menu") {
            footer.setAttribute("style","display:none");
        } else {
            footer.setAttribute("style","")
        }
    }
}