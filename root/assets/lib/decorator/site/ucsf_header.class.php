<?php

/**
 *
 *
 * @package decorator
 * @subpackage site_decorator
 *
 * @author ebollens
 * @copyright Copyright (c) 2010-12 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120313
 *
 * @uses Header_Site_Decorator
 * @uses Config
 */
require_once(__DIR__ . '/header.class.php');
require_once(dirname(dirname(__DIR__)) . '/config.class.php');

class Ucsf_Header_Site_Decorator extends Header_Site_Decorator {

    private $_image = false;
    private $_title = false;
    private $_title_path = false;
    private $_home_text = false;

    public function __construct($section='') {
        $this->_title = ($section);
        $this->_image = (array('src' => Config::get('global', 'header_home_button'),
            'alt' => Config::get('global', 'header_home_button_alt')));
        parent::__construct();
    }

    public function render($raw = false) {

        $this->add_class('header');
        $this->set_param('id', 'header');

        if (!$this->_home_text) {
            $this->_home_text = Config::get('global', 'header_home_text');
        }

        $image = HTML_Decorator::tag('img', false, $this->_image);
        $home_text = HTML_Decorator::tag('span', $this->_home_text);
        $home_button = HTML_Decorator::tag('a', array($image, $home_text), array('href' => Config::get('global', 'site_url'), 'data-target-id' => 'main_menu'));


        if ($this->_title_path)
            $title = $this->_title ? HTML_Decorator::tag('a', $this->_title, array('href' => $this->_title_path)) : false;
        else
            $title = $this->_title ? $this->_title : '';

        if ($title) {
            $separator_img_url = Config::get('global', 'site_assets_url') . '/img/ucsf-header-separator.png';
            $separator = HTML_Decorator::tag('img', false, array("src" => $separator_img_url, "alt" => " | ", "class" => "separator"));
            $title_span = HTML_Decorator::tag('span', $title);

            $this->add_inner_front($title_span);
            $this->add_inner_front($separator);
        }
        $this->add_inner_front($home_button);

        return Tag_HTML_Decorator::render($raw);
    }

}
