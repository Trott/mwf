<?php
/**
 * This file is responsible for dynamically loading Javascript for the client
 * based on user agent. This script outputs Javascript and thus can be directly
 * included via <script>.
 *
 * This file should be included on all pages that use the mobile framework.
 *
 * @package core
 * @subpackage js
 *
 * @author ebollens
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20111101
 *
 * @uses JS
 * @uses JSMin
 * @uses Path
 * @uses Path_Validator
 */
/**
 * Include necessary libraries. 
 */
require_once(dirname(__FILE__) . '/lib/js.class.php');
require_once(dirname(__FILE__) . '/lib/jsmin.class.php');
require_once(dirname(__FILE__) . '/lib/path.class.php');
require_once(dirname(__FILE__) . '/lib/path_validator.class.php');
$ext = '.js';

/**
 * Defines the file to be parsed as a Javascript file and restricts online caching.
 */
header("Cache-Control: max-age=0, no-cache, no-store, must-revalidate");
header("Expires: Wed, 11 Jan 1984 05:00:00 GMT");
header('Content-Type: text/javascript');
?>/** Mobile Web Framework | http://mwf.ucla.edu */

<?php
/**
 * Core Javascript libraries always included.
 */
$core_filenames = array('vars.php',
    'base.js',
    'modernizr.js',
    'browser.js',
    'util.js',
    'override.js');

/**
 * Include each core Javascript library.
 */
foreach ($core_filenames as $filename)
    JS::load('core/' . $filename);

/**
 * Include utility libraries.
 */
if (!isset($_GET['no_ga']))
    JS::load('utility/analytics.js');

if (!isset($_GET['no_favicon']) && !isset($_GET['no_icon']))
    JS::load('utility/favicon.js');

/**
 * Writes apple-touch-icon[-precomposed] to the DOM.
 */
if (!Config::get('global', 'appicon_allow_disable_flag') || (!isset($_GET['no_appicon']) && !isset($_GET['no_icon'])))
    JS::load('full/appicon.php');

/**
 * Moves the window below the URL bar.
 */
JS::load('iphone/safariurlbar.js');

/**
 * Load all standard (and touch_lib for compat) libraries specified in the URI.
 */
if (isset($_GET['standard_libs']) || isset($_GET['touch_libs'])) {
    $loadarr = isset($_GET['standard_libs']) ? explode(' ', $_GET['standard_libs']) : array();

    if (isset($_GET['touch_libs']))
        $loadarr = array_merge(explode(' ', $_GET['touch_libs']), $loadarr);

    foreach ($loadarr as $load)
        JS::load_from_key($load);
}

/**
 * Load all full (and webkit_lib for compat) libraries specified in the URI.
 */
if (isset($_GET['full_libs']) || isset($_GET['webkit_libs'])) {
    $loadarr = isset($_GET['full_libs']) ? explode(' ', $_GET['full_libs']) : array();

    if (isset($_GET['webkit_libs']))
        $loadarr = array_merge(explode(' ', $_GET['webkit_libs']), $loadarr);

    foreach ($loadarr as $load)
        JS::load_from_key($load);
}

/**
 * Load custom JS files (minified) based on user agent.
 */
if (isset($_GET['basic']))
    foreach (explode(' ', $_GET['basic']) as $file)
        if (Path_Validator::is_safe($file, 'js') && $contents = Path::get_contents($file))
            echo ' ' . JSMin::minify($contents);

if (isset($_GET['standard']))
    foreach (explode(' ', $_GET['standard']) as $file)
        if (Path_Validator::is_safe($file, 'js') && $contents = Path::get_contents($file))
            echo ' ' . JSMin::minify($contents);

if (isset($_GET['full']))
    foreach (explode(' ', $_GET['full']) as $file)
        if (Path_Validator::is_safe($file, 'js') && $contents = Path::get_contents($file))
            echo ' ' . JSMin::minify($contents);
