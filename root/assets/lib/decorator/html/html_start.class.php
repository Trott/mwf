<?php

/**
 *
 *
 * @package decorator
 * @subpackage html_decorator
 *
 * @author ebollens
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20111027
 *
 * @uses Tag_Open_HTML_Decorator
 */
require_once(__DIR__ . '/tag_open.class.php');

class HTML_Start_HTML_Decorator extends Tag_Open_HTML_Decorator {

    public function __construct($params = array()) {
        parent::__construct('html', $params);
    }
    
    public function add_appcache() {
        return parent::set_param('manifest','/assets/appcache.php');
    }

    public function render($raw = false) {
        return '<!DOCTYPE html>
' . parent::render($raw);
    }

}
