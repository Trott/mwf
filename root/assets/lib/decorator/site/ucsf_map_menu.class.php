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

class Ucsf_Map_Menu_Site_Decorator extends Menu_Site_Decorator {

    public function __construct($title = false, $params = array()) {
        parent::__construct($title, $params);
        $this->set_padded()->set_detailed();
    }

    public function render($raw = false) {
            $this->add_item('Parnassus', '/maps/campus.php?campus=Parnassus', array());
            $this->add_item('Mission Bay', '/maps/campus.php?campus=Mission+Bay', array());
            $this->add_item('Mt. Zion', '/maps/campus.php?campus=Mt.+Zion', array());
            $this->add_item('San Francisco General Hospital', '/maps/campus.php?campus=SFGH');
            $this->add_item('Location List', '/maps/locations.php', array());
        return parent::render($raw);
    }

}