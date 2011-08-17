<?php
/**
 *
 * @package mwf
 *
 * @author ebollens
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20110519
 *
 * @uses Decorator
 * @uses Site_Decorator
 * @uses HTML_Decorator
 * @uses HTML_Start_HTML_Decorator
 * @uses Head_Site_Decorator
 * @uses Body_Start_HTML_Decorator
 * @uses Header_Site_Decorator
 * @uses Content_Full_Site_Decorator
 * @uses Button_Full_Site_Decorator
 * @uses Default_Footer_Site_Decorator
 * @uses Body_End_HTML_Decorator
 * @uses HTML_End_HTML_Decorator
 */
require_once(dirname(dirname(__FILE__)) . '/assets/lib/decorator.class.php');
require_once(dirname(dirname(__FILE__)) . '/assets/config.php');

echo HTML_Decorator::html_start()->render();

echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | About")->render();

echo HTML_Decorator::body_start()->render();

echo Site_Decorator::ucsf_header("About")
        ->render();

//Decorator doesn't yet handle unordered lists, too tedious to use HTML_Decorator::tag, so they're hardcoded for now.
echo Site_Decorator::content_full()
        ->set_padded()
        ->add_header('About UCSF Mobile')
        ->add_section('The UCSF Mobile website (m.ucsf.edu) is a project of the ' .
                HTML_Decorator::tag('a', 'UCSF Library &amp; Center for Knowledge Management', array('href' => 'http://library.ucsf.edu')) .
                ' in collaboration with:' .
                '<ul><li>Transportation Services (Shuttle)</li>' .
                '<li>IT Services (Directory)</li>' .
                '<li>Campus Life Services (Fitness)</li>' .
                '<li>Campus Planning (Maps)</li>' .
                '<li>University Relations (Events, News)</li></ul>')
        ->add_section('The UCSF Mobile website is powered by the ' .
                HTML_Decorator::tag('a', 'UCLA Mobile Web Framework', array('href' => 'http://mwf.ucla.edu')) . '.')
        ->render();

// button-top not yet implemented in Site_Decorator--if it won't be, maybe change css to apply button-top styling to the surrounding <div> tag
//echo Site_Decorator::button_full(array('id'=>'button-top'))
//                ->set_padded()
//                ->add_option(Config::get('global', 'back_to_home_text'), Config::get('global', 'site_url'))
//                ->render();
?><a href="javascript:history.back()" id="button-top" class="button-full button-padded">Back</a><?php
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>