<?php

/**
 *
 * @package decorator
 * @subpackage site_decorator
 *
 * @author trott
 * @copyright Copyright (c) 2010-12 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120426
 *
 * @uses Decorator
 * @uses Tag_HTML_Decorator
 */
require_once(dirname(dirname(__DIR__)) . '/decorator.class.php');
require_once(dirname(__DIR__) . '/html/tag.class.php');
require_once(dirname(dirname(dirname(dirname(dirname(__DIR__))))) . '/auxiliary/feed/feed.class.php');

class UCSF_News_Section_Site_Decorator extends Tag_HTML_Decorator {

    private $_header_title;
    private $_feeds;
    private $_item_limit;
    private $_alt_feeds;

    public function __construct($header_title, $feeds, $item_limit, $more, $alt_feeds, $params=array()) {
        $this->_header_title = $header_title;
        $this->_feeds = $feeds;
        $this->_item_limit = $item_limit;
        $this->_more = $more;
        $this->_alt_feeds = $alt_feeds;
        return parent::__construct('section', '', $params);
    }

    public function render($raw = false) {
        $rss = array();
        foreach ($this->_feeds as $feed_code) {
            $rss[$feed_code] = new Feed(Config::get('ucsf_news', "$feed_code.name"), Config::get('ucsf_news', "$feed_code.url"));
        }

        $home_feed_code = '';

        if (count($rss) == 1) {
            $home_feed_code = key($rss);
        }

        date_default_timezone_set('America/Los_Angeles');

        foreach ($rss as $feed_code => $feed) {
            $direct_link = Config::get('ucsf_news', "$feed_code.direct_link");
            $date_format = Config::get('ucsf_news', "$feed_code.date_format");
            $num_items_displayed = 0;
            $class = $direct_link ? 'class="external"' : '';
            $items = $feed->get_items();
            if (count($items) == 0) {
                $this->add_inner(Site_Decorator::content()
                                ->add_header_light(Config::get('ucsf_news', "$feed_code.name"))
                                ->add_section('This news feed is currently unavailable. Please try again later.')
                );
            } else {
                $menu = Site_Decorator::menu()
                        ->set_detailed()
                        ->set_title_light(Config::get('ucsf_news', "$feed_code.name"));

                for ($i = 0; $i < count($items) && $num_items_displayed < $this->_item_limit; $i++) {
                    $item = $items[$i];

                    $description = $item->get_description();
                    if (empty($description))
                        continue;

                    $link = $direct_link ? $item->get_link() : '/news/view.php?feed=' . $feed_code . '&id=' . md5($item->get_link());
                    $date = empty($date_format) ? $item->get_date() : $item->get_date($date_format);
                    $item_text = array(
                        HTML_Decorator::tag('span', $item->get_title(), $direct_link ? array('class' => 'external') : array()),
                        HTML_Decorator::tag('br', false),
                        HTML_Decorator::tag('span', $date, array('class' => 'smallprint light'))
                    );
                    $menu->add_item($item_text, $link, array(), $direct_link ? array('rel' => 'external', 'class' => 'no-ext-ind') : array());
                    $num_items_displayed++;
                }
                if ($this->_more) {
                    $menu->add_item('More...', '/news/?feed=' . $feed_code);
                }
                $this->add_inner($menu);
            }
        }

        if ($this->_feeds == Config::get('ucsf_news', 'feeds')) {
            $menu = Site_Decorator::menu()
                    ->set_detailed()
                    ->set_title_light('Addtional News')
                    ->add_item('UCSF on YouTube', 'http://m.youtube.com/ucsf', array(), array('rel' => 'external'));

            $len = count($this->_alt_feeds);
            foreach ($this->_alt_feeds as $feed_code) {
                if (!(Config::get('ucsf_news', "$feed_code.hidden"))) {
                    $menu->add_item(Config::get('ucsf_news', "$feed_code.name"), '/news/?feed=' . $feed_code);
                }
            }
            $this->add_inner($menu);
        }

        return '<section id="ucsf-news">Loading...</section>'
            . '<section id="media-coverage">Loading...</section>';
        return parent::render($raw);
    }

}

