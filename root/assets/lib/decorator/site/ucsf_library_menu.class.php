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

class Ucsf_Library_Menu_Site_Decorator extends Menu_Site_Decorator {

    public function __construct($title = false, $params = array()) {
        parent::__construct($title, $params);
        $this->set_padded()->set_detailed();
    }

    public function render() {
        $this->add_item('Hours and Locations', '/library/locations', array());
        $this->add_item('Find Books and Journals', 'http://ucsf.worldcat.org/m', array(), array('rel'=>'external'));
        $this->add_item('Mobile Resources', 'http://guides.library.ucsf.edu/content.php?pid=252446&sid=2084303', array(), array('rel'=>'external'));
        $this->add_item('Reserve a Study Room', 'http://tiny.ucsf.edu/reserve', array(), array('rel'=>'external'));
        $this->add_item('Get Help', '/library/help/', array());
        $this->add_item('News', '/news/library', array());
        $this->add_item('Full Library Site','http://library.ucsf.edu/?ovrrdr=1',array(), array('rel'=>'external'));
        return parent::render();
    }

}