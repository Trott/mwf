<?php 
require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library | Parnassus Floor 3")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/library">Library</a>')
        ->render();
include(dirname(dirname(__FILE__)).'/map_legend.inc.php');
echo Site_Decorator::ucsf_library_floorplan('Parnassus Floor 3', array(),
		'../../../img/maps/3.gif', $legend,
		implode("\n", array('Service Desk/Reserves: A', 'Copy Services/Cashier: B', 
          'Current Journals: C', 'Hearst Reading Room: F', 'Group Study Rooms: 316-325')));
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();