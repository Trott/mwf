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

class Ucsf_Shuttle_List_Location_Menu_Site_Decorator extends Menu_Site_Decorator {

    public function __construct($title = false, $params = array()) {
        parent::__construct($title, $params);
        $this->set_padded()->set_detailed();
    }

    //TODO: Don't hardcode this stuff.
    public function render() {
        $this->add_item('Parnassus','/shuttle/list/location/parnassus');
        $this->add_item('SFGH','/shuttle/list/location/sfgh');
        $this->add_item('Mission Bay (4th St.)','/shuttle/list/location/mission_bay');        
        $this->add_item('Mt. Zion','/shuttle/list/location/mt_zion');
        $this->add_item('MCB','/shuttle/list/location/mcb');
        $this->add_item('China Basin','/shuttle/list/location/china_basin');
        $this->add_item('Laurel Heights','/shuttle/list/location/laurel_heights');
        $this->add_item('3360 Geary St. (Med Center)','/shuttle/list/location/3360_geary');
        $this->add_item('Kezar','/shuttle/list/location/kezar');        
        $this->add_item('VA','/shuttle/list/location/va');
        $this->add_item('Aldea','/shuttle/list/location/aldea');
        $this->add_item('Buchanan Dental','/shuttle/list/location/buchanan_dental');
        $this->add_item('55 Laguna','/shuttle/list/location/55_laguna');
        $this->add_item('16th St. BART','/shuttle/list/location/bart');
        $this->add_item('17th St. Lot','/shuttle/list/location/17th');
        $this->add_item('18th St. CPC','/shuttle/list/location/18th');        
        $this->add_item('2300 Harrison','/shuttle/list/location/2300');
        $this->add_item('20th St. CPFM','/shuttle/list/location/20th');
        $this->add_item('654 Minnesota','/shuttle/list/location/654_minnesota');
        return parent::render();
    }

}