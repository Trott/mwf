/**
 * Defines methods under mwf.user_agent namespace. These are deprecated, but
 * still supported for backwards compatibility reasons.
 *
 * @package core
 * @subpackage js
 *
 * @author ebollens
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20111003
 * 
 * @deprecated in MWF 1.2
 * 
 * @requires mwf.userAgent
 */

mwf.user_agent = new function(){

    var userAgent = mwf.userAgent
    
    this.is_iphone_os=function() {
        return userAgent.getOS() == 'iphone_os';
    }
    
    this.is_webkit_engine=function(){
        return userAgent.getBrowserEngine() == 'webkit';
    }
    
    this.get_browser=function() {
        return userAgent.getBrowser.call(userAgent);
    }
    
    this.get_browser_version=function(){
        return false;
    };
    
    this.get_os=userAgent.getOS;
    
    this.get_os_version=function() {
        return userAgent.getOSVersion.call(userAgent);
    }
};
