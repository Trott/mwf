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

class Ucsf_Library_Locations_Missionbay_Menu_Site_Decorator extends Ucsf_Library_Location_Menu_Site_Decorator {

    public function __construct($title = 'Mission Bay Library', $params = array()) {
        parent::__construct($title, $params, '/maps/map.php?loc=Rutter+Center', 
                "William J. Rutter Conference Center\nRoom 150\n1675 Owens Street\nSan Francisco, CA 94143-2119", 
                '(415) 514-4060', 
                "Mon - Thurs: 9:00 am - 9:00 pm\nFri: 9:00 am - 5:30 pm\nSat - Sun: CLOSED", 
                'http://library.ucsf.edu/locations/hours?ovrrdr=1');
        $this->set_padded()->set_detailed();
    }

}
