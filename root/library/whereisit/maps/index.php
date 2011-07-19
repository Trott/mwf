<?php
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library | Parnassus Floor Maps")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header("Library")
        ->render();
?><div class="menu-full menu-padded menu-detailed">
<h1 class="menu-first">Parnassus Floor Maps</h1>
<ol>
<li><a href="1">Floor 1<br/><span class="smallprint">Conference Rooms<br/>Administration<br/>Bound Journals</span></a></li>
<li><a href="2">Floor 2<br/><span class="smallprint">Technology Commons<br/>Learning Technologies<br/>Teaching &amp; Learning Center<br/>Conference Room</span></a></li>
<li><a href="3">Floor 3<br/><span class="smallprint">Service Desk<br/>Copy Services/Cashier<br/>Current Journals<br/>Reserves<br/>Hearst Reading Room<br/>Group Study Rooms</span></a></li>
<li><a href="4">Floor 4<br/><span class="smallprint">Books, Q-Z<br/>Group Study Rooms</span></a></li>
<li class="menu-last"><a href="5">Floor 5<br/><span class="smallprint">Books, A-P<br/>Archives<br/>Lange Reading Room<br/>East Asian Room study space (UCSF students only)</span></a></li>
</ol>
</div>
<a href="javascript:history.back()" id="button-top" class="button-full button-padded">Back</a>
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>
