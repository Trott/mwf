<?php 
require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/assets/lib/decorator.class.php');
?><!DOCYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>UCSF Mobile | Library | Parnassus Floor 5</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css" media="screen">
    <noscript><style>.jsonly{display:none}</style></noscript>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <script>
            window.onload = function () {
                var deferred = document.createElement('script');
                deferred.src = '/assets/js/ucsf.js';
                document.body.appendChild(deferred);
            }
    </script>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/apple-touch-icon-precomposed.png">
</head>
<?php
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header(HTML_Decorator::tag('a','Library',array('href'=>'/library')))->render();

$legend_icons_titles = array('Computers','Elevators','Photocopiers','Reshelving Area','Restrooms','Stairs');
$legend_icons_styles = array("ucsf-library-floorplan-legend ucsf-library-floorplan-legend-computer","ucsf-library-floorplan-legend ucsf-library-floorplan-legend-elevator","ucsf-library-floorplan-legend ucsf-library-floorplan-legend-photocopy","ucsf-library-floorplan-legend ucsf-library-floorplan-legend-reshelving","ucsf-library-floorplan-legend ucsf-library-floorplan-legend-restroom","ucsf-library-floorplan-legend ucsf-library-floorplan-legend-stairs");

$legend = array();
for ($i = 0, $n = count($legend_icons_titles); $i < $n; $i++) {
	$legend[] = array('title' => $legend_icons_titles[$i], 'params' => array('class' => $legend_icons_styles[$i]));
}

echo Site_Decorator::ucsf_library_floorplan('Parnassus Floor 5', array(),
		'../../../img/maps/5.gif', $legend,
		implode("\n", array('Books, A-P: A', 'Archives: 527', 
				'Lange Room: 522', 'UCSF Quiet Study: 506')));
?><footer id="footer"><p>University of California &copy; 2010-13 UC Regents<br><a href="/about">About</a> | <a href="/feedback/">Feedback</a></p></footer><?php echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();