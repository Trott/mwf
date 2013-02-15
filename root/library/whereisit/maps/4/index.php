<?php 
require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/assets/lib/decorator.class.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title('UCSF Mobile' . " | Library | Parnassus Floor 4")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header(HTML_Decorator::tag('a','Library',array('href'=>'/library')))->render();

$legend_icons_titles = array('Computers','Elevators','Photocopiers','Reshelving Area','Restrooms','Stairs');
$legend_icons_styles = array("ucsf-library-floorplan-legend ucsf-library-floorplan-legend-computer","ucsf-library-floorplan-legend ucsf-library-floorplan-legend-elevator","ucsf-library-floorplan-legend ucsf-library-floorplan-legend-photocopy","ucsf-library-floorplan-legend ucsf-library-floorplan-legend-reshelving","ucsf-library-floorplan-legend ucsf-library-floorplan-legend-restroom","ucsf-library-floorplan-legend ucsf-library-floorplan-legend-stairs");

$legend = array();
for ($i = 0, $n = count($legend_icons_titles); $i < $n; $i++) {
	$legend[] = array('title' => $legend_icons_titles[$i], 'params' => array('class' => $legend_icons_styles[$i]));
}

echo Site_Decorator::ucsf_library_floorplan('Parnassus Floor 4', array(),
		'../../../img/maps/4.gif', $legend,
		"Books, Q-Z: A, B\nGroup Study Rooms: 417, 418, 422, 423, 440, 441");
?><footer id="footer"><p>University of California &copy; 2010-13 UC Regents<br><a href="/about">About</a> | <a href="/feedback/">Feedback</a></p></footer><?php echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();