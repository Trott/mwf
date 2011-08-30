<?php

/**
 * Configuration file for UCSF news module
 *
 * This should NOT be included directly; instead /assets/config.php should be.
 *
 * @author rtrott
 * @version 20110310
 *
 * @uses Config
 * @link /assets/config.php
 */
require_once(dirname(dirname(__FILE__)) . '/root/assets/lib/config.class.php');

/**
 * feeds
 *
 * Feeds to read in the news module.
 * 
 * The keys are codes to get a particular feed.  Pass as value for "feed" in the URL to get just that feed.
 * 
 * The values are:
 *
 *  - name :: the name that appears for the feed
 *
 *  - url :: the URL of the feed
 *  
 *  - date_format :: format string for date field; omit for a default
 *  
 *  - allowed_tags :: array of tags that should not be removed before displaying an item <description> from the RSS feed; omit for a default
 *  
 *  - direct_link :: boolean; when displaying the items in the feed, link to the <link> contents and not to our view of the <description> contents; omit for default of false
 *
 *  - header_title :: string; blank for default ('<a href="/news">News</a>')
 *  
 * @link /news/index.php
 * @link /news/view.php
 */
Config::set('ucsf_news', 'feeds', array(
    'ucsfnews' => array('name' => 'UCSF News', 'url' => 'http://feeds.feedburner.com/UCSF_News', 'allowed_tags' => array('b', 'i', 'p', 'a', 'em', 'strong')),
    'mediacoverage' => array('name' => 'Media Coverage', 'url' => 'http://feeds.feedburner.com/UCSF_Media_Coverage', 'allowed_tags' => array('b', 'i', 'p', 'a', 'em', 'strong'), 'direct_link' => true)));


/**
 * alternate_feeds
 *
 * Feeds that can be specified in the "feed" URL parameter but will not be expanded on the default page.
 * 
 * The keys are codes to get a particular feed.  Pass as value for "feed" in the URL to get that feed.
 * 
 * The values are:
 *
 *  - name :: the name that appears for the feed
 *
 *  - url :: the URL of the feed
 *  
 *  - date_format :: format string for date field; omit for a default
 *  
 *  - allowed_tags :: array of tags that should not be removed before displaying an item <description> from the RSS feed; omit for a default
 *  
 *  - direct_link :: boolean; when displaying the items in the feed, link to the <link> contents and not to our view of the <description> contents; omit for default of false
 *  
 *  - header_title :: string; blank for default ('<a href="/news">News</a>')
 *  
 *  - hidden :: boolean; do not show feed in list of feeds on main page; omit for default of false
 *  
 * @link /news/index.php
 * @link news/view.php
 */
Config::set('ucsf_news', 'alternate_feeds', array(
    'facstaff' => array('name' => 'UCSF Faculty/Staff News', 'url' => 'http://feeds.feedburner.com/UCSF_Faculty-Staff_News?format=xml', 'allowed_tags' => array('b', 'i', 'p', 'a', 'em', 'strong')),
    'ucsfevents' => array('name' => 'UCSF Events', 'url' => 'http://feeds2.feedburner.com/ucsf/event-calendar', 'date_format' => 'l, F j, g:i A', 'header_title' => '<a href="/events">Events</a>', 'hidden' => true),
    'insideguide' => array('name' => 'Student Inside Guide', 'url' => 'http://insideguide.ucsf.edu/rss.xml', 'header_title' => 'Inside Guide', 'hidden' => true, 'date_format' => ' '),
    'pharmacy' => array('name' => 'School of Pharmacy News', 'url' => 'http://pharmacy.ucsf.edu/news/20.xml'),
    'library' => array('name' => 'Library News', 'url' => 'http://www.library.ucsf.edu/news/all/feed')));