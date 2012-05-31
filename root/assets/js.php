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
 */
/**
 * Include necessary libraries. 
 */
require_once(dirname(__FILE__) . '/lib/js.class.php');

/**
 * Defines the file to be parsed as a Javascript file and restricts online caching.
 */
header("Cache-Control: max-age=0, no-cache, no-store, must-revalidate");
header("Expires: Wed, 11 Jan 1984 05:00:00 GMT");
header('Content-Type: text/javascript');
?>/** Mobile Web Framework | http://mwf.ucla.edu */

mwf={};
<?php

JS::load('core/modernizr.js');


JS::load('utility/analytics.js');

/**
 * Writes apple-touch-icon[-precomposed] to the DOM.
 */
JS::load('full/appicon.php');

/**
 * Moves the window below the URL bar.
 */
JS::load('iphone/safariurlbar.js');

//JS::load('ucsf/LightningTouch-1.0.2.min.js');

JS::load('ucsf/mainPage.js');

