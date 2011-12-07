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

class Ucsf_Library_Locations_Missionbay_Menu_Site_Decorator extends Menu_Site_Decorator {

    public function __construct($title = 'Mission Bay Library', $params = array()) {
        parent::__construct($title, $params);
        $this->set_padded()->set_detailed();
    }

    public function render() {
        $this->add_item('Map<br/><br/><span class="smallprint">William J. Rutter Conference Center<br/>Room 150<br/>1675 Owens Street<br/>San Francisco, CA 94143-2119</span>', '/maps/map.php?loc=Rutter+Center', array());
        $this->add_item('(415)&nbsp;514-4060', 'tel:+14155144060', array());
        $this->add_item('<span class="smallprint">Mon - Thurs: 9:00 am - 9:00 pm<br/>Fri: 9:00 am - 5:30 pm<br/>Sat - Sun: CLOSED</span><br/><br/><span class="external">Holidays and exceptions</span>', 'http://library.ucsf.edu/locations/hours?ovrrdr=1', array(),array('rel'=>'external','class'=>'no-ext-ind'));
        return parent::render();
    }
}
