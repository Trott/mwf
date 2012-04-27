<?php

/**
 *
 * @package decorator
 * @subpackage site_decorator
 *
 * @author trott
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120426
 *
 * @uses Menu_Site_Decorator
 * @uses Disk_Cache
 */
require_once(__DIR__ . '/menu.class.php');
require_once(dirname(dirname(__DIR__)) . '/disk_cache.class.php');

class Ucsf_Fitness_Menu_Site_Decorator extends Menu_Site_Decorator {

    public function __construct($title = false, $params = array()) {
        parent::__construct($title, $params);
        $this->set_padded()->set_detailed();
    }

    //TODO: The alert stuff is just totally wrong. Contact Dan to find out who
    //         we'd work with to get the feed changed so we can make this suck 
    //         less.
    public function render($raw = false) {
        $alert_cache = new Disk_Cache('ucsf_fitness_alert');
        $alerts = $alert_cache->get('alerts');
        if ($alerts === false) {
            $alerts = file_get_contents('http://campuslifeservices.ucsf.edu/fitnessrecreation/pub_alert_mobile');
            $alert_cache->put('alerts', $alerts);
        }
        //TODO: Splitting on \n seems like a rather brittle file format....
        $alertArray = preg_split("/\n/", $alerts);
        //TODO: OMG WTF BBQ
        if (!preg_match('/There is no alert at this time/', $alerts)) {

            $alertHeaders = array();
            foreach ($alertArray as $line) {
                //TODO: Wat?! How about a generic XML format or something? Or JSON?
                if (preg_match("/^\s+<h3>/", $line)) {
                    array_push($alertHeaders, strip_tags($line));
                }
            }

            $alerts = array('Fitness Updates');
            foreach ($alertHeaders as $header) {
                $alerts[] = HTML_Decorator::tag('br', false);
                $alerts[] = HTML_Decorator::tag('span', $header, array('class' => 'smallprint light'));
            }

            $this->add_item($alerts, '/fitness/updates');
        }

        $this->add_item('Group Fitness and Pools', '/fitness/schedule')
                ->add_item('Hours and Locations', '/fitness/locations')
                ->add_item('Fitness & Recreation Website', 'http://campuslifeservices.ucsf.edu/fitnessrecreation/', array(), array('rel' => 'external'));

        return parent::render($raw);
    }

}