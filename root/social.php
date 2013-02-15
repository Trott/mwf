<?php
require_once(dirname(__FILE__) . '/assets/lib/decorator.class.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title('UCSF Mobile' . " | Social Media")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header(HTML_Decorator::tag('a', 'Social Media', array('href'=>'/social')))
        ->render();

echo Site_Decorator::ucsf_social_media_menu()->render();

echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>