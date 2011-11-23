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
 * @uses Tag_HTML_Decorator
 */
require_once(dirname(dirname(__FILE__)). '/html/tag.class.php');

class Ucsf_Back_Button_Site_Decorator extends Tag_HTML_Decorator {

      public function __construct()
    {
        parent::__construct('a', 'Back', 
                array('href'=>'javascript:history.back()', 'id'=>'button-top'));
    }
}
