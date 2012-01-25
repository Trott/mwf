<?php


/**
 *
 * @package decorator
 * @subpackage site_decorator
 *
 * @author topfstedt
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120124
 *
 * @uses Menu_Full_Site_Decorator
 */
require_once(dirname(__FILE__) . '/menuclass.php');

class Ucsf_Library_Location_Menu_Site_Decorator extends Menu_Site_Decorator {

	protected $_mapLink;
	protected $_address;
	protected $_phone;
	protected $_hours;
	protected $_extLink;
	
    public function __construct($title, $params = array(), $mapLink = '',
    		$address = '', $phone = '', $hours = '', $extLink = '') {
        parent::__construct($title, $params);
        $this->_mapLink = $mapLink;
        $this->_address = $address;
        $this->_phone = $phone;
        $this->_hours = $hours;
        $this->_extLink = $extLink;
        $this->set_padded()->set_detailed();
    }

    public function render() {
        $this->add_item('Map<br/><br/><span class="smallprint">' . nl2br($this->_address, true) . '</span>', $this->_mapLink, array());
        $this->add_item(str_replace(' ', '&nbsp;', $this->_phone), 'tel:+1' . preg_replace('/[^0-9]/', '', $this->_phone), array());
        $this->add_item('<span class="smallprint">' . nl2br($this->_hours, true) . '</span><br/><br/><span class="external">Holidays and exceptions</span>', $this->_extLink, array(),array('rel'=>'external','class'=>'no-ext-ind'));
        return parent::render();
    }
}
