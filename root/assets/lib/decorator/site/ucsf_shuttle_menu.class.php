<?php

/**
 *
 * @package decorator
 * @subpackage site_decorator
 *
 * @author trott
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20111205
 *
 * @uses Menu_Full_Site_Decorator
 */
require_once(dirname(__FILE__) . '/menu_full.class.php');

class Ucsf_Shuttle_Menu_Site_Decorator extends Menu_Full_Site_Decorator {

    public function __construct($title = false, $params = array()) {
        parent::__construct($title, $params);
        $this->set_padded()->set_detailed();
    }

    public function render() {
        $this->add_item('Trip Planner', '/shuttle/planner', array());
        $this->add_item('Shuttles By Color', '/shuttle/list/color', array());
        $this->add_item('Shuttles By Location', '/shuttle/list/location', array());
        $this->add_item('<span class="external">System Map <span class="smallprint light">PDF</span></span>', 'http://campuslifeservices.ucsf.edu/transportation/shuttles/timetables/shuttlemap.pdf', array());
        $this->add_item('<span class="external">Holiday Schedule <span class="smallprint light">PDF</span></span>', 'http://www.campuslifeservices.ucsf.edu/transportation/shuttles/timetables/pdf/ShuttleHolidaySchedule.pdf', array());
        $this->add_item('<span class="external">Transportation Feedback</span>', 'http://campuslifeservices.ucsf.edu/transportation/feedback/', array());
        return parent::render();
    }

}