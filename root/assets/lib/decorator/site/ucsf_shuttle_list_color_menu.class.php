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
    public function render() {
        $this->add_item('<img src="/public/images/0.jpg" alt="" />&nbsp;Blue','/shuttle/schedule/blue');
        $this->add_item('<img src="/public/images/1.jpg" alt="" />&nbsp;Gold','/shuttle/schedule/gold');
        $this->add_item('<img src="/public/images/2.jpg" alt="" />&nbsp;Grey','/shuttle/schedule/grey');        
        $this->add_item('<img src="/public/images/3.jpg" alt="" />&nbsp;Tan','/shuttle/schedule/tan');
        $this->add_item('<img src="/public/images/4.jpg" alt="" />&nbsp;Black','/shuttle/schedule/black');
        $this->add_item('<img src="/public/images/5.jpg" alt="" />&nbsp;Purple','/shuttle/schedule/purple');
        $this->add_item('<img src="/public/images/6.jpg" alt="" />&nbsp;Pink','/shuttle/schedule/pink');
        $this->add_item('<img src="/public/images/7.jpg" alt="" />&nbsp;VA','/shuttle/schedule/va');
        $this->add_item('<img src="/public/images/8.jpg" alt="" />&nbsp;Bronze','/shuttle/schedule/bronze');        
        $this->add_item('<img src="/public/images/9.jpg" alt="" />&nbsp;Yellow','/shuttle/schedule/yellow');
        $this->add_item('<img src="/public/images/11.jpg" alt="" />&nbsp;Red','/shuttle/schedule/red');
        $this->add_item('<img src="/public/images/12.jpg" alt="" />&nbsp;Lime','/shuttle/schedule/lime');
        $this->add_item('<img src="/public/images/15.jpg" alt="" />&nbsp;Green','/shuttle/schedule/green');
        return parent::render();
    }

}