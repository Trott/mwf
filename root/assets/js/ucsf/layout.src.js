mwf.ucsfLayout = new function() {

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
                        var backButton = document.getElementById('button-top');
                        if (backButton!=null)
                            backButton.setAttribute("style","display:none");
                        break;
                    case "list":
                    default:
                        main_menu.className += " padded";
                }
            } else {
                main_menu.className += " padded";        
            }
        }
    }
}
document.addEventListener('DOMContentLoaded', mwf.ucsfLayout.init, false);