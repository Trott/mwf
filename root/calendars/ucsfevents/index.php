<?php

require_once(dirname(dirname(__DIR__)) . '/assets/lib/decorator.class.php');
require_once(dirname(dirname(__DIR__)) . '/assets/config.php');

echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header()->render();
?>
<noscript><div class="content center" ' . $this->_style . '><p>JavaScript is required to load calendar content.</p></div></noscript>
<div class="jsonly">
<section id="ucsfevents" class="center"><progress>Loading...</progress></section>
<script>function loadSection() {
    ucsf.news.headlines(document.getElementById("ucsfevents"),
    	"feed_ucsf_events",
    	"http://feeds2.feedburner.com/ucsf/event-calendar",
    	{numEntries: 10, showTime: 1});
}
window.onload=loadSection;</script>
<?php
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();