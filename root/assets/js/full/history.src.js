/**
 *
 * @author trott
 * @copyright Copyright (c) 2011-12 UC Regents
 * @version 20120423
 *
 * @requires mwf
 * @requires mwf.userAgent
 * @uses mwf.site.analytics
 * 
 */

(function() {
    
    var lightningTouch = function(element, handler) {
        this.element = element;
        this.handler = handler;

        element.addEventListener('touchstart', this, false);
        element.addEventListener('click', this, false);  
    };

    lightningTouch.prototype.handleEvent = function(event) {
        switch (event.type) {
            case 'touchstart':
                this.onTouchStart(event);
                break;
            case 'touchmove':
                this.onTouchMove(event);
                break;
            case 'touchend':
                this.onClick(event);
                break;
            case 'click':
                this.onClick(event);
                break;
        }
    };

    lightningTouch.prototype.onTouchStart = function(event) {
        event.stopPropagation();

        this.element.addEventListener('touchend', this, false);
        document.body.addEventListener('touchmove', this, false);

        this.startX = event.touches[0].clientX;
        this.startY = event.touches[0].clientY;
    };

    lightningTouch.prototype.onTouchMove = function(event) {
        if (Math.abs(event.touches[0].clientX - this.startX) > 10 ||
            Math.abs(event.touches[0].clientY - this.startY) > 10) {
            this.reset();
        }
    };

    lightningTouch.prototype.onClick = function(event) {
        event.stopPropagation();
        this.reset();
        this.handler(event);
    };

    lightningTouch.prototype.reset = function() {
        this.element.removeEventListener('touchend', this, false);
        document.body.removeEventListener('touchmove', this, false);
    };
        
    var link = [];
    var states = [];
    var indexToUrl = [];
    
    var setState = function(object,url) {
        var index = indexToUrl.indexOf(url);
        if (index<0) {
            index = indexToUrl.length; 
            indexToUrl.push(url);
        }
        states[index] = object;
    };
    
    var saveState = function(object,title,url) {
        url = url ? url : location.pathname + location.hash;
        setState(object,url);
        history.replaceState(object,title,url);
    };
    
    var getState = function(id) {
        url = id ? location.pathname + '#/' + id : location.pathname + location.hash;
        var index = indexToUrl.indexOf(url)
        return index<0 ? undefined : states[index];
    };
    
    var hideArray = function(hide,newHideId) {
        if (hide.indexOf(newHideId) < 0) {
            hide.push(newHideId);
        }
        return hide;
    };
    
    var init = function() { 
        function showContent(show,hide) {
            var hideElement;
            for (i=0; i<hide.length; i++) {
                hideElement = document.getElementById(hide[i]);
                if (hideElement)
                    hideElement.setAttribute("style", "display:none");
            }
            var showElement = document.getElementById(show);
            
            //TODO: Do we really need this? 
            var displayValue = (mwf.userAgent.isNative() && mwf.userAgent.getOS()=='android' && show=="main_menu") ? "display:inline" : "display:block";
            //END-TODO
            
            if (showElement) {
                //TODO: UCSF specific variable in next line. 
                showElement.setAttribute("style", displayValue);
            } else {
                return false;
            }

            return true;
        }

        if (! window.location.hash ) 
            //TODO: main_menu ID should be configurable
            window.location.hash = '#/main_menu';
        showContent(window.location.hash.substring(2),[]);
        
        if (! (history instanceof Object && history.replaceState instanceof Function))
            return;

        var anchors = document.getElementsByTagName("a");


        this.touchHandler = function (event) {
            var targetId = (mwf.site.root == this.element.href.replace(/\/$/, "")) ? 'main_menu' : 'il'+this.element.pathname;
            if (targetId == 'il/main_menu') 
                targetId = 'main_menu';
            var target = document.getElementById(targetId);
            if (target != null) {
                event.preventDefault();
                var clickedNode = document.getElementById(window.location.hash.substr(2));
                var clickedNodeId = clickedNode ? clickedNode.getAttribute('id') : 'main_menu';
                showContent(targetId,[clickedNodeId]);

                var state = getState();
                var hide = (state && state.hasOwnProperty('hide')) ? 
                hideArray(state.hide,targetId) :
                [targetId];
                        
                saveState({
                    show:clickedNodeId, 
                    hide:hide
                },'');

                window.location.hash = '#/' + targetId;
                        
                state = getState();
                hide = (state && state.hasOwnProperty('hide')) ?
                hideArray(state.hide,clickedNodeId) :
                [clickedNodeId];
                    
                saveState({
                    show:targetId,
                    hide:hide
                },'');
                if(mwf.site.analytics){
                    mwf.site.analytics.trackPageview(this.element.pathname);
                }
            }
        };

        for (var i = 0; i < anchors.length ; i++) {
            if ((document.getElementById('il'+anchors[i].pathname) != null) || (mwf.site.root == anchors[i].href.replace(/\/$/, "")))
                link.push(new lightningTouch(anchors[i], this.touchHandler));
        }
    
        this.popHandler = function(event) {
            state = getState();
            if (state) {
                showContent(state.show,state.hide);
            } 
            if (event.state) {
                //Retrieve adjacent pages and add our "show" value to their hide values
                var previousState;
                var hide;
                for (i=0; i<event.state.hide.length; i++) {
                    previousState = getState(event.state.hide[i]);
                    if (previousState) {
                        hide = hideArray(previousState.hide,event.state.show);
                        setState({
                            show:event.state.hide[i], 
                            hide:hide
                        },location.pathname + '#/' + event.state.hide[i]);
                    }
                }
                showContent(event.state.show,event.state.hide);
            }            
        };
        window.addEventListener("popstate", this.popHandler, false);
    }
    
    document.addEventListener('DOMContentLoaded', init, false);
}());