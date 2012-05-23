<?php

/**
 *
 *
 * @package decorator
 * @subpackage site_decorator
 *
 * @author trott
 * @copyright Copyright (c) 2010-12 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120215
 *
 * @uses Default_Footer_Site_Decorator
 * @uses Classification
 */

require_once(dirname(__FILE__).'/default_footer.class.php');
require_once(dirname(dirname(dirname(__FILE__))).'/classification.class.php');

class Ucsf_Footer_Site_Decorator extends Default_Footer_Site_Decorator
{    
    public function __construct()
    {          
        parent::__construct();
        
        $this->show_powered_by(false);  
    }
}
