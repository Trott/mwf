<?php

/**
 *
 *
 * @package decorator
 * @subpackage site_decorator
 *
 * @author ebollens
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120122
 *
 * @uses Header_Site_Decorator
 * @uses Classification
 * @uses Config
 */
require_once(dirname(__FILE__) . '/header.class.php');
require_once(dirname(dirname(dirname(__FILE__))) . '/classification.class.php');
require_once(dirname(dirname(dirname(__FILE__))) . '/config.class.php');

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

    public function render() {
        if (Classification::is_native()) 
            return;
        
        if (!$this->_home_text)
            $this->_home_text = Config::get('global', 'header_home_text');
//  HTML_Decorator inserts extraneous whitespace into tags  
//  When this bug is fixed, we can do something like this:
//        $image = HTML_Decorator::tag('img', false, $this->_image)->render();
//        $home_text = HTML_Decorator::tag('span', $this->_home_text);
//        $home_button = HTML_Decorator::tag('a', array($image,$home_text), array('href'=>Config::get('global', 'site_url')))->render();
//
//  For now, we'll just do this horrible hack instead:
//  <horrible_hack>
        $home_button = '<a href="' . Config::get('global', 'site_url') . '"><img src="' . $this->_image['src'] . '" alt="' . $this->_image['alt'] . '" /><span>Mobile</span></a>';
//  </horrible_hack>
        if ($this->_title_path)
            $title = $this->_title ? HTML_Decorator::tag('a', $this->_title, array('href' => $this->_title_path)) : false;
        else
            $title = $this->_title ? $this->_title : '';

        $separator = '';
        $title_span = '';
        if ($title) {
<<<<<<< HEAD
            $separator = HTML_Decorator::tag('img', false, array(
            		"src" => MWF_CONFIG_SITE_ASSETS_URL . "/img/ucsf-header-separator.png", 
            		"alt" => " | ", "class" => "separator"))->render();
=======
            $separator_img_url = Config::get('global', 'site_assets_url') . '/img/ucsf-header-separator.png';
            $separator = HTML_Decorator::tag('img', false, 
                    array("src" => $separator_img_url, "alt" => " | ", "class" => "separator"))->render();
>>>>>>> upstream/ucsf/develop
            $title_span = HTML_Decorator::tag('span', $title)->render();
        }

        $this->set_param('id', 'header');
        $this->add_inner_front($home_button . $separator . $title_span);

        return Tag_HTML_Decorator::render();
    }

}
