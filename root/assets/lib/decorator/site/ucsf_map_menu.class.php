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
 * @uses Classification
 */
require_once(dirname(__FILE__) . '/menu.class.php');
require_once(dirname(dirname(dirname(__FILE__))) . '/classification.class.php');

class Ucsf_Map_Menu_Site_Decorator extends Menu_Site_Decorator {

    public function __construct($title = false, $params = array()) {
        parent::__construct($title, $params);
        $this->set_padded()->set_detailed();
    }

    public function render() {
        if (Classification::is_standard()) {
            $this->add_item('Parnassus', '/maps/campus.php?campus=Parnassus', array());
            $this->add_item('Mission Bay', '/maps/campus.php?campus=Mission+Bay', array());
            $this->add_item('Mt. Zion', '/maps/campus.php?campus=Mt.+Zion', array());
            $this->add_item('San Francisco General Hospital', '/maps/campus.php?campus=SFGH');
            $this->add_item('Location List', '/maps/locations.php', array());
        } else {
            $this->add_item('Parnassus <span class="smallprint light">PDF</span>', 'http://www.ucsf.edu/sites/default/files/documents/ucsf_parnassus_1.pdf', array(), array('rel' => 'external'));
            $this->add_item('Mission Bay <span class="smallprint light">PDF</span>', 'http://www.ucsf.edu/sites/default/files/documents/ucsf-mission-bay-8-16.pdf', array(), array('rel' => 'external'));
        }

        return parent::render();
    }

}