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
require_once(dirname(dirname(dirname(__FILE__))) . '/config.class.php');
require_once(dirname(__FILE__) . '/footer.class.php');

class Default_Footer_Site_Decorator extends Footer_Site_Decorator {

    public function __construct() {
        parent::__construct();

        if ($footer_link_titles = Config::get('global', 'footer_link_titles')) {
            $footer_link_urls = Config::get('global', 'footer_link_urls');
            foreach ($footer_link_titles as $key=>$title) {
                if (array_key_exists($key, $footer_link_urls)) {
                    $this->add_footer_link($title, $footer_link_urls[$key]);
                } else {
                    $this->add_footer_link($title);
                }
            }
        }
    }

}
