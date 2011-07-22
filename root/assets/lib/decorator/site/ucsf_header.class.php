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
 * @version 20110518
 *
 * @uses Decorator
 * @uses Tag_HTML_Decorator
 * @uses Config
 */

require_once(dirname(__FILE__).'/header.class.php');

class Ucsf_Header_Site_Decorator extends Header_Site_Decorator
{
	private $_image = false;
	private $_title = false;
	private $_title_path = false;
    private $_home_text = false;

    public function __construct($section='') {
    	$this->_title=($section);
    	$this->_image=(array('src'=>Config::get('global', 'header_home_button'),
                                  'alt'=>Config::get('global', 'header_home_button_alt')));
    	parent::__construct();
    }
    public function render()
    {
        if(!$this->_home_text)
            $this->_home_text = Config::get('global', 'header_home_text');
//  HTML_Decorator doesn't do short/void tags.  When it does, we can do something like this:
//        $image = HTML_Decorator::tag('img', false, $this->_image)->render();
//        $home_text = HTML_Decorator::tag('span', $this->_home_text);
//        $home_button = HTML_Decorator::tag('a', array($image,$home_text), array('href'=>Config::get('global', 'site_url')))->render();
//
//  For now, we'll just do this horrible hack instead:
//  <horrible_hack>
        $home_button = '<a href="/"><img src="'.$this->_image['src'].'" alt="'.$this->_image['alt'].'" /><span>Mobile</span></a>';
//  </horrible_hack>
        if($this->_title_path)
            $title = $this->_title ? HTML_Decorator::tag('a', $this->_title, array('href'=>$this->_title_path)) : false;
        else
            $title = $this->_title ? $this->_title : '';

        $separator = '';
        $title_span = '';
        if ($title) {
        	$separator = HTML_Decorator::tag('img', false, array("src"=>"/assets/img/ucsf-header-separator.png", "alt"=>" | ", "class"=>"separator"))->render();
        	$title_span = HTML_Decorator::tag('span',$title)->render();
        }

        $this->set_param('id', 'header');
        $this->add_inner_front($home_button.$separator.$title_span);
        
        return Tag_HTML_Decorator::render();
    }
}
