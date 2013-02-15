<?php
require_once(dirname(dirname(dirname(__FILE__))).'/assets/lib/decorator.class.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title('UCSF Mobile' . " | Library | Mobile Resources")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header(HTML_Decorator::tag('a','Library', array('href'=>'/library')))
        ->render();
?>
<div class="menu detailed padded">
<h1 class="menu-first">Ask Us</h1>

<ol>
    <li><a href="tel:+14154762337">(415) 476-2337<br/><span class="smallprint">Parnassus</span></a></li>
    <li><a href="tel:+14155144060">(415) 514-4060<br/><span class="smallprint">Mission Bay</span></a></li>
    <li><a href="mailto:LibraryHelp@ucsf.edu">Email</a></li>
    <li><a href="mailto:LibraryHelp@ucsf.edu">Arrange a research consultation</a></li>
</ol>
</div>
<?php 
?><footer id="footer"><p>University of California &copy; 2010-13 UC Regents<br><a href="/about">About</a> | <a href="/feedback/">Feedback</a></p></footer><?php echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>