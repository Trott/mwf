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

class Ucsf_Social_Media_Menu_Site_Decorator extends Menu_Site_Decorator {

    public function __construct($title = false, $params = array()) {
        parent::__construct($title, $params);
        $this->set_padded()->set_detailed();
    }
    
    public function render($raw = false) {
        $this->add_item('Twitter', 'http://www.twitter.com/ucsf', array(), array('rel'=>'external'));
        $this->add_item('YouTube', 'http://www.youtube.com/ucsf', array(), array('rel'=>'external'));
        $this->add_item('Facebook', 'http://www.facebook.com/ucsf', array(), array('rel'=>'external'));
        return parent::render($raw);
    }

}