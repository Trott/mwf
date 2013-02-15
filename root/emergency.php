<?php
require_once(dirname(__FILE__).'/assets/lib/decorator.class.php');

echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title('UCSF Mobile' . ' | Emergency')->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header(HTML_Decorator::tag('a','Emergency',array('href'=>'/emergency')))->render();

echo Site_Decorator::ucsf_emergency_menu()->render();

echo Site_Decorator::ucsf_footer()->render(); 
echo HTML_Decorator::body_end()->render();

echo HTML_Decorator::html_end()->render();
?>