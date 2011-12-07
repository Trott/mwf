<?php

/**
 *
 * @package decorator
 * @subpackage site_decorator
 *
 * @author trott
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20111207
 *
 * @uses Menu_Full_Site_Decorator
 */
require_once(dirname(__FILE__) . '/menu_full.class.php');

class Ucsf_Library_Locations_Parnassus_Menu_Site_Decorator extends Menu_Full_Site_Decorator {

    public function __construct($title = 'Parnassus Library', $params = array()) {
        parent::__construct($title, $params);
        $this->set_padded()->set_detailed();
    }

    public function render() {
        $this->add_item('Map<br/><br/><span class="smallprint">530 Parnassus Avenue<br/>San Francisco, CA 94143-0840</span>', '/maps/map.php?loc=Kalmanovitz+Library', array());
        $this->add_item('(415)&nbsp;476-2334', 'tel:+14154762334', array());
        $this->add_item('<span class="smallprint">Mon - Thurs: 7:45 am - 10:00 pm<br/>Fri: 7:45 am - 8:00 pm<br/>Sat: CLOSED<br/>Sun: 12:00 noon - 10:00 pm</span><br/><br/><span class="external">Holidays and exceptions</span>', 'http://library.ucsf.edu/locations/hours?ovrrdr=1', array());
        return parent::render();
    }
}
