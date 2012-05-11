<?php

/**
 *
 * @package decorator
 * @subpackage site_decorator
 *
 * @author trott
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120128
 *
 * @uses Menu_Site_Decorator
 */
require_once(dirname(__FILE__) . '/menu.class.php');

class Ucsf_Shuttle_List_Color_Menu_Site_Decorator extends Menu_Site_Decorator {

    public function __construct($title = false, $params = array()) {
        parent::__construct($title, $params);
        $this->set_padded()->set_detailed();
    }

    //TODO: Don't hardcode this stuff
    public function render($raw = false) {
        $this->add_item(array(HTML_Decorator::tag('div','',array('class'=>'shuttle-color blue')), ' Blue'),'/shuttle/schedule/blue');
        $this->add_item(array(HTML_Decorator::tag('div','',array('class'=>'shuttle-color gold')), ' Gold'),'/shuttle/schedule/gold');
        $this->add_item(array(HTML_Decorator::tag('div','',array('class'=>'shuttle-color grey')), ' Grey'),'/shuttle/schedule/grey');        
        $this->add_item(array(HTML_Decorator::tag('div','',array('class'=>'shuttle-color tan')), ' Tan'),'/shuttle/schedule/tan');
        $this->add_item(array(HTML_Decorator::tag('div','',array('class'=>'shuttle-color black')), ' Black'),'/shuttle/schedule/black');
        $this->add_item(array(HTML_Decorator::tag('div','',array('class'=>'shuttle-color purple')), ' Purple'),'/shuttle/schedule/purple');
        $this->add_item(array(HTML_Decorator::tag('div','',array('class'=>'shuttle-color pink')), ' Pink'),'/shuttle/schedule/pink');
        $this->add_item(array(HTML_Decorator::tag('div','',array('class'=>'shuttle-color va')), ' VA'),'/shuttle/schedule/va');
        $this->add_item(array(HTML_Decorator::tag('div','',array('class'=>'shuttle-color bronze')), ' Bronze'),'/shuttle/schedule/bronze');        
        $this->add_item(array(HTML_Decorator::tag('div','',array('class'=>'shuttle-color yellow')), ' Yellow'),'/shuttle/schedule/yellow');
        $this->add_item(array(HTML_Decorator::tag('div','',array('class'=>'shuttle-color red')), ' Red'),'/shuttle/schedule/red');
        $this->add_item(array(HTML_Decorator::tag('div','',array('class'=>'shuttle-color lime')), ' Lime'),'/shuttle/schedule/lime');
        $this->add_item(array(HTML_Decorator::tag('div','',array('class'=>'shuttle-color green')), ' Green'),'/shuttle/schedule/green');
        return parent::render($raw);
    }

}