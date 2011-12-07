<?php
require_once(dirname(__FILE__) . '/../assets/config.php');
require_once(dirname(__FILE__) . '/../assets/lib/decorator.class.php');
require_once(dirname(__FILE__) . '/../assets/lib/classification.class.php');

echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . ' | Maps')->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/maps">Maps</a>')->render();

echo Site_Decorator::ucsf_map_menu()->render();

echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>