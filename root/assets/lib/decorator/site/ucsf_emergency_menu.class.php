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

class Ucsf_Emergency_Menu_Site_Decorator extends Menu_Site_Decorator {

    public function __construct($title = false, $params = array()) {
        parent::__construct($title, $params);
        $this->set_padded()->set_detailed();
    }

    public function render() {
        $this->add_item(array('911 ', HTML_Decorator::tag('span', 'for emergencies only', array('class'=>'smallprint'))), 'tel:+911', array());
        $this->add_item(array('UCSF Police Non-Emergency', HTML_Decorator::tag_open('br'), HTML_Decorator::tag('span', '(415) 476-1414', array('class'=>'smallprint'))), 'tel:+14154761414', array());
        $this->add_item(array('UCSF Medical Center Security', HTML_Decorator::tag_open('br'),HTML_Decorator::tag('span', '(415) 885-7890', array('class'=>'smallprint'))), 'tel:+14158857890', array());
        $this->add_item(array('Campus Emergency Information Hotline', HTML_Decorator::tag_open('br'),HTML_Decorator::tag('span', '(415) 502-4000', array('class'=>'smallprint'))), 'tel:+14155024000', array());
        $this->add_item(array('Back-up Campus Emergency Hotline', HTML_Decorator::tag_open('br'),HTML_Decorator::tag('span', '1 (800) 873-8232', array('class'=>'smallprint'))), 'tel:+18008738232', array());
        $this->add_item(array('UCSF Medical Center Information Hotline', HTML_Decorator::tag_open('br'),HTML_Decorator::tag('span', '(415) 885-7828', array('class'=>'smallprint'))), 'tel:+14158857828', array());
        return parent::render();
    }

}