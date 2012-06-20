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
 */

/**
 * Require necessary libraries.
 */
require_once(dirname(__FILE__) . '/assets/config.php');
require_once(dirname(__FILE__) . '/assets/lib/decorator.class.php');

echo HTML_Decorator::html_start()->add_appcache()->render();

$head = Site_Decorator::head()->set_title("UCSF Mobile");

echo $head->render();

echo HTML_Decorator::body_start(array('class' => 'front', 'data-default-target-id' => 'main_menu'))->render();

/*
 * Header
 */

echo Site_Decorator::ucsf_header()->render();

/*
 * Menu
 */
?>
<img style="display:none" alt="" src="/assets/img/background-decor.png">
<img style="display:none" alt="" src="/assets/img/watermark.png">
<div class="menu front" id="main_menu">
    <ol>
        <li>
            <a data-target-id="il/shuttle/" href="shuttle/"><img src="assets/img/homescreen/shuttle.png?full=assets/img/homescreen/tablet/shuttle.png" alt=""><br/>Shuttle</a>
        </li><li>
            <a data-target-id="il/directory" href="directory"><img src="assets/img/homescreen/directory.png?full=assets/img/homescreen/tablet/directory.png" alt=""><br/>Directory</a>
        </li><li>
            <a data-target-id="il/news" href="news"><img src="assets/img/homescreen/news.png?full=assets/img/homescreen/tablet/news.png" alt=""><br/>News</a>
        </li><li>
            <a data-target-id="il/maps/" href="maps/"><img src="assets/img/homescreen/maps.png?full=assets/img/homescreen/tablet/maps.png" alt=""><br/>Maps</a>
        </li><li>
            <a data-target-id="il/library/" href="library/"><img src="assets/img/homescreen/library.png?full=assets/img/homescreen/tablet/library.png" alt=""><br/>Library</a>         
        </li><li>
            <a data-target-id="il/fitness" href="fitness"><img src="assets/img/homescreen/fitness.png?full=assets/img/homescreen/tablet/fitness.png" alt=""><br/>Fitness</a>
        </li><li>
            <a data-target-id="il/calendars" href="calendars"><img src="assets/img/homescreen/calendars.png?full=assets/img/homescreen/tablet/calendars.png" alt=""><br/>Calendars</a>
        </li><li>
            <a data-target-id="il/social" href="social"><img src="assets/img/homescreen/social.png?full=assets/img/homescreen/tablet/social.png" alt=""><br/>Social&nbsp;Media</a>
        </li><li><a data-target-id="il/emergency" href="emergency"><img src="assets/img/homescreen/emergency.png?full=assets/img/homescreen/tablet/emergency.png" alt=""><br/>Emergency</a>
        </li>
    </ol>
</div>
<?php


    echo Site_Decorator::ucsf_shuttle_menu('Shuttle', array('id' => 'il/shuttle/', 'style' => 'display:none'))->set_lightning(true)->render();
    echo Site_Decorator::ucsf_shuttle_list_color_menu('Shuttles By Color', array('id' => 'il/shuttle/list/color', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_shuttle_list_location_menu('Shuttles By Location', array('id' => 'il/shuttle/list/location', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_directory_form('Directory', array('id' => 'il/directory', 'style' => 'display:none'))->render();

    echo Site_Decorator::ucsf_news_section(
            0, 0, 0, 0, 0, array('style' => 'display:none'))->render();

    echo Site_Decorator::ucsf_map_menu('Maps', array('id' => 'il/maps/', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_library_menu('Library', array('id' => 'il/library/', 'style' => 'display:none'))->set_lightning(true)->render();
    echo Site_Decorator::ucsf_library_locations_menu('Locations', array('id' => 'il/library/locations', 'style' => 'display:none'))->set_lightning(true)->render();
    echo Site_Decorator::ucsf_library_locations_parnassus_menu('Parnassus Library', array('id' => 'il/library/locations/parnassus', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_library_locations_missionbay_menu('Mission Bay Library', array('id' => 'il/library/locations/mission_bay', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_library_help_menu('Help', array('id' => 'il/library/help/', 'style' => 'display:none'))->set_lightning(true)->render();
    echo Site_Decorator::ucsf_library_howdoi_menu('How Do I?', array('id' => 'il/library/howdoi/', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_fitness_menu('Fitness', array('id' => 'il/fitness', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_calendar_menu('Calendars', array('id' => 'il/calendars', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_social_media_menu('Social Media', array('id' => 'il/social', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_emergency_menu('Emergency', array('id' => 'il/emergency', 'style' => 'display:none'))->render();


/**
 * Footer
 */
$footer = Site_Decorator::ucsf_footer();
echo $footer->render();

/**
 * End page
 */
echo HTML_Decorator::body_end()->render();

echo HTML_Decorator::html_end()->render();
