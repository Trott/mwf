<?php
/**
 * @author trott
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20111122
 *
 * @uses Decorator
 * @uses Site_Decorator
 * @uses HTML_Decorator
 * @uses Config
 * @uses Ucsf_Back_Button_Full_Site_Decorator
 */
require_once(dirname(__FILE__) . '/assets/lib/decorator.class.php');
require_once(dirname(__FILE__) . '/assets/config.php');

echo HTML_Decorator::html_start()->render();

echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | About")->render();

echo HTML_Decorator::body_start()->render();

echo Site_Decorator::ucsf_header("About")
        ->render();

//Decorator doesn't yet handle unordered lists, too tedious to use HTML_Decorator::tag, so they're hardcoded for now.
echo Site_Decorator::content_full()
        ->set_padded()
        ->add_header('About UCSF Mobile')
        ->add_section('UCSF Mobile is a joint project of: ' .
                '<ul class="bulleted"><li>Information Technology Services</li>' .
                '<li>Library &amp; Center for Knowledge Management</li>' .
                '<li>University Relations</li></ul>' .
                'In collaboration with:' .
                '<ul class="bulleted"><li>Transportation Services (Shuttle)</li>' .
                '<li>Campus Life Services (Fitness)</li>' .
                '<li>Campus Planning (Maps)</li></ul>')
        ->add_section('The UCSF Mobile website is powered by the ' .
                HTML_Decorator::tag('a', 'Mobile Web Framework', array('href' => 'http://mwf.ucla.edu')) . '.')
        ->render();

echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>