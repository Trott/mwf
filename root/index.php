<?php

/**
 * The front page when the user arrives at the mobile site on a mobile device.
 * If the user is on a non-mobile device and 
 * Config::get('global','site_nonmobile_url') is set, then they will be 
 * redirected.
 *
 * @package frontpage
 *
 * @author ebollens
 * @author trott
 * @copyright Copyright (c) 2010-12 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120426
 *
 * @uses Classification
 * @uses Config
 * @uses Decorator
 * @uses Site_Decorator
 * @uses HTML_Decorator
 * @uses HTML_Start_HTML_Decorator
 * @uses Head_Site_Decorator
 * @uses Body_Start_HTML_Decorator
 * @uses Header_Site_Decorator
 * @uses Menu_Site_Decorator
 * @uses Button_Full_Site_Decorator
 * @uses Footer_Site_Decorator
 * @uses Body_End_HTML_Decorator
 * @uses HTML_End_HTML_Decorator
 * @uses User_Agent
 * 
 * @link assets/redirect/unset_override.php
 */
/**
 * Require necessary libraries.
 */
require_once(dirname(__FILE__) . '/assets/config.php');
require_once(dirname(__FILE__) . '/assets/lib/decorator.class.php');
require_once(dirname(__FILE__) . '/assets/redirect/unset_override.php');
require_once(dirname(__FILE__) . '/assets/lib/user_agent.class.php');
require_once(dirname(__FILE__) . '/assets/lib/classification.class.php');

/**
 * Handle differences between a subsection and the top-level menu, using key
 * 'default' if on the front page or otherwise the $_GET['s'] parameter.
 */
$menu_section = isset($_GET['s']) ? $_GET['s'] : 'default';

$menu_names = Config::get('frontpage', 'menu.name.' . $menu_section);

if (!isset($menu_names)) {
    $menu_section = 'default';
    $menu_names = Config::get('frontpage', 'menu.name.' . $menu_section);
}

$menu_ids = Config::get('frontpage', 'menu.id.' . $menu_section);
$menu_urls = Config::get('frontpage', 'menu.url.' . $menu_section);
$menu_classes = Config::get('frontpage', 'menu.class.' . $menu_section);
$menu_externals = Config::get('frontpage', 'menu.external.' . $menu_section);
$menu_lightnings = Config::get('frontpage', 'menu.lightning.' . $menu_section);

$main_menu = ($menu_section == 'default');

/**
 * Start page
 */
if ($main_menu) {
    echo HTML_Decorator::html_start()->add_appcache()->render();
} else {
    echo HTML_Decorator::html_start()->render();
}

$head = Site_Decorator::head()->set_title(Config::get('global', 'title_text'));

if ($main_menu) {
    $head->set_js_handler_params(array('full' => '/assets/js/ucsf/LightningTouch-1.0.0.min.js+/assets/js/ucsf/mainPage.js'));
}

if ($main_menu && Config::get('frontpage', 'customizable_home_screen'))
    $head->add_js_handler_library('full_libs', 'customizableMenu');

echo $head->render();

echo HTML_Decorator::body_start($main_menu ? array('class' => 'front', 'data-default-target-id' => 'main_menu') : array())->render();

/*
 * Header
 */

if ($main_menu)
    echo Site_Decorator::ucsf_header()->render();
else
    echo Site_Decorator::header()->set_title(ucwords(str_replace('_', ' ', $_GET['s'])))->render();

/*
 * Menu
 */

$menu = Site_Decorator::menu();

if ($main_menu)
    $menu->set_home_screen();
else
    $menu->set_padded()->set_detailed();

if (Classification::is_full())
    $menu->set_param('style', 'display:none');


foreach ($menu_names as $key => $menu_name) {

    $list_item_attributes = array();
    if (isset($menu_classes[$key])) {
        $list_item_attributes['class'] = $menu_classes[$key];
    }
    if (isset($menu_ids[$key])) {
        $list_item_attributes['id'] = $menu_ids[$key];
    }

    $link_attributes = array();
    if (isset($menu_externals[$key])) {
        if ($menu_externals[$key])
            $link_attributes['rel'] = 'external';
    }

    if ($main_menu && Classification::is_full() && $menu_lightnings[$key]) {
        $link_attributes['data-target-id'] = 'il/' . $menu_urls[$key];
    }
    $list_item_attributes = array();
    if (isset($menu_ids[$key]))
        $list_item_attributes['id'] = $menu_ids[$key];

    $menu->add_item($menu_name, $menu_urls[$key], $list_item_attributes, $link_attributes);
}

echo $menu->render();

//TODO: Refactor this to read from config file rather than being a series of
//   hardcoded items

if (($main_menu) && (Classification::is_full())) {
    echo Site_Decorator::ucsf_shuttle_menu('Shuttle', array('id' => 'il/shuttle/', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_shuttle_list_color_menu('Shuttles By Color', array('id' => 'il/shuttle/list/color', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_shuttle_list_location_menu('Shuttles By Location', array('id' => 'il/shuttle/list/location', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_directory_form('Directory',array('id' => 'il/directory', 'style'=>'display:none'))->render();

    echo Site_Decorator::ucsf_news_section( 
            HTML_Decorator::tag('a', 'News', array('href' => '/news')), 
            Config::get('ucsf_news', 'feeds'), 
            4, 
            TRUE, 
            Config::get('ucsf_news', 'alternate_feeds'),
            array('id'=>'il/news', 'style'=>'display:none'))->render();
    
    echo Site_Decorator::ucsf_map_menu('Maps', array('id' => 'il/maps/', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_library_menu('Library', array('id' => 'il/library/', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_library_locations_menu('Locations', array('id' => 'il/library/locations', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_library_locations_parnassus_menu('Parnassus Library', array('id' => 'il/library/locations/parnassus', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_library_locations_missionbay_menu('Mission Bay Library', array('id' => 'il/library/locations/mission_bay', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_library_help_menu('Help', array('id' => 'il/library/help/', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_library_howdoi_menu('How Do I?', array('id' => 'il/library/howdoi/', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_fitness_menu('Fitness', array('id' => 'il/fitness', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_calendar_menu('Calendars', array('id' => 'il/calendars', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_social_media_menu('Social Media', array('id' => 'il/social', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_emergency_menu('Emergency', array('id' => 'il/emergency', 'style' => 'display:none'))->render();
}

/**
 * Back button
 */
if (!$main_menu)
    echo Site_Decorator::button()
            ->set_padded()
            ->add_option(Config::get('global', 'back_to_home_text'), 'index.php')
            ->render();

/**
 * Footer
 */
$footer = Site_Decorator::ucsf_footer()->back_button();
if ($main_menu && Classification::is_full())
    $footer->add_footer_link('Customize Home Screen', "/customize_home_screen.php");
echo $footer->render();

/**
 * End page
 */
echo HTML_Decorator::body_end()->render();

echo HTML_Decorator::html_end()->render();
