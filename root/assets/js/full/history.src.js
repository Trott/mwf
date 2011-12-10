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
    var _indexToUrl = [];
    
    this.setState = function(object,url) {
        var index = _indexToUrl.indexOf(url);
        if (index<0) {
            index = _indexToUrl.length; 
            _indexToUrl.push(url);
        }
        _states[index] = object;
    }
    
    this.saveState = function(object,title,url) {
        url = url ? url : location.pathname + location.hash;
        this.setState(object,url);
        history.replaceState(object,title,url);
    }
    
    this.getState = function(id) {
        url = id ? location.pathname + '#/' + id : location.pathname + location.hash;
        var index = _indexToUrl.indexOf(url)
        return index<0 ? undefined : _states[index];
    }
    
    this.hideArray = function(hide,newHideId) {
        if (hide.indexOf(newHideId) < 0) {
            hide.push(newHideId);
        }
        return hide;
    }
        
    this.init = function() {
        var anchors = document.getElementsByTagName("a");
        
        function showContent(show,hide) {
            var hideElement;
            for (i=0; i<hide.length; i++) {
                hideElement = document.getElementById(hide[i]);
                if (hideElement)
                    hideElement.setAttribute("style","display:none");
            }
            var showElement = document.getElementById(show);
            if (showElement)
                showElement.setAttribute("style","display:block");
            else
                return false;
            if (mwf.standard.preferences.isSupported() && mwf.standard.preferences.get('main_menu_layout')!='grid' && !mwf.userAgent.isNative()) {
                var buttonDisplay = show=="main_menu" ? "display:none" : "display:block";
                document.getElementById('button-top').setAttribute("style",buttonDisplay);
            }
            return true;
        }

        for (var i = 0; i < anchors.length ; i++) {
            if ((document.getElementById('il'+anchors[i].pathname) != null) || (mwf.site.root == anchors[i].href.replace(/\/$/, "")))
                _link.push(new mwf.full.fastLink(anchors[i],function (event) {
                    var targetId = (mwf.site.root == this.element.href.replace(/\/$/, "")) ? 'main_menu' : 'il'+this.element.pathname;
                    if (targetId == 'il/main_menu') 
                        targetId = 'main_menu';
                    var target = document.getElementById(targetId);
                    if (target != null) {
                        event.preventDefault();
                        var clickedNode = document.getElementById(window.location.hash.substr(2));
                        var clickedNodeId = clickedNode.getAttribute('id');
                        showContent(targetId,[clickedNodeId]);

                        var state = mwf.full.history.getState();
                        var hide = (state && state.hasOwnProperty('hide')) ? 
                        mwf.full.history.hideArray(state.hide,targetId) :
                        [targetId];
                        
                        mwf.full.history.saveState({
                            show:clickedNodeId, 
                            hide:hide
                        },'');

                        window.location.hash = '#/' + targetId;
                        
                        state = mwf.full.history.getState();
                        hide = (state && state.hasOwnProperty('hide')) ?
                        mwf.full.history.hideArray(state.hide,clickedNodeId) :
                        [clickedNodeId];
                    
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
            state = mwf.full.history.getState();
            if (state) {
                showContent(state.show,state.hide);
            } 
            if (event.state) {
                //Retrieve adjacent pages and add our "show" value to their hide values
                var previousState;
                var hide;
                for (i=0; i<event.state.hide.length; i++) {
                    previousState = mwf.full.history.getState(event.state.hide[i]);
                    if (previousState) {
                        hide = mwf.full.history.hideArray(previousState.hide,event.state.show);
                        mwf.full.history.setState({
                            show:event.state.hide[i], 
                            hide:hide
                        },location.pathname + '#/' + event.state.hide[i]);
                    }
                }
                showContent(event.state.show,event.state.hide);
            }            
        }, false);
        
        if (! window.location.hash ) 
            window.location.hash = '#/main_menu';
        showContent(window.location.hash.substring(2),[]);
    }
}

document.addEventListener('DOMContentLoaded', mwf.full.history.init, false);
