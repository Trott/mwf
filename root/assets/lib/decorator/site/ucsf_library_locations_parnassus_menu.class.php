<?php

/**
 *
 * @package decorator
 * @subpackage site_decorator
 *
 * @author trott
 * @author topfstedt
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120124
 *
 * @uses Ucsf_Library_Location_Menu_Site_Decorator
 */
require_once(dirname(__FILE__) . '/ucsf_library_location_menu.class.php');

class Ucsf_Library_Locations_Parnassus_Menu_Site_Decorator extends Ucsf_Library_Location_Menu_Site_Decorator {

    public function __construct($title = 'Parnassus Library', $params = array()) {
        parent::__construct($title, $params, '/maps/map.php?loc=Kalmanovitz+Library', 
                "530 Parnassus Avenue\nSan Francisco, CA 94143-0840", 
                '(415) 476-2334', 
                "Mon - Thurs: 7:45 am - 10:00 pm\nFri: 7:45 am - 8:00 pm\n".
                    "Sat: 10:00 am - 6:00 pm\nSun: 12:00 noon - 10:00 pm\n".
                    "\n24/7 Hearst Room, Parnassus Library (with student ID)\n".
                    "24/7 Computer Lab, S166 (with student ID)",
                'http://library.ucsf.edu/locations/hours?ovrrdr=1');
        $this->set_padded()->set_detailed();
    }

}
