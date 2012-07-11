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
 * @version 20120312
 *
 * @uses Decorator
 * @uses Tag_HTML_Decorator
 */

require_once(dirname(dirname(__DIR__)).'/decorator.class.php');
require_once(dirname(__DIR__).'/html/tag.class.php');

class Head_Site_Decorator extends Tag_HTML_Decorator
{
    private $_title = '';

    public function __construct()
    {
        parent::__construct('head');
    }

    public function set_title($title)
    {
        if($title)
            $this->_title = $title;
        
        return $this;
    }
    
    public function render($raw=false)
    {   
        $handler_css = '/assets/css/main.css';

        $handler_js = '/assets/js.php';
        
        $this->add_inner_tag_front('meta', false, 
            array('name'=>'viewport', 'content'=>'width=device-width,initial-scale=1,maximum-scale=1'));
        $this->add_inner_tag('script', null, array('type'=>'text/javascript', 'async'=>'', 'src'=>$handler_js));

        $this->add_inner_tag('link', false, 
            array('rel'=>'apple-touch-icon-precomposed', 
                'sizes'=>'144x144', 
                'href'=>'/apple-touch-icon-144x144-precomposed.png'));
        $this->add_inner_tag('link', false, 
            array('rel'=>'apple-touch-icon-precomposed', 
                'sizes'=>'114x114', 
                'href'=>'/apple-touch-icon-114x114-precomposed.png'));
        $this->add_inner_tag('link', false, 
            array('rel'=>'apple-touch-icon-precomposed', 
                'sizes'=>'72x72', 
                'href'=>'/apple-touch-icon-72x72-precomposed.png'));
        $this->add_inner_tag('link', false, 
            array('rel'=>'apple-touch-icon-precomposed', 
                'href'=>'/apple-touch-icon-precomposed.png'));
        
        
        $this->add_inner_tag_front('noscript', HTML_Decorator::tag('style', '.jsonly{display:none}'));
        $this->add_inner_tag_front('link', false, array('rel'=>'stylesheet', 'type'=>'text/css', 'href'=>$handler_css, 'media'=>'screen'));
        $this->add_inner_tag_front('title', $this->_title);

        $this->add_inner_tag_front('meta', false, array('charset'=>'utf-8'));
        
        return parent::render($raw);
    }
}
