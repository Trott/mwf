/**
 * Defines methods under mwf.full.history that handle browser history for 
 * in-page actions.
 *
 * @package full
 * @subpackage js
 *
 * @author trott
 * @copyright Copyright (c) 2011 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20111205
 *
 * @requires mwf
 * 
 */

mwf.full.history = new function() {
    
    this.init = function() {
        var anchors = document.getElementsByTagName("a");

        for (var i = 0; i < anchors.length ; i++) {
            anchors[i].addEventListener("click", 
                function (event) {
                    var targetId = 'il'+this.pathname;
                    var target = document.getElementById(targetId);
                    if (target != null) { 
                        event.preventDefault();
                        var clickedNode = this.parentNode.parentNode.parentNode;
                        var clickedNodeId = clickedNode.getAttribute('id');
                        clickedNode.setAttribute("style","display:none");
                        history.replaceState({
                            show:clickedNodeId, 
                            hide:targetId
                        },'');
                        history.pushState({
                            show:targetId,
                            hide:clickedNodeId
                        },'','#'+targetId);
                        target.setAttribute("style","display:block");
                    }
                }, 
                false);
        }
    }
    window.addEventListener("popstate", function(event) {
        if (event.state) {
            if (event.state.hasOwnProperty('hide') && event.state.hasOwnProperty('show')) {
                document.getElementById(event.state.hide).setAttribute("style","display:none"); 
                document.getElementById(event.state.show).setAttribute("style","display:block");
            }
        }
    }, false);
}
document.addEventListener('DOMContentLoaded', mwf.full.history.init, false);