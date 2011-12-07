<?php
require_once(dirname(__FILE__) . '/assets/lib/decorator.class.php');
require_once(dirname(__FILE__) . '/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Calendars")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/calendars">Calendars</a>')
        ->render();

echo Site_Decorator::ucsf_calendar_menu()->render();

echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>
