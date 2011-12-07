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
require_once(dirname(dirname(dirname(__FILE__))) . '/decorator.class.php');
require_once(dirname(dirname(__FILE__)) . '/html/tag.class.php');

class Ucsf_Directory_Form_Site_Decorator extends Tag_HTML_Decorator {

    private $_title = false;
    private $_list = array();

    public function __construct($title = 'Directory', $params = array()) {
        parent::__construct('form', false, array_merge($params,array('method' => 'post', 'action' => '/directory/query')));
        $this->add_class('form-full');
        $this->add_class('form-padded');
        if ($title)
            $this->set_title($title);
    }

    public function &set_title($inner, $params = array()) {
        $this->_title = $inner === false ? false : HTML_Decorator::tag('h1', $inner, $params);
        return $this;
    }

    public function &add_item($var_name, $input_type='text', $label_text='', $input_params = array(), $label_params = array(), $input_default='') {
        if (!is_array($this->_list))
            $this->_list = array();
        if (!is_array($label_params))
            $li_params = array();
        if (!is_array($input_params))
            $a_params = array();

        if ($label_text) {
            $this->_list[] = HTML_Decorator::tag('label', $label_text, array_merge($label_params, array('for' => $var_name)));
        }

        $default_params = $var_name ? array('id' => $var_name, 'type' => $input_type, 'name' => $var_name) : array('type' => $input_type);
        $this->_list[] = HTML_Decorator::tag('input', $input_default, array_merge($input_params, $default_params));
        return $this;
    }

    public function render() {
        $this->add_item('first_name', 'text', 'First Name');
        $this->add_item('last_name', 'text', 'Last Name');
        $this->add_item('directory', 'text', 'Directory');
        $this->add_item('', 'submit', '', array('value' => 'Search'));

        $count = count($this->_list);

        if ($this->_title)
            $this->_title->add_class('form-first');
        else
            $this->_list[0]->add_class('menu-first');

        $content='';
        foreach ($this->_list as $list_item)
            $content .= $list_item->render();

        $title = is_a($this->_title, 'Decorator') ? $this->_title->render() : ($this->_title ? $this->_title : '');

        $this->add_inner_front($title . $content);
        return parent::render();
    }

}