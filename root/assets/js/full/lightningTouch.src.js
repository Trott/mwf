/**
 * Lightning Touch
 * 
 * Make switching divs in response to touched links responsive without the several
 *    hundred millisecond delay typical in a hendheld touchscreen browser.
 *
 * @author Richard Trott
 * @copyright Copyright (c) 2012 UC Regents
 * @version 0.99
 * 
 */

(function () {
    var lightningTouch = function (element, handler) {
        this.element = element;
        this.handler = handler;

        element.addEventListener('touchstart', this, false);
        element.addEventListener('click', this, false);
    };

    lightningTouch.prototype.handleEvent = function (event) {
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

    lightningTouch.prototype.onTouchStart = function (event) {
        event.stopPropagation();

        this.element.addEventListener('touchend', this, false);
        document.body.addEventListener('touchmove', this, false);

        this.startX = event.touches[0].clientX;
        this.startY = event.touches[0].clientY;
    };

    lightningTouch.prototype.onTouchMove = function (event) {
        if (Math.abs(event.touches[0].clientX - this.startX) > 10 ||
            Math.abs(event.touches[0].clientY - this.startY) > 10) {
            this.reset();
        }
    };

    lightningTouch.prototype.onClick = function (event) {
        event.stopPropagation();
        this.reset();
        this.handler(event);
    };

    lightningTouch.prototype.reset = function () {
        this.element.removeEventListener('touchend', this, false);
        document.body.removeEventListener('touchmove', this, false);
    };
        
    var link = [],
    states = [],
    indexToUrl = [],
    defaultTargetId;
    
    var setState = function (object,url) {
        var index = indexToUrl.indexOf(url);
        if (index<0) {
            index = indexToUrl.length; 
            indexToUrl.push(url);
        }
        states[index] = object;
    };
    
    var saveState = function (object,title,url) {
        url = url || location.pathname + location.hash;
        setState(object,url);
        history.replaceState(object,title,url);
    };
    
    var getState = function (id) {
        var url = id ? location.pathname + '#/' + id : location.pathname + location.hash;
        var index = indexToUrl.indexOf(url)
        return index<0 ? undefined : states[index];
    };
    
    var hideArray = function (hide,newHideId) {
        if (hide.indexOf(newHideId) < 0) {
            hide.push(newHideId);
        }
        return hide;
    };
    
    var init = function () { 
        function showContent(show,hide) {
            var hideElement, i;
            for (i=0; i<hide.length; i++) {
                hideElement = document.getElementById(hide[i]);
                if (hideElement) {
                    hideElement.setAttribute("style", "display:none");
                }
            }
            var showElement = document.getElementById(show) || document.getElementById(defaultTargetId);
            
            if (showElement) {
                showElement.setAttribute("style", "display:block");
            } else {
                return false;
            }

            return true;
        }
        
        defaultTargetId = document.body.getAttribute('data-default-target-id') || '';

        if (! window.location.hash ) {
            window.location.hash = '#/' + defaultTargetId;
        }
        showContent(window.location.hash.substring(2),[]);
        
        if (! (history instanceof Object && history.replaceState instanceof Function)) {
            return;
        }

        this.touchHandler = function (event) {
            var targetId = this.element.getAttribute("data-target-id");
            var target = document.getElementById(targetId);
            if (target !== null) {
                event.preventDefault();
                var clickedNode = document.getElementById(window.location.hash.substr(2));
                var clickedNodeId = clickedNode ? clickedNode.getAttribute('id') : '/' + defaultTargetId;
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
            }
        };

        var anchors = document.getElementsByTagName("a");
        for (var i = 0; i < anchors.length ; i++) {
            if (anchors[i].getAttribute('data-target-id')!=null){
                link.push(new lightningTouch(anchors[i], this.touchHandler));
            }
        }
        this.popHandler = function (event) {
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