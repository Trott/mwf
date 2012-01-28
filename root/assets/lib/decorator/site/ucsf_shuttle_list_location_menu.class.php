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
        $this->add_item('Parnassus','/shuttle/list/location/0');
        $this->add_item('SFGH','/shuttle/list/location/1');
        $this->add_item('Mission Bay (4th St.)','/shuttle/list/location/2');        
        $this->add_item('Mt. Zion','/shuttle/list/location/3');
        $this->add_item('MCB','/shuttle/list/location/4');
        $this->add_item('China Basin','/shuttle/list/location/5');
        $this->add_item('Laurel Heights','/shuttle/list/location/6');
        $this->add_item('3360 Geary St. (Med Center)','/shuttle/list/location/7');
        $this->add_item('Kezar','/shuttle/list/location/8');        
        $this->add_item('VA','/shuttle/list/location/9');
        $this->add_item('Aldea','/shuttle/list/location/10');
        $this->add_item('Buchanan Dental','/shuttle/list/location/11');
        $this->add_item('55 Laguna','/shuttle/list/location/12');
        $this->add_item('16th St. BART','/shuttle/list/location/13');
        $this->add_item('17th St. Lot','/shuttle/list/location/14');
        $this->add_item('18th St. CPC','/shuttle/list/location/15');        
        $this->add_item('2300 Harrison','/shuttle/list/location/16');
        $this->add_item('20th St. CPFM','/shuttle/list/location/17');
        $this->add_item('654 Minnesota','/shuttle/list/location/18');
        return parent::render();
    }

}