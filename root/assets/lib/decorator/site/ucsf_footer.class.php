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

require_once(dirname(__FILE__).'/default_footer.class.php');

class Ucsf_Footer_Site_Decorator extends Default_Footer_Site_Decorator
{
	public function __construct()
    {          
        parent::__construct();
        $this->show_powered_by(false);
        if($full_site_url = Config::get('global', 'full_site_url'))
            $this->set_full_site('View Full Site', Config::get('frontpage', 'full_site_url'));

        if($help_site_url = Config::get('global', 'help_site_url'))
            $this->set_help_site('Feedback', Config::get('frontpage', 'help_site_url'));        
    }
}
