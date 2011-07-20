<?php
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library | Study Spaces")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/library">Library</a>')
        ->render();
?>
<div class="content-full content-padded">
<h1 class="content-first">Study Spaces</h1>

<div>
<h4>Parnassus Group Study Spaces</h4>
<ul class="bulleted">
<li>Available to UCSF students for group study during library hours</li>
<li>Include WiFi, electrical outlet, whiteboard, X-ray light box</li>
<li>Large monitors available in some rooms</li>
<li>Check out at Service Desk</li>
<li>UCSF borrowing account is required</li>
<li>Advance reservations not available</li>
<li class="content-last">More info: <a href="tel:+14154762336">(415) 476-2336</a></li>
</ul>
</div>

<div>
<h4>Other Study Spaces</h4>
<p>Enter with proxy/ID card</p>
<ul class="bulleted">
<li><a href="/library/whereisit/computers">Computer Spaces</a></li>
<li>Hearst Room, Parnassus Library:<br />
    24/7 access, UCSF students only</li>
<li class="content-last">More options for students listed on <a href="https://saa.ucsf.edu/studentportal/"><span class="external">SAA portal</span></a></li>
</ul>
</div>

<div>
<h4>Faculty Carrels</h4>
<ul class="bulleted">
<li>Available to UCSF faculty during Parnassus library hours</li>
<li>Daily, weekly, and monthly carrels available</li>
<li>Include WiFi and electrical outlets</li>
<li>UCSF borrowing account is required</li>
<li class="content-last">Reservations and more info: <a href="tel:+14154762336">(415) 476-2336</a></li>
</ul>
</div>
</div>

<a href="javascript:history.back()" id="button-top" class="button-full button-padded">Back</a> 
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?> 