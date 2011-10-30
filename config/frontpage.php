<?php

/**
 * Configuration file for the front page (index.php).
 *
 * This should NOT be included directly; instead /assets/config.php should be.
 *
 * @author ebollens
 * @version 20110511
 *
 * @uses Config
 * @link /assets/config.php
 */

require_once(dirname(dirname(__FILE__)).'/root/assets/lib/config.class.php');

/**
 * header_image_main
 * header_image_main_alt
 * header_image_sub
 * header_image_sub_alt
 * header_main_text
 */

Config::set('frontpage', 'header_image_main', Config::get('global', 'site_assets_url').'/img/ucsf-logo.png');
Config::set('frontpage', 'header_image_main_alt', 'UCSF');
Config::set('frontpage', 'header_image_sub_alt', 'UCSF');
Config::set('frontpage', 'header_image_sub', Config::get('global', 'site_assets_url').'/img/ucsf-logo.png');
Config::set('frontpage', 'header_main_text', 'Mobile');

/**
 * menu
 *
 * The structure of the splash page menu which is a three-deep array.
 * First level array defines the page as requested by GET['s'] and if
 * GET['s'] is not set, it will default to the contained array with the
 * key 'default'.
 *
 * Within each top-level array is another array that contains an item
 * for each menu item in the particular section.
 *
 * Within each item array definition, the following fields are available:
 *
 *  - name :: the name that appears for the menu item
 *
 *  - id :: the CSS id assigned to the item (for specific styling like
 *              the icon image)
 *
 *  - url :: the URL that the item links to (relative to index.php)
 *
 *  - restriction :: a string that may be any of the functions in User_agent
 *              to restrict the item to only appear for some devices
 *
 * @link index.php
 */
Config::set('frontpage', 'menu',  
   array(
   'default'=>array(
        array('name'=>'Shuttle',
              'id'=>'shuttle',
              'url'=>'shuttle'),
        array('name'=>'Directory',
              'id'=>'directory',
              'url'=>'directory'),
        array('name'=>'Fitness',
              'id'=>'fitness',
              'url'=>'fitness'),
        array('name'=>'Maps',
              'id'=>'maps',
              'url'=>'maps'),
        array('name'=>'Library',
              'id'=>'library',
              'url'=>'library'),
        array('name'=>'Calendars',
              'id'=>'calendars',
              'url'=>'calendars'),
        array('name'=>'News',
              'id'=>'news',
              'url'=>'news'),
        array('name'=>'Emergency',
              'id'=>'emergency',
              'url'=>'emergency')
        ),
    )
);

/******************************************************************
 *
 * DEPRECATED SETTINGS
 *
 * Settings below this point are supported by the MWF in a deprecated
 * capacity only and should not be relied on by components or modules
 * as they will eventually be removed.
 *
 * full_site_url    URL of non-mobile site link on front page for mobile devices.
 * help_site_url    URL of the help site or FALSE if there is none.
 *
 * @link index.php
 */
Config::set('frontpage', 'full_site_url', Config::get('global', 'full_site_url'));
Config::set('frontpage', 'help_site_url', Config::get('global', 'help_site_url'));