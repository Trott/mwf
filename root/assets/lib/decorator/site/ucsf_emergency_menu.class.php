<?php

/**
 *
 * @package decorator
 * @subpackage site_decorator
 *
 * @author trott
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120124
 *
 * @uses Menu_Site_Decorator
 */
require_once(dirname(__FILE__) . '/menu.class.php');

class Ucsf_Emergency_Menu_Site_Decorator extends Menu_Site_Decorator {

    public function __construct($title = false, $params = array()) {
        parent::__construct($title, $params);
        $this->set_padded()->set_detailed();
    }

    public function render() {
        $this->add_item('911 <span class="smallprint">for emergencies only</span>', 'tel:+911', array());
        $this->add_item('UCSF Police Non-Emergency<br/><span class="smallprint">(415) 476-1414</span>', 'tel:+14154761414', array());
        $this->add_item('UCSF Medical Center Security<br/><span class="smallprint">(415) 885-7890</span>', 'tel:+14158857890', array());
        $this->add_item('Campus Emergency Information Hotline<br/><span class="smallprint">(415) 502-4000</span>', 'tel:+14155024000', array());
        $this->add_item('Back-up Campus Emergency Hotline<br/><span class="smallprint">1 (800) 873-8232</span>', 'tel:+18008738232', array());
        $this->add_item('UCSF Medical Center Information Hotline<br/><span class="smallprint">(415) 885-7828</span>', 'tel:+14158857828', array());
        return parent::render();
    }

}