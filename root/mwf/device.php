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

function label($text) {
    return HTML_Decorator::tag('div', $text, array('style' => 'color:#777; font-weight:bold'));
}

function bool2text($text) {
    return $text ? 'true' : 'false';
}

function text2text($text) {
    return $text ? $text : 'false';
}

function js2bool2text($function) {
    return HTML_Decorator::tag('script', 'document.write(' . $function . '() ? "true" : "false");');
}

function js2text($function) {
    return HTML_Decorator::tag('script', 'var t; 
if(t = ' . $function . '())
    document.write(t);
else
    document.write("false");');
}

echo HTML_Decorator::html_start()->render();

echo Site_Decorator::head()->set_title('MWF Device Telemetry')->render();

echo HTML_Decorator::body_start()->render();

echo Site_Decorator::header()
        ->set_title('MWF Device')
        ->render();

echo Site_Decorator::content()
        ->set_padded()
        ->add_header('The Framework')
        ->add_subheader('Server Info')
        ->add_section(array(label('User Agent'), $_SERVER['HTTP_USER_AGENT']))
        ->add_section(array(label('IP Address'), $_SERVER['REMOTE_ADDR']))
        ->render();

echo Site_Decorator::button()
        ->set_padded()
        ->add_option(Config::get('global', 'back_to_home_text'), Config::get('global', 'site_url'))
        ->render();

echo Site_Decorator::default_footer()->render();

echo HTML_Decorator::body_end()->render();

echo HTML_Decorator::html_end()->render();


