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
 * @uses Menu_Site_Decorator
 */
require_once(dirname(__FILE__) . '/menu.class.php');

class Ucsf_Library_Locations_Menu_Site_Decorator extends Menu_Site_Decorator {

    private $_lightning = false;
    
    public function __construct($title = false, $params = array()) {
        parent::__construct($title, $params);
        $this->set_padded()->set_detailed();
    }

    public function set_lightning($lightning) {
        $this->_lightning = $lightning;
        return $this;
    }

    public function render($raw = false) {
        $this->add_item('Parnassus Library', '/library/locations/parnassus', array(), $this->_lightning ? array('data-target-id' => 'il/library/locations/parnassus') : array());
        $this->add_item('Mission Bay Library', '/library/locations/mission_bay', array(), $this->_lightning ? array('data-target-id' => 'il/library/locations/mission_bay') : array());
        return parent::render($raw);
    }

}