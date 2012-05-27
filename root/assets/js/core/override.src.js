/**
 * Defines methods under mwf.override that process a query string specifying
 * override.
 *
 * @package core
 * @subpackage js
 *
 * @author ebollens
 * @copyright Copyright (c) 2010-12 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120224
 *
 * @requires mwf
 * @requires mwf.site
 * @requires mwf.capability
 * 
 * @uses document.cookie
 * @uses RegExp
 * @uses window.location
 * 
 * @see /root/assets/js/core/capability.js
 */

mwf.override = new function(){
    
    this.cookieName = mwf.site.cookie.prefix+'override';
    
    this.isRedirecting = false;
    
    /**
     * Store reference as local variable as optimized for compression.
     */    
    var currentOverride = mwf.site.cookie.override;
    
    var requestedOverride = (new RegExp("[\\?&]override=([^&#]*)")).exec( window.location.href );
    
    /**
     * If a match, extract the value.
     */
    if(requestedOverride != null) {
        requestedOverride = requestedOverride[1];
    }
    
    if(requestedOverride && requestedOverride != currentOverride) {
        
        
        /**
         * If no support for cookies, then return early since override requires
         * a cookie.
         */
        if(!mwf.capability.cookie()) {
            
            return false;
            
        }
        
        
        /**
             * Determine the returnLocation on the content provider, removing
             * the override parameter.
             */
        var returnLocation = document.location.href,
        urlparts= returnLocation.split('?');

        if (urlparts.length>=2)
        {
            var urlBase=urlparts.shift(), 
            queryString=urlparts.join("?"),
            prefix = 'override=',
            pars = queryString.split(/[&;]/g);
            for (var i= pars.length; i-->0;) 
                if (pars[i].lastIndexOf(prefix, 0)!==-1)
                    pars.splice(i, 1);
            returnLocation = urlBase+'?'+pars.join('&');
        }
            
        /**
             * Set the override cookie and refresh.
             */
        if(mwf.site.local.isSameOrigin()) {
                
            if(requestedOverride == 'no') {
                    
                document.cookie = this.cookieName+'=;path=/;expires=Thu, 01-Jan-1970 00:00:01 GMT;';
                    
            }else{
                    
                document.cookie = this.cookieName+'='+requestedOverride+';path=/;';
                    
            }
                
            /**
                 * Force server to redefine all cookies.
                 */
            mwf.site.cookie.exists = function(){
                return false;
            }
            currentOverride = requestedOverride;
            mwf.site.redirect(returnLocation);
            
        /**
             * Redirect to the service provider.
             */
        } else {
                
            mwf.site.redirect('//'+mwf.site.cookie.domain+'/'+mwf.site.local.asset.root+'/passthru.php?override='+requestedOverride+'&return='+encodeURIComponent(returnLocation)+'&mode='+mwf.browser.getMode());
                
        }
            
        /**
             * Mark this as redirecting so that mwf.server does not redirect too.
             */
        this.isRedirecting = true;
            
        /**
             * Early exit since this is going to redirect.
             */
        return;
            
    }
        
    
    
    /**
     * If no current override, then exit early - no need to define the wasX 
     * methods.
     */
    if(!currentOverride) {
    
        return;
        
    }
};
