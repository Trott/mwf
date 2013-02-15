<?php
require_once(dirname(__DIR__).'/assets/lib/decorator.class.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title('UCSF Mobile' . " | Feedback")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header("Feedback")
        ->render();
?>
<ol class="menu">
    <h2>Feedback</h2>
    <li><a rel="external" href="http://campuslifeservices.ucsf.edu/transportation/feedback/">Shuttle Service</a>
    <li><a href="/feedback/ucsf_mobile/">UCSF Mobile</a>
</ol>  
<?php 
?><footer id="footer"><p>University of California &copy; 2010-13 UC Regents<br><a href="/about">About</a> | <a href="/feedback/">Feedback</a></p></footer><?php echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>