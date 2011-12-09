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
    var _states = [];
    
    this.saveState = function(object,title,url) {
        url = url ? url : location.href;
        _states[history.length] = object;
        history.replaceState(object,title,url);
    }
    
    this.getState = function() {
        if (history.length < _states.length) {
            return _states[history.length];
        } else {
            return undefined;
        }
    }
        
    this.init = function() {
        var anchors = document.getElementsByTagName("a");
        
        
        function showContent(show,hide) {
            for (i=0; i<hide.length; i++)
                document.getElementById(hide[i]).setAttribute("style","display:none"); 
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
                        showContent(targetId,[clickedNodeId]);

                        var state = mwf.full.history.getState();
                        var hide;
                        if (state && state.hasOwnProperty('hide')) {
                            hide = state.hide;
                            if (hide.indexOf(targetId) < 0) {
                                hide.push(targetId);
                            }
                        } else {
                            hide = [targetId];
                        }
                        
                        mwf.full.history.saveState({
                            show:clickedNodeId, 
                            hide:hide
                        },'');

                        window.location.hash = '#/' + targetId;
                        
                        //TODO:  DRY cleanup. This should be a function.
                        state = mwf.full.history.getState();
                        if (state && state.hasOwnProperty('hide')) {
                            hide = state.hide;
                            if (hide.indexOf(clickedNodeId) < 0) {
                                hide.push(clickedNodeId);
                            }
                        } else {
                            hide = [clickedNodeId];
                        }
                    
                        mwf.full.history.saveState({
                            show:targetId,
                            hide:hide
                        },'');
                        if(mwf.site.analytics){
                            mwf.site.analytics.trackPageview(this.element.pathname);
                        }
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
            showContent('main_menu', []);
        else
            showContent(window.location.hash.substring(2),[])
    }
}

document.addEventListener('DOMContentLoaded', mwf.full.history.init, false);
