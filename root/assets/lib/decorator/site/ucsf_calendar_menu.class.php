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

class Ucsf_Calendar_Menu_Site_Decorator extends Menu_Full_Site_Decorator {

    public function __construct($title = false, $params = array()) {
        parent::__construct($title, $params);
        $this->set_padded()->set_detailed();
    }

    public function render() {
        $this->add_item('UCSF Events', '/news/?feed=ucsfevents', array());
        $this->add_item('Featured Academic Events', '/news/?feed=academicevents', array());
        $this->add_item('UCSF Calendars Website', 'http://www.ucsf.edu/about/ucsf-calendars?ovrrdr=1', array(), array('rel'=>'external'));
        return parent::render();
    }

}