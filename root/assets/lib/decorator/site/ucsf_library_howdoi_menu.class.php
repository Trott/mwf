<?php

/**
 *
 * @package decorator
 * @subpackage site_decorator
 *
 * @author trott
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120214
 *
 * @uses Menu_Site_Decorator
 */
require_once(dirname(__FILE__) . '/menu.class.php');

class Ucsf_Library_Howdoi_Menu_Site_Decorator extends Menu_Site_Decorator {

    public function __construct($title = false, $params = array()) {
        parent::__construct($title, $params);
        $this->set_padded()->set_detailed();
    }

    public function render($raw = false) {
        $this->add_item('Get Network Access', '/library/howdoi/remoteaccess');
        $this->add_item('Use WiFi', '/library/howdoi/wifi');
        $this->add_item('Renew Books', '/library/howdoi/renew');
        return parent::render($raw);
    }

}