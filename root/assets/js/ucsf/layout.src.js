mwf.ucsfLayout = new function() {

    var width;
    var height;

    this.init = function(event) {
        var main_menu = document.getElementById("main_menu");

        if (main_menu) {
            if (mwf.standard.preferences.isSupported()) {
                var pref = mwf.standard.preferences.get("main_menu_layout");
                if (! pref) {
                    pref = mwf.userAgent.isNative() ? "grid" : "list";
                }
                    
                switch (pref) {
                    case "grid":
                        var header = document.getElementById('header');
                        if (header)
                            header.setAttribute("style","display:none");
                        main_menu.className += " menu-grid";
                        width = (mwf.browser.getWidth() ? mwf.browser.getWidth() : window.innerWidth);
                        width = width - width % 80;
                        height = (mwf.browser.getHeight() ? mwf.browser.getHeight() : window.innerHeight);
                        height = height - height % 80;
                        mwf.ucsfLayout.setGridWidth(width);
                        window.addEventListener('orientationchange', mwf.ucsfLayout.rotateGrid, false);
                        var backButton = document.getElementById('button-top');
                        if (backButton!=null)
                            backButton.setAttribute("style","display:none");
                        break;
                    case "list":
                    default:
                        main_menu.className += " menu-padded";
                }
            } else {
                main_menu.className += " menu-padded";        
            }
        }
    }
        
    this.setGridWidth = function(gridWidth) {
        document.getElementById('main_menu').firstChild.setAttribute("style","width:"+gridWidth+"px");
    }

    this.rotateGrid = function(event) {
        switch (window.orientation) {
            case 0:
            case 180:
                mwf.ucsfLayout.setGridWidth(width);
                break;
            case -90:
            case 90:
                mwf.ucsfLayout.setGridWidth(height);
                break;
        }
    }
}
document.addEventListener('DOMContentLoaded', mwf.ucsfLayout.init, false);