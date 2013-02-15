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
 * @uses HTTPS
 */
require_once(dirname(dirname(dirname(__FILE__))) . '/decorator.class.php');
require_once(dirname(dirname(dirname(__FILE__))) . '/https.class.php');
require_once(dirname(dirname(__FILE__)) . '/html/tag.class.php');

class Header_Site_Decorator extends Tag_HTML_Decorator {

    private $_title = false;
    private $_title_path = false;
    private $_image = false;

    public function __construct() {
        parent::__construct('header');
    }

    public function set_title($title) {
        $this->_title = $title;
        return $this;
    }

    public function set_title_path($path) {
        $this->_title_path = $path;
        return $this;
    }

    public function set_image($image, $alt = '') {
        $this->_image = array();
        $this->_image['src'] = $image;
        $this->_image['alt'] = $alt;
        return $this;
    }

}
