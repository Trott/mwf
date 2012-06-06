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

/**
 * Defines the file to be parsed as a Javascript file and restricts online caching.
 */
header("Cache-Control: max-age=0, no-cache, no-store, must-revalidate");
header("Expires: Wed, 11 Jan 1984 05:00:00 GMT");
header('Content-Type: text/javascript');
?>var ucsf = ucsf || {};<?php

require('js/core/modernizr.js');

require('js/utility/analytics.js');

/**
 * Moves the window below the URL bar.
 */
require('js/iphone/safariurlbar.js');

require('js/ucsf/LightningTouch-1.0.3.min.js');

require('js/ucsf/mainPage.js');
