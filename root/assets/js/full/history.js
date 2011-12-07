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
 * @requires mwf.standard.preferences
 * @requires mwf.full.fastLink
 * 
 */

mwf.full.history = new function() {
    
    var _link = [];
    
    this.init = function() {
        var anchors = document.getElementsByTagName("a");
        
        function showContent(show,hide) {
            if (hide != '')
                document.getElementById(hide).setAttribute("style","display:none"); 
            document.getElementById(show).setAttribute("style","display:block");
            if (mwf.standard.preferences.isSupported() && mwf.standard.preferences.get('main_menu_layout')!='grid') {
                var buttonDisplay = show=="main_menu" ? "display:none" : "display:block";
                document.getElementById('button-top').setAttribute("style",buttonDisplay);
            }
        }

        for (var i = 0; i < anchors.length ; i++) {
            if (document.getElementById('il'+anchors[i].pathname) != null)
                _link.push(new mwf.full.fastLink(anchors[i],function (event) {
                    var targetId = 'il'+this.element.pathname;
                    var target = document.getElementById(targetId);
                    if (target != null) {
                        event.preventDefault();
                        var clickedNode = this.element.parentNode.parentNode.parentNode;
                        var clickedNodeId = clickedNode.getAttribute('id');
                        showContent(targetId,clickedNodeId);
                        history.replaceState({
                            show:clickedNodeId, 
                            hide:targetId
                        },'');
                        window.location.hash = '#' + targetId;
                        history.replaceState({
                            show:targetId,
                            hide:clickedNodeId
                        },'');
                    }
                }));
        }
    
        window.addEventListener("popstate", function(event) {
            if (event.state) {
                if (event.state.hasOwnProperty('hide') && event.state.hasOwnProperty('show')) {
                    showContent(event.state.show,event.state.hide);
                }
            }
        }, false);
        
        if (window.location.hash=='')
            showContent('main_menu', '');
        else
            showContent(window.location.hash.substring(1),'')
    }
}
document.addEventListener('DOMContentLoaded', mwf.full.history.init, false);