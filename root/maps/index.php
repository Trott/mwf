<?php
require_once(dirname(__FILE__) . '/../assets/config.php');
require_once(dirname(__FILE__) . '/../assets/lib/decorator.class.php');

echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title('UCSF Mobile' . ' | Maps')->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header(HTML_Decorator::tag('a', 'Maps', array('href'=>'/maps')))->render();

echo Site_Decorator::ucsf_map_menu()->render();

echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>