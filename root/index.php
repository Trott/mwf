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
 * @uses Menu_Full_Site_Decorator
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
 * Ensure that site_url and site_asset_url have been set.
 */
if (!Config::get('global', 'site_url') || !Config::get('global', 'site_assets_url'))
    die('<h1>Fatal Error</h1><p>The configuration settings {global::site_url} and {global::site_asset_url} must be defined in ' . dirname(dirname(__FILE__)) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'global.php</p>');

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
    $menu_names = Config::get('frontpage', 'menu.name.' . $menu_section);
}

$menu_ids = Config::get('frontpage', 'menu.id.' . $menu_section);
$menu_urls = Config::get('frontpage', 'menu.url.' . $menu_section);
$menu_restrictions = Config::get('frontpage', 'menu.restriction.' . $menu_section);

$main_menu = ($menu_section == 'default');
/**
 * Start page
 */
if ($main_menu) {
    echo HTML_Decorator::html_start(array('manifest' => '/assets/appcache.php'))->render();
} else {
    echo HTML_Decorator::html_start()->render();
}

$head = Site_Decorator::head()->set_title(Config::get('global', 'title_text'));
if ($main_menu) {
    $head->add_js_handler_library('standard_libs', 'preferences');
    $head->add_js_handler_library('standard', '/assets/js/ucsf/layout.js');
}
echo $head->render();

echo HTML_Decorator::body_start($main_menu ? array('class' => 'front-page') : array())->render();

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

$menu = Site_Decorator::menu_full()->set_detailed();

if ($main_menu)
    $menu->add_class('menu-front')->set_param('id', 'main_menu');

for ($i = 0; $i < count($menu_names); $i++) {
    if (isset($menu_restrictions[$i])) {
        $function = $menu_restrictions[$i];
        if (!User_Agent::$function())
            continue;
    }

    $menu->add_item($menu_names[$i], $menu_urls[$i], isset($menu_ids[$i]) ? array('id' => $menu_ids[$i]) : array());
}

echo $menu->render();

if (($main_menu) && (Classification::is_full())) {
    echo Site_Decorator::ucsf_shuttle_menu('Shuttle', array('id' => 'shuttle/',
                'style' => 'display:none'))
            ->render();
}

/**
 * Back button
 */
if (!$main_menu)
    echo Site_Decorator::button_full()
            ->set_padded()
            ->add_option(Config::get('global', 'back_to_home_text'), 'index.php')
            ->render();

/**
 * Footer
 */
echo Site_Decorator::ucsf_footer()->back_button(false)->render();
?>
<script>
    var anchors = document.getElementsByTagName("a");

    for (var i = 0; i < anchors.length ; i++) {
        anchors[i].addEventListener("click", 
        function (event) {
            var targetId = this.pathname.substr(1);
            var target = document.getElementById(targetId);
            if (target != null) { 
                event.preventDefault();
                var clickedNode = this.parentNode.parentNode.parentNode;
                var clickedNodeId = clickedNode.getAttribute('id');
                clickedNode.setAttribute("style","display:none");
                history.replaceState({show:clickedNodeId, hide:targetId},'');
                history.pushState({show:targetId,hide:clickedNodeId},'','#'+targetId);
                target.setAttribute("style","display:block");
            }
        }, 
        false);
    }

window.addEventListener("popstate", function(event) {
    if (event.state) {
        if (event.state.hasOwnProperty('hide') && event.state.hasOwnProperty('show')) {
            document.getElementById(event.state.hide).setAttribute("style","display:none"); 
            document.getElementById(event.state.show).setAttribute("style","display:block");
        }
    }
}, false);
</script>
<?

/**
* End page
*/
echo HTML_Decorator::body_end()->render();

echo HTML_Decorator::html_end()->render();
