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
        console.log(url);
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
                console.log('state');
                console.log(state)
                showContent(state.show,state.hide);
            } 
            if (event.state) {
                console.log('event state');
                console.log(event.state);
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
                    console.log('previous state');
                    console.log(previousState);
                }
                showContent(event.state.show,event.state.hide);
            }            
        }, false);
        
        if (window.location.hash=='')
            showContent('main_menu', []);
        else
            showContent(window.location.hash.substring(2),[])
    }
}

document.addEventListener('DOMContentLoaded', mwf.full.history.init, false);
