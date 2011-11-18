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
                        document.getElementById('header').setAttribute("style","display:none");
                        main_menu.className += " menu-grid";
                        width = (mwf.screen.getWidth() ? mwf.screen.getWidth() : window.innerWidth);
                        width = width - width % 80;
                        height = (mwf.screen.getHeight() ? mwf.screen.getHeight() : window.innerHeight);
                        height = height - height % 80;
                        mwf.ucsfLayout.setGridWidth(width);
                        window.addEventListener('orientationchange', mwf.ucsfLayout.rotateGrid, false);
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