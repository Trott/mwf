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

class UCSF_News_Section_Site_Decorator {

    private $_style;

    public function __construct($header_title, $feeds, $item_limit, $more, $alt_feeds, $params=array()) {
        $this->_style = array_key_exists('style', $params) ? 
                'style="' . htmlspecialchars($params['style']) . '"' : '';
                
        return $this;
    }

    public function render($raw = false) {

        return '<noscript><div class="content center" ' . $this->_style . '><p>JavaScript is required to load News content.</p></div></noscript>'
            . '<div id="il/news" class="jsonly" ' . $this->_style . '>'
            . '<section id="ucsf-news" class="center"><progress>Loading...</progress></section>'
            . '<section id="media-coverage" class="center"><progress>Loading...</progress></section></div>'
            . '<script type="notJs">var _newsq = _newsq || [];'
            . ' function loadSection() {'
            //. ' if (document.getElementById("il/news").style.display !== "none") {'
            . '    _newsq.push(["ucsf-news","feed_ucsf_news","http://feeds.feedburner.com/UCSF_News"]);'
            . '    _newsq.push(["media-coverage","feed_media_coverage","http://feeds.feedburner.com/UCSF_Media_Coverage"]);'
            . ' }'
            //. '}'    
            . 'loadSection();window.onhashchange=loadSection;'
            .'</script>'
            ;
    }

}
//Use autoload and callback on jsapi script tag in news.src.js if google does not exist?
