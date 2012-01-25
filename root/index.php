<?php
/**
 * The front page when the user arrives at the mobile site on a mobile device.
 * If the user is on a non-mobile device and {'global':'site_nonmobile_url'} is
 * set in config/global.php, then they will be redirected.
 *
 * This page throws a fatal error if either {'global':'site_url'} or
 * {'global':'site_assets_url'} are not set in /config/global.php.
 *
 * @package frontpage
 *
 * @author ebollens
 * @author trott
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20111205
 *
 * @uses Classification
 * @uses Config
 * @uses JS
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
 * 
 * @link /config/global.php
 * @link assets/redirect/unset_override.php
 */
/**
 * Require necessary libraries.
 */

require_once(dirname(__FILE__) . '/assets/lib/classification.class.php');
require_once(dirname(__FILE__) . '/assets/config.php');
require_once(dirname(__FILE__) . '/assets/lib/decorator.class.php');
require_once(dirname(__FILE__) . '/assets/redirect/unset_override.php');

/**
 * Handle differences between a subsection and the top-level menu, using key
 * 'default' if on the front page or otherwise the $_GET['s'] parameter.
 */

$menu_section = 'default';
if (isset($_GET['s'])) {
    $menu_section = $_GET['s'];
}

$menu_names = Config::get('frontpage', 'menu.name.' . $menu_section);

if (!isset($menu_names)) {
    $menu_section = 'default';
    $menu_names = Config::get('frontpage', 'menu.name.'.$menu_section);
}

$menu_ids = Config::get('frontpage', 'menu.id.' . $menu_section);
$menu_urls = Config::get('frontpage', 'menu.url.' . $menu_section);
$menu_restrictions = Config::get('frontpage', 'menu.restriction.' . $menu_section);

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
    $head->add_js_handler_library('standard_libs', 'preferences');
    $head->add_js_handler_library('standard', '/assets/js/ucsf/layout.js');
    $head->add_js_handler_library('full_libs', 'fastLink');
    $head->add_js_handler_library('full_libs', 'history');
}
echo $head->render();

echo HTML_Decorator::body_start($main_menu ? array('class'=>'front') : array())->render();

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

$menu = Site_Decorator::menu()->set_padded()->set_detailed();

if($main_menu)
    $menu->add_class('front')->set_param('id','main_menu');
        
if (Classification::is_full())
    $menu->set_param('style', 'display:none');

for ($i = 0; $i < count($menu_names); $i++) {

    if (isset($menu_restrictions[$i])) {
        $function = $menu_restrictions[$i];
        if (!User_Agent::$function())
            continue;
    }

    $menu->add_item($menu_names[$i], $menu_urls[$i], isset($menu_ids[$i]) ? array('id' => $menu_ids[$i]) : array());
}

echo $menu->render();

//TODO: Refactor this to read from config file rather than being a series of
//   hardcoded items

if (($main_menu) && (Classification::is_full())) {
    echo Site_Decorator::ucsf_shuttle_menu('Shuttle', array('id' => 'il/shuttle/','style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_directory_form('Directory',array('id' => 'il/directory', 'style'=>'display:none'))->render();
    echo Site_Decorator::ucsf_map_menu('Maps',array('id'=>'il/maps/','style'=>'display:none'))->render();
    echo Site_Decorator::ucsf_library_menu('Library',array('id'=>'il/library/','style'=>'display:none'))->render();
    echo Site_Decorator::ucsf_library_locations_menu('Locations',array('id'=>'il/library/locations','style'=>'display:none'))->render();
    echo Site_Decorator::ucsf_library_locations_parnassus_menu('Parnassus Library',array('id'=>'il/library/locations/parnassus','style'=>'display:none'))->render();
    echo Site_Decorator::ucsf_library_locations_missionbay_menu('Mission Bay Library',array('id'=>'il/library/locations/mission_bay','style'=>'display:none'))->render();
    echo Site_Decorator::ucsf_library_locations_studyspaces_content('Other Study Spaces',array('id'=>'il/library/locations/study_spaces','style'=>'display:none'))->render();    
    echo Site_Decorator::ucsf_calendar_menu('Calendars',array('id'=>'il/calendars','style'=>'display:none'))->render();
    echo Site_Decorator::ucsf_social_media_menu('Social Media',array('id'=>'il/social','style'=>'display:none'))->render();
    echo Site_Decorator::ucsf_emergency_menu('Emergency',array('id'=>'il/emergency','style'=>'display:none'))->render();
}

/**
 * Back button
 */
if(!$main_menu)
    echo Site_Decorator::button()
                ->set_padded()
                ->add_option(Config::get('global', 'back_to_home_text'), 'index.php')
                ->render();
    
/**
 * Footer
 */

echo Site_Decorator::ucsf_footer()->back_button()->render();

/**
 * End page
 */
echo HTML_Decorator::body_end()->render();

echo HTML_Decorator::html_end()->render();
