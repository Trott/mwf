<?php
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/lib/decorator.class.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title('UCSF Mobile' . " | Library | Parnassus Floor Maps")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header(HTML_Decorator::tag('a','Library',array('href'=>'/library')))
        ->render();
?><div class="menu padded detailed">
<h1 class="menu-first">Parnassus Floor Maps</h1>
<ol>
<li><a href="1">Floor 1<br/><span class="smallprint">Conference Rooms<br/>Administration<br/>Bound Journals</span></a></li>
<li><a href="2">Floor 2<br/><span class="smallprint">Technology Commons<br/>Learning Technologies<br/>Teaching &amp; Learning Center<br/>Conference Room</span></a></li>
<li><a href="3">Floor 3<br/><span class="smallprint">Service Desk/Reserves<br/>Copy Services/Cashier<br/>Current Journals<br/>Hearst Reading Room<br/>Group Study Rooms</span></a></li>
<li><a href="4">Floor 4<br/><span class="smallprint">Books, Q-Z<br/>Group Study Rooms</span></a></li>
<li class="menu-last"><a href="5">Floor 5<br/><span class="smallprint">Books, A-P<br/>Archives<br/>Lange Room<br/>UCSF Quiet Study</span></a></li>
</ol>
</div>
<?php 
?><footer id="footer"><p>University of California &copy; 2010-13 UC Regents<br><a href="/about">About</a> | <a href="/feedback/">Feedback</a></p></footer><?php echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>
