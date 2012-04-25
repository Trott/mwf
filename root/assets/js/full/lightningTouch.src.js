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

/*global document: false, history: false, location: false, window: false */

(function () {
    "use strict";
    var link = [],
        states = [],
        indexToUrl = [],
        defaultTargetId,
        LightningTouch,
        setState,
        saveState,
        getState,
        hideArray,
        init;

    LightningTouch = function (element, handler) {
        this.element = element;
        this.handler = handler;

        element.addEventListener('touchstart', this, false);
        element.addEventListener('click', this, false);
    };

    LightningTouch.prototype.handleEvent = function (event) {
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

    LightningTouch.prototype.onTouchStart = function (event) {
        event.stopPropagation();

        this.element.addEventListener('touchend', this, false);
        document.body.addEventListener('touchmove', this, false);

        this.startX = event.touches[0].clientX;
        this.startY = event.touches[0].clientY;
    };

    LightningTouch.prototype.onTouchMove = function (event) {
        if (Math.abs(event.touches[0].clientX - this.startX) > 10 ||
                Math.abs(event.touches[0].clientY - this.startY) > 10) {
            this.reset();
        }
    };

    LightningTouch.prototype.onClick = function (event) {
        event.stopPropagation();
        this.reset();
        this.handler(event);
    };

    LightningTouch.prototype.reset = function () {
        this.element.removeEventListener('touchend', this, false);
        document.body.removeEventListener('touchmove', this, false);
    };

    setState = function (object, url) {
        var index = indexToUrl.indexOf(url);
        if (index < 0) {
            index = indexToUrl.length;
            indexToUrl.push(url);
        }
        states[index] = object;
    };

    saveState = function (object, title, url) {
        url = url || location.pathname + location.hash;
        setState(object, url);
        history.replaceState(object, title, url);
    };

    getState = function (id) {
        var url = id ? location.pathname + '#/' + id : location.pathname + location.hash,
            index = indexToUrl.indexOf(url);
        return index < 0 ? undefined : states[index];
    };

    hideArray = function (hide, newHideId) {
        if (hide.indexOf(newHideId) < 0) {
            hide.push(newHideId);
        }
        return hide;
    };

    init = function () {
        var anchors, i;

        function showContent(show, hide) {
            var hideElement, showElement, i;
            for (i = 0; i < hide.length; i += 1) {
                hideElement = document.getElementById(hide[i]);
                if (hideElement) {
                    hideElement.setAttribute("style", "display:none");
                }
            }
            showElement = document.getElementById(show) || document.getElementById(defaultTargetId);

            if (showElement) {
                showElement.setAttribute("style", "display:block");
            } else {
                return false;
            }

            return true;
        }

        defaultTargetId = document.body.getAttribute('data-default-target-id') || '';

        if (!window.location.hash) {
            window.location.hash = '#/' + defaultTargetId;
        }
        showContent(window.location.hash.substring(2), []);

        if (!(history instanceof Object && history.replaceState instanceof Function)) {
            return;
        }

        this.touchHandler = function (event) {
            var targetId, target, clickedNode, clickedNodeId, state, hide;
            targetId = this.element.getAttribute("data-target-id");
            target = document.getElementById(targetId);
            if (target !== null) {
                event.preventDefault();
                clickedNode = document.getElementById(window.location.hash.substr(2));
                clickedNodeId = clickedNode ? clickedNode.getAttribute('id') : '/' + defaultTargetId;
                showContent(targetId, [clickedNodeId]);

                state = getState();
                hide = (state && state.hasOwnProperty('hide')) ?
                        hideArray(state.hide, targetId) :
                        [targetId];

                saveState({
                    show: clickedNodeId,
                    hide: hide
                }, '');

                window.location.hash = '#/' + targetId;

                state = getState();
                hide = (state && state.hasOwnProperty('hide')) ?
                        hideArray(state.hide, clickedNodeId) :
                        [clickedNodeId];

                saveState({
                    show: targetId,
                    hide: hide
                }, '');
            }
        };

        anchors = document.getElementsByTagName("a");
        for (i = 0; i < anchors.length; i += 1) {
            if (anchors[i].getAttribute('data-target-id') !== null) {
                link.push(new LightningTouch(anchors[i], this.touchHandler));
            }
        }
        this.popHandler = function (event) {
            var state, previousState, hide;
            state = getState();
            if (state) {
                showContent(state.show, state.hide);
            }
            if (event.state) {
                //Retrieve adjacent pages and add our "show" value to their hide values
                for (i = 0; i < event.state.hide.length; i += 1) {
                    previousState = getState(event.state.hide[i]);
                    if (previousState) {
                        hide = hideArray(previousState.hide, event.state.show);
                        setState({
                            show: event.state.hide[i],
                            hide: hide
                        }, location.pathname + '#/' + event.state.hide[i]);
                    }
                }
                showContent(event.state.show, event.state.hide);
            }
        };
        window.addEventListener("popstate", this.popHandler, false);
    };

    document.addEventListener('DOMContentLoaded', init, false);
}());