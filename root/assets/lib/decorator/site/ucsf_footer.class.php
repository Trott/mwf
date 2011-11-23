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
 * @version 20111122
 *
 * @uses Decorator
 * @uses Tag_HTML_Decorator
 * @uses Config
 */

require_once(dirname(__FILE__).'/default_footer.class.php');

class Ucsf_Footer_Site_Decorator extends Default_Footer_Site_Decorator
{
    private $_back_button = true;
    
    public function __construct()
    {          
        parent::__construct();
        
        $this->show_powered_by(false);       
    }
    
    public function back_button($show=true) {
        $this->_back_button = $show;
        return $this;
    }
    
    public function render()
    {
        $back_button = $this->_back_button ? Site_Decorator::ucsf_back_button() : '';
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

        return $back_button . parent::render() . $library_ga_rollup;
    }
}
