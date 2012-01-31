<?php 
require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library | Parnassus Floor 1")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/library">Library</a>')->render();
include(dirname(dirname(__FILE__)).'/map_legend.inc.php');
echo Site_Decorator::ucsf_library_floorplan('Parnassus Floor 1', array(),
		'../../../img/maps/1.gif', $legend, 
		"Conference Rooms: 119, 128-129\nAdministration: 128");
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();