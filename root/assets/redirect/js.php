<?php

/**
 * Redirection file for non-mobile pages that redirects mobile devices to the
 * mobile site and generates an empty file for desktop browsers. 
 *
 * This script file should NOT be included on the same page as /assets/js.php.
 *
 * @package core
 * @subpackage redirect
 *
 * @author ebollens
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20111108
 *
 * @uses Cookie
 */

header('Content-Type: text/javascript');
header('Cache-Control: max-age=0');

/**
 * If GET 'm' isn't set, then this page has no content
 */
if(!isset($_GET['m']))
    exit();

/** 
 * The page to redirect to is GET 'm' 
 */
$mobile_page = $_GET['m'];

/**
 * Determine if an override request has been made of the referrer
 */
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
$referer_uri = strpos($referer, '?') !== false ? substr($referer, strpos($referer, '?')+1, strlen($referer)-strpos($referer, '?')-1) : '' ;
$override = false;
foreach(explode('&', $referer_uri) as $row){
    if(strpos($row, '=') !== false && (substr($row, 0, strpos($row, '=')) == 'ovrrdr' || substr($row, 0, strpos($row, '=')) == 'override_redirect'))
        $override = substr($row, strpos($row, '=')+1, strlen($row)-strpos($row, '=')-1) == 0 ? 0 : 1;
}

/** 
 * Script ends on a blank page if no redirect needs to occur. 
 */
if($override)
    exit();

/**
 * Include core libraries to perform redirect iff mobile
 */
$core_dir = dirname(dirname(__FILE__)).'/js/core/';
$core_filenames = array('vars.php');
foreach($core_filenames as $core_filename)
    include_once($core_dir.$core_filename);

/**
 * Include the redirection routine itself
 */
include(dirname(__FILE__).'/redirect.js');

echo 'mwf.redirect("'.$_GET['m'].'");';
