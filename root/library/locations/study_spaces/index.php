<?php
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library | Study Spaces")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/library">Library</a>')
        ->render();

echo Site_Decorator::ucsf_library_locations_studyspaces_content()->render();

echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>