<?php

require_once(dirname(__DIR__) . '/assets/lib/decorator.class.php');
require_once(dirname(__DIR__) . '/assets/config.php');

$feeds = Config::get('ucsf_news', 'feeds');
$alt_feeds = Config::get('ucsf_news', 'alternate_feeds');
$all_feeds = array_merge($feeds, $alt_feeds);

$header_title = HTML_Decorator::tag('a', 'News', array('href' => '/news'));
$header_feed = '';
$more = TRUE;
$item_limit = 4;


if (array_key_exists('feed', $_GET) && in_array($_GET['feed'], $all_feeds)) {
    $my_feed = $_GET['feed'];
    $feeds = array($my_feed);
    if (Config::get('ucsf_news', "$my_feed.header_title")) {
        $header_title = Config::get('ucsf_news', "$my_feed.header_title");
        $header_feed = $my_feed;
    }

    $item_limit = PHP_INT_MAX;
    $more = FALSE;
}

echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | " . strip_tags($header_title))->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header($header_title)->render();

echo Site_Decorator::ucsf_news_section($header_title, $feeds, $item_limit, $more, $alt_feeds)->render();

echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();