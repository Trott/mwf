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
        $this->add_item(array(HTML_Decorator::tag('img',false,array('src'=>"/public/images/blue.jpg", 'alt'=>"")), ' Blue'),'/shuttle/schedule/blue');
        $this->add_item(array(HTML_Decorator::tag('img',false,array('src'=>"/public/images/gold.jpg", 'alt'=>"")), ' Gold'),'/shuttle/schedule/gold');
        $this->add_item(array(HTML_Decorator::tag('img',false,array('src'=>"/public/images/grey.jpg", 'alt'=>"")), ' Grey'),'/shuttle/schedule/grey');        
        $this->add_item(array(HTML_Decorator::tag('img',false,array('src'=>"/public/images/tan.jpg", 'alt'=>"")), ' Tan'),'/shuttle/schedule/tan');
        $this->add_item(array(HTML_Decorator::tag('img',false,array('src'=>"/public/images/black.jpg", 'alt'=>"")), ' Black'),'/shuttle/schedule/black');
        $this->add_item(array(HTML_Decorator::tag('img',false,array('src'=>"/public/images/purple.jpg", 'alt'=>"")), ' Purple'),'/shuttle/schedule/purple');
        $this->add_item(array(HTML_Decorator::tag('img',false,array('src'=>"/public/images/pink.jpg", 'alt'=>"")), ' Pink'),'/shuttle/schedule/pink');
        $this->add_item(array(HTML_Decorator::tag('img',false,array('src'=>"/public/images/va.jpg", 'alt'=>"")), ' VA'),'/shuttle/schedule/va');
        $this->add_item(array(HTML_Decorator::tag('img',false,array('src'=>"/public/images/bronze.jpg", 'alt'=>"")), ' Bronze'),'/shuttle/schedule/bronze');        
        $this->add_item(array(HTML_Decorator::tag('img',false,array('src'=>"/public/images/yellow.jpg", 'alt'=>"")), ' Yellow'),'/shuttle/schedule/yellow');
        $this->add_item(array(HTML_Decorator::tag('img',false,array('src'=>"/public/images/red.jpg", 'alt'=>"")), ' Red'),'/shuttle/schedule/red');
        $this->add_item(array(HTML_Decorator::tag('img',false,array('src'=>"/public/images/lime.jpg", 'alt'=>"")), ' Lime'),'/shuttle/schedule/lime');
        $this->add_item(array(HTML_Decorator::tag('img',false,array('src'=>"/public/images/green.jpg", 'alt'=>"")), ' Green'),'/shuttle/schedule/green');
        return parent::render($raw);
    }

}