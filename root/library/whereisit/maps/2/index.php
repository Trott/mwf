<?php 
require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library | Parnassus Floor 2")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/library">Library</a>')->render();

$legend_icons_titles = Config::get('ucsf_library', 'parnassus_floorplan_legend_labels');
$legend_icons_styles = Config::get('ucsf_library', 'parnassus_floorplan_legend_styles');

$legend = array();
for ($i = 0, $n = count($legend_icons_titles); $i < $n; $i++) {
	$legend[] = array('title' => $legend_icons_titles[$i], 'params' => array('class' => $legend_icons_styles[$i]));
}

echo Site_Decorator::ucsf_library_floorplan('Parnassus Floor 2', array(),
		'../../../img/maps/2.gif', $legend,
		"Technology Commons: 230, 231, 240\nLearning Technologies: 240\nTeaching &amp; Learning Center\nConference Room: 201");
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();