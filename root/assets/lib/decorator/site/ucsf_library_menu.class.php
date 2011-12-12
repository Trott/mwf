<?php

/**
 *
 * @package decorator
 * @subpackage site_decorator
 *
 * @author trott
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20111206
 *
 * @uses Menu_Full_Site_Decorator
 */
require_once(dirname(__FILE__) . '/menu_full.class.php');

class Ucsf_Library_Menu_Site_Decorator extends Menu_Full_Site_Decorator {

    public function __construct($title = false, $params = array()) {
        parent::__construct($title, $params);
        $this->set_padded()->set_detailed();
    }

    public function render() {
        $this->add_item('Hours and Locations', '/library/locations', array());
        $this->add_item('<span class="external">Find Books and Journals</span>', 'http://ucsf.worldcat.org/m', array());
        $this->add_item('<span class="external">Mobile Resources</span>', 'http://guides.library.ucsf.edu/content.php?pid=252446&sid=2084303', array());
        $this->add_item('Get Help', '/library/help/', array());
        $this->add_item('News', '/news/library', array());
        $this->add_item('<span class="external">Full Library Site</span>','http://library.ucsf.edu/?ovrrdr=1',array());
        return parent::render();
    }

}