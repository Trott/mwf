<?php
require_once(dirname(dirname(dirname(__FILE__))).'/assets/lib/decorator.class.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title('UCSF Mobile' . " | Library | Where Is It?")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header(HTML_Decorator::tag('a','Library',array('href'=>'/library')))
        ->render();
?>
<div class="menu padded detailed">
<h1 class="menu-first">Where Is It?</h1>
<ol>
 <li><a href="maps">Parnassus Library Floor Maps</a></li>
 <li><a href="services">Service Areas</a></li>
 <li><a href="computers">Computers</a></li>
 <li class="menu-last"><a href="studyspace">Study Spaces</a></li>
</ol>
</div>

<?php 
?><footer id="footer"><p>University of California &copy; 2010-13 UC Regents<br><a href="/about">About</a> | <a href="/feedback/">Feedback</a></p></footer><?php echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>