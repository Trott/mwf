<?php
require_once(dirname(__DIR__).'/assets/lib/decorator.class.php');
require_once(dirname(__DIR__).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Fitness")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header(HTML_Decorator::tag('a','Fitness', array('href'=>'/fitness')))
        ->render();

echo Site_Decorator::ucsf_fitness_menu()->render();

echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
