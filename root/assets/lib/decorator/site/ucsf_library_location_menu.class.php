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
require_once(dirname(__FILE__) . '/menu.class.php');

class Ucsf_Library_Location_Menu_Site_Decorator extends Menu_Site_Decorator {

    protected $_mapLink;
    protected $_address;
    protected $_phone;
    protected $_hours;
    protected $_extLink;

    public function __construct($title, $params = array(), $mapLink = '', $address = '', $phone = '', $hours = '', $extLink = '') {
        parent::__construct($title, $params);
        $this->_mapLink = $mapLink;
        $this->_address = $address;
        $this->_phone = $phone;
        $this->_hours = $hours;
        $this->_extLink = $extLink;
        $this->set_padded()->set_detailed();
    }

    public function render($raw = false) {
        $address_array = preg_split("/[\n]+/", $this->_address);
        $address = array();
        foreach ($address_array as $address_element) {
            $address[] = $address_element;
            $address[] = HTML_Decorator::tag_open('br');
        }
        
        $hours_array = preg_split("/[\n]+/", $this->_hours);
        $hours = array();
        foreach ($address_array as $address_element) {
            $hours[] = $address_element;
            $hours[] = HTML_Decorator::tag_open('br');
        }


        $this->add_item(array('Map', HTML_Decorator::tag_open('br'), HTML_Decorator::tag_open('br'),
            HTML_Decorator::tag('span', $address, array('class' => 'smallprint'))), $this->_mapLink);
        $this->add_item($this->_phone, 'tel:+1' . preg_replace('/[^0-9]/', '', $this->_phone), array());
        $this->add_item(array(HTML_Decorator::tag('span', $hours, array('class' => 'smallprint')),
            HTML_Decorator::tag_open('br'), HTML_Decorator::tag_open('br'),
            HTML_Decorator::tag('span', 'Holidays and exceptions', array('class'=>'external'))), $this->_extLink, array(), array('rel' => 'external', 'class' => 'no-ext-ind'));
        return parent::render($raw);
    }

}
