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
 * 
 * @uses document.cookie
 * @uses RegExp
 * @uses window.location
 */

(function(){
    
    var requestedOverride = (new RegExp("[\\?&]override=([^&#]*)")).exec( window.location.href );
    
    /**
     * If a match, extract the value.
     */
    if(requestedOverride != null) {
        requestedOverride = requestedOverride[1];
    }
    
    if(requestedOverride) {
        
        
        /**
         * If no support for cookies, then return early since override requires
         * a cookie.
         */
        if(!Modernizr.cookies) {
            
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
             * Refresh
             */
        if(mwf.site.local.isSameOrigin()) {
            mwf.site.redirect(returnLocation);
            
        /**
             * Redirect to the service provider.
             */
        } else {
                
            mwf.site.redirect('//'+mwf.site.cookie.domain+'/'+mwf.site.local.asset.root+'/passthru.php?override='+requestedOverride+'&return='+encodeURIComponent(returnLocation));
                
        }
            
    }
}());
