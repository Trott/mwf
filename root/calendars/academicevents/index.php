<?php

require_once(dirname(dirname(__DIR__)) . '/assets/lib/decorator.class.php');

echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header()->render();
?>
<noscript>
	<div class="content center">
		<p>JavaScript is required to load this content.</p>
	</div>
</noscript>
<div class="jsonly">
	<section id="academicevents" class="center"><progress>Loading...</progress></section>
</div>

<script type="text/javascript">
	var _newsq = _newsq || [];
    function loadSection() {
        _newsq.push(["academicevents","feed_academic_events",
        	"http://25livepub.collegenet.com/calendars/fae-1.rss", {numEntries:10, showTime:1}]);
    }   
    loadSection();window.onhashchange=loadSection;
</script>
<?php
?><footer id="footer"><p>University of California &copy; 2010-13 UC Regents<br><a href="/about">About</a> | <a href="/feedback/">Feedback</a></p></footer><?php echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();