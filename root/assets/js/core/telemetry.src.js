/**
 * Writes device telemetry to the BODY element as "mwf_" classes.
 *
 * @package core
 * @subpackage js
 *
 * @author ebollens
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20111102
 * 
 * @requires mwf.userAgent
 * 
 * @uses document.addEventListener
 * @uses document.body
 * @uses window.attachEvent
 */

(function(){
    var written = false;
    
    /**
     * Telemetry-writing function attached onDOMContentLoaded and onLoad.
     */
    var writer = function(){
        
        if(written) 
            return;
        
        written = true;
        var classes = document.body.className.split(' '),
            i = classes.length,
            userAgent = mwf.userAgent;
        
        /**
         * Function that returns true iff class v is not defined in classes.
         */
        var nin = function(v){
            for(p in classes) 
                if(v == classes[p]) 
                    return false; 
            return true;
        }
        
        /**
         * Always add body.mwf.
         */
        if(nin('mwf')){
            classes[i++] = 'mwf';
        }
           
        var t,tv;
        
        /**
         * Add body class for mwf_browser_{name} when possible.
         */
        if((t = userAgent.getBrowser()).length > 0) {
            t = "mwf_browser_"+t.toLowerCase().replace(" ","_");
            if(nin(t)) 
                classes[i++] = t;
        }
        
        /**
         * Add body class for mwf_browser_engine_{name} when possible.
         */
        if((t = userAgent.getBrowserEngine()).length > 0) {
            t = "mwf_browser_engine_"+t.toLowerCase().replace(" ","_");
            if(nin(t)) 
                classes[i++] = t;
        }
        
        /**
         * Add body class for mwf_os_{name} when possible.
         */
        if((t = userAgent.getOS()).length > 0) {
            t = "mwf_os_"+t.toLowerCase().replace(" ","_");
            if(nin(t)) 
                classes[i++] = t;
        }
        
        /**
         * Add body class for mwf_os_{name}_{version} when possible.
         */
        if((tv = userAgent.getOSVersion()).length > 0) {
            tv = t+'_'+tv.toLowerCase().replace(/ /g,"_").replace(/\./g,"_");
            if(nin(tv)) 
                classes[i++] = tv;
        }
        
        /**
         * Write classes to the body in one bulk operation.
         */
        document.body.className = classes.join(' ');
    };
    
    /**
     * Attaches the writer to the window onLoad to execute when the DOM content 
     * has fully loaded. Initially this also supported DOMContentLoaded, but
     * Mozilla has issues with document.body as null.
     */
    
    if(window.addEventListener) {
        window.addEventListener('load',writer,false);
    } else if (window.attachEvent) {
        window.attachEvent('onload',writer);
    }
})();
