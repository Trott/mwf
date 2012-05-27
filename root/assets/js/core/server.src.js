/**
 * Responsible for writing cookies back
 * to the server and refreshing the page to propagate this if done as such.
 *
 * @package core
 * @subpackage js
 *
 * @author ebollens
 * @copyright Copyright (c) 2010-12 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120423
 *
 * @requires mwf
 * @requires mwf.site
 * @requires mwf.capability
 * @requires mwf.userAgent
 * 
 * @requires /root/assets/js/core/vars.php
 * @requires /root/assets/js/core/capability.js
 * @requires /root/assets/js/core/userAgent.js
 */

(function(){

    /**
     * Local variables to minimize payload size in compression.
     */
    
    var site = mwf.site,
    userAgent = mwf.userAgent,
    mustRedirect = false,
    mustReload = false,
    setCookie = function(cookieName, cookieContent) {
    
        /**
         * Function to generate a cookie on the service provider, specifying a
         * domain if this is a cross
         */
            
        /**
         * If not cross-domain or this is the first load and third party is
         * supported, then attempt to write the cookie to the SP directly.
         */
        
        if(site.local.isSameOrigin()){
            
            /**
             * Write the cookie with the proper suffix for service provider.
             */
            
            document.cookie = cookieName + '=' + encodeURIComponent(cookieContent)+';path=/';
            
            /**
             * Must reload the page to propagate the cookie to SP.
             */
            
            mustReload = true;
            
        /**
             * If third-party cookies aren't supported and this is cross domain,
             * then redirect through the SP and then back to CP.
             */  
        
        } else {
            
            mustRedirect = true;
            
        }
        
    };
    
 
        
    /**
     * Initialization requires cookies to store data - else simply exit.
     */
        
    if(!mwf.capability.cookie())
        return;
        
    /**
     * Exit in the event that no_server_init is set as a query string
     * parameter. This helps to ensure that an infinite loop will not occur 
     * as the framework adds this parameter to the query string on
     * redirect back to the originator.
     */
    if (/^(\?|.*&)no_server_init([\=\&].*)?$/.test(window.location.search)) {
        return;
    }
        
    /**
     * Set user agent cookie if it doesn't already exist on server.
     */
        
    if(!site.cookie.exists(userAgent.cookieName))
        setCookie(userAgent.cookieName, userAgent.generateCookieContent());


    /**
         * If the service provider doesn't have cookies, either (1) reload
         * the page if framework is of same-origin or device browser supports 
         * third-party cookies, or (2) redirect to the SP redirector. If the
         * service provider already has cookies, then this isn't necessary.
         */
        
    if(mustReload && !mwf.override.isRedirecting){
        var locArr = window.location.href.split('#'), loc = locArr[0];
        if(loc.indexOf('?') == -1) loc += "?";
        if(loc.indexOf('?') < loc.length-1) loc += "&";
        loc += "no_server_init";
        locArr[0] = loc;
        site.redirect(locArr.join('#'));
    }else if(mustRedirect && !mwf.override.isRedirecting){
        site.redirect(site.asset.root+'/passthru.php?return='+encodeURIComponent(window.location)+'&mode='+mwf.browser.getMode());
    }

}());
