<?php

require_once(dirname(__DIR__) . '/assets/lib/decorator.class.php');
require_once(dirname(__DIR__) . '/assets/config.php');
require_once(dirname(dirname(__DIR__)) . '/auxiliary/feed/feed.class.php');

$feeds = Config::get('ucsf_news', 'feeds');
$alt_feeds = Config::get('ucsf_news', 'alternate_feeds');
$all_feeds = array_merge($feeds, $alt_feeds);

$more = TRUE;
$item_limit = 4;
$header_title = HTML_Decorator::tag('a', 'News', array('href' => '/news'));
$header_feed = '';

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

$rss = array();
foreach ($feeds as $feed_code) {
    $rss[$feed_code] = new Feed(Config::get('ucsf_news', "$feed_code.name"), Config::get('ucsf_news', "$feed_code.url"));
}

$home_feed_code = '';

if (count($rss) == 1) {
    $home_feed_code = key($rss);
}

date_default_timezone_set('America/Los_Angeles');

echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | " . strip_tags($header_title))->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header($header_title)->render();
foreach ($rss as $feed_code => $feed) {
    $direct_link = Config::get('ucsf_news', "$feed_code.direct_link");
    $date_format = Config::get('ucsf_news', "$feed_code.date_format");
    $num_items_displayed = 0;
    $class = $direct_link ? 'class="external"' : '';
    $items = $feed->get_items();
    if (count($items) == 0) {
        echo Site_Decorator::content()
                ->add_header_light(Config::get('ucsf_news', "$feed_code.name"))
                ->add_section('This news feed is currently unavailable. Please try again later.')
                ->render();
    } else {
        $menu = Site_Decorator::menu()
                ->set_detailed()
                ->set_title_light(Config::get('ucsf_news', "$feed_code.name"));

        for ($i = 0; $i < count($items) && $num_items_displayed < $item_limit; $i++) {
            $item = $items[$i];

            $description = $item->get_description();
            if (empty($description))
                continue;

            $link = $direct_link ? $item->get_link() : 'view.php?feed=' . urlencode($feed_code) . '&amp;id=' . md5($item->get_link());
            $date = empty($date_format) ? $item->get_date() : $item->get_date($date_format);
            $item_text = array(
                HTML_Decorator::tag('span', $item->get_title(), $direct_link ? array('class' => 'external') : array()),
                HTML_Decorator::tag('br', false),
                HTML_Decorator::tag('span', $date, array('class' => 'smallprint light'))
            );
            $menu->add_item($item_text, $link, $direct_link ? array('rel' => 'external', 'class' => 'no-ext-ind') : array());
            $num_items_displayed++;
        }
        if ($more) {
            $menu->add_item('More...', '?feed=' . $feed_code);
        }
        echo $menu->render();
    }
}

if ($feeds == Config::get('ucsf_news', 'feeds')) {
    $menu = Site_Decorator::menu()
            ->set_detailed()
            ->set_title_light('Addtional News')
            ->add_item('UCSF on YouTube', 'http://m.youtube.com/ucsf', array(), array('rel' => 'external'));

    $len = count($alt_feeds);
    foreach ($alt_feeds as $feed_code) {
        if (!(Config::get('ucsf_news', "$feed_code.hidden"))) {
            $menu->add_item(Config::get('ucsf_news', "$feed_code.name"), '?feed=' . $feed_code);
        }
    }
    echo $menu->render();
}
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();