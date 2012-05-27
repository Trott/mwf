/**
 * Defines several
 * namespaces deprecated as of MWF 1.2 that are nonetheless retained for
 * backwards compatibility.
 *
 * @package core
 * @subpackage js
 *
 * @author ebollens
 * @copyright Copyright (c) 2010-12 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120203
 *
 * @requires mwf
 * @requires mwf.site
 * 
 * @uses document.write
 */

/**
 * @deprecated 1.2.00
 */
mwf.desktop=new function(){};
mwf.standard=new function(){};
mwf.full=new function(){};
mwf.touch=mwf.standard;
mwf.webkit=mwf.full;
mwf.iphone=new function(){};

/**
 * @deprecated 1.2.00
 */
mwf.ext=new function(){};
mwf.ext.desktop=new function(){};
mwf.ext.standard=new function(){};
mwf.ext.full=new function(){};
mwf.ext.touch=mwf.ext.standard;
mwf.ext.webkit=mwf.ext.full;
mwf.ext.iphone=new function(){};
