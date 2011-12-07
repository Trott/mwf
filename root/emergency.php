<?php
require_once(dirname(__FILE__).'/assets/config.php');
require_once(dirname(__FILE__).'/assets/lib/user_agent.class.php');
require_once(dirname(__FILE__).'/assets/lib/decorator.class.php');

echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . ' | Emergency')->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/emergency">Emergency</a>')->render();

echo Site_Decorator::ucsf_emergency_menu()->render();

echo Site_Decorator::ucsf_footer()->render(); 
echo HTML_Decorator::body_end()->render();

echo HTML_Decorator::html_end()->render();
?>