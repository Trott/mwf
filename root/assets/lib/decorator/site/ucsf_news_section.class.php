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
//require_once(dirname(dirname(dirname(dirname(dirname(__DIR__))))) . '/auxiliary/feed/feed.class.php');

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

        return '<div id="il/news" style="display:none"><section id="ucsf-news">Loading...</section>'
            . '<section id="media-coverage">Loading...</section></div>'
            . '<script>function loadSection() {'
            . 'ucsf.news.headlines(document.getElementById("ucsf-news"),"feed_ucsf_news","http://feeds.feedburner.com/UCSF_News");'
            . 'ucsf.news.headlines(document.getElementById("media-coverage"),"feed_media_coverage","http://feeds.feedburner.com/UCSF_Media_Coverage");'
            . '}'
            . 'google.setOnLoadCallback(loadSection);</script>';
    }

}

