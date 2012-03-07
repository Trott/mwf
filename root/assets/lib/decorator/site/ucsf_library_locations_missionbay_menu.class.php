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
 * @version 20120306
 *
 * @uses Ucsf_Library_Location_Menu_Site_Decorator
 */
require_once(dirname(__FILE__) . '/ucsf_library_location_menu.class.php');

class Ucsf_Library_Locations_Missionbay_Menu_Site_Decorator extends Ucsf_Library_Location_Menu_Site_Decorator {

    public function __construct($title = 'Mission Bay Library', $params = array()) {
        parent::__construct($title, $params, '/maps/map.php?loc=Rutter+Center', 
                "William J. Rutter Conference Center\nRoom 150\n1675 Owens Street\nSan Francisco, CA 94143-2119", 
                '(415) 514-4060', 
                "Mon - Thurs: 9:00am - 9:00pm\nFri: 9:00am - 5:30pm\n" .
                    "Sat: 10:00am - 6:00pm\nSun: CLOSED\n\n" .
                    "UCSF student access until midnight: " .
                        "Use eastern entrance with ID access. " .
                        "Enter library through computer lab CC151 with ID.", 
                'http://library.ucsf.edu/locations/hours?ovrrdr=1');
        $this->set_padded()->set_detailed();
    }

}
