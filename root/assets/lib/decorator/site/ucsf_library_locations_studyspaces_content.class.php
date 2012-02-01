<?php

/**
 *
 * @package decorator
 * @subpackage site_decorator
 *
 * @author trott
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120124
 *
 * @uses Content_Site_Decorator
 */
require_once(dirname(__FILE__) . '/content.class.php');

class Ucsf_Library_Locations_Studyspaces_Content_Site_Decorator extends Content_Site_Decorator {

    public function __construct($title = 'Other Study Spaces', $params = array()) {
        parent::__construct(array(), $params);
        $this->set_padded();
        $this->add_header($title);
    }

    public function render() {
        $this->add_paragraph('Enter with proxy/ID card<br/> 
<br/> 
Computer Lab, S166, Parnassus:<br /> 
24/7 access<br/> 
<br/> 
Hearst Room, Parnassus Library:<br /> 
24/7 access for UCSF students');
        return parent::render();
    }
}
