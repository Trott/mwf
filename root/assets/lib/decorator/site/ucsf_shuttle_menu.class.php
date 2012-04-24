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

class Ucsf_Shuttle_Menu_Site_Decorator extends Menu_Site_Decorator {

    public function __construct($title = false, $params = array()) {
        parent::__construct($title, $params);
        $this->set_padded()->set_detailed();
    }

    public function render($raw = false) {
        $pdf_denotation = HTML_Decorator::tag('span', 'PDF', array('class'=>'smallprint light'));
        $this->add_item('Trip Planner', '/shuttle/planner', array());
        $this->add_item('Shuttles By Color', '/shuttle/list/color', array(), array('data-target-id' => 'il/shuttle/list/color'));
        $this->add_item('Shuttles By Location', '/shuttle/list/location', array(), array('data-target-id' => 'il/shuttle/list/location'));
        $this->add_item(array('System Map ', $pdf_denotation), 'http://campuslifeservices.ucsf.edu/transportation/shuttles/timetables/shuttlemap.pdf', array(), array('rel'=>'external'));
        $this->add_item(array('Holiday Schedule ', $pdf_denotation), 'http://www.campuslifeservices.ucsf.edu/transportation/shuttles/timetables/pdf/ShuttleHolidaySchedule.pdf', array(), array('rel'=>'external'));
        $this->add_item('Transportation Feedback', 'http://campuslifeservices.ucsf.edu/transportation/feedback/', array(), array('rel'=>'external'));
        return parent::render($raw);
    }

}