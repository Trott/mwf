<?php

/**
 *
 *
 * @package decorator
 * @subpackage site_decorator
 *
 * @author trott
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20111023
 *
 * @uses Decorator
 * @uses Tag_HTML_Decorator
 * @uses Config
 */

require_once(dirname(__FILE__).'/default_footer.class.php');

class Ucsf_Footer_Site_Decorator extends Default_Footer_Site_Decorator
{	
	public function __construct()
    {          
        parent::__construct();
        
        $this->show_powered_by(false);       
    }
    
    public function render()
    {
        $library_ga_rollup = '';
        if (strncasecmp($_SERVER['PHP_SELF'],"/library",8) == 0) {
            $library_ga_rollup = <<<EOD
<script type="text/javascript"> 
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
try {
var pageTracker = _gat._getTracker("UA-552286-29");
pageTracker._trackPageview();
} catch(err) {}
</script>
EOD;
        }
        
        $this->add_inner_tag('p', 'This site is a service of the <a href="http://library.ucsf.edu/">UCSF Library</a>.');

        return parent::render() . $library_ga_rollup;
    }
}
