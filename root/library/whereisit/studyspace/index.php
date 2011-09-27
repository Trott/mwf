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
<h4>Parnassus</h4>
<h4><small>Parnassus Group Study Spaces</small></h4>
<ul class="bulleted">
<li>Available to UCSF students for group study during library hours</li>
<li>Include WiFi, electrical outlet, whiteboard, X-ray light box</li>
<li>Check out at Service Desk, advance reservations not available</li>
<li class="content-last">More info: <a href="tel:+14154762336">(415) 476-2336</a></li>
</ul>

<h4><small>Faculty Carrels</small></h4>
<ul class="bulleted">
<li>Available to UCSF faculty during Parnassus library hours</li>
<li>Daily, weekly, and monthly carrels available</li>
<li class="content-last">Reservations and more info: <a href="tel:+14154762336">(415) 476-2336</a></li>
</ul>
</div>
<div>
<h4>Mission Bay</h4>
<ul class="bulleted">
<li>FAMRI Library</li>
<li>Library computer lab CC151: UCSF student ID access whenever the Rutter Center is open</li>
<li>Genentech Hall Room N-114: Designated open study hall from 9pm - 6am</li>
<li class="content-last">Genentech Hall Classrooms: Available when classes are not in session. S-201, S-202, S-204, S-261, S-271</li>

</ul>
</div>
<div>

<h4>ID Card Required</h4>
<ul class="bulleted">
<li><a href="/library/whereisit/computers">Computer Spaces</a></li>
<li>Hearst Room, Parnassus Library:<br />
    24/7 access, UCSF students only</li>
<li class="content-last">More options for students listed on <a href="https://saa.ucsf.edu/studentportal/"><span class="external">SAA portal</span></a></li>
</ul>
</div>

</div>

<a href="javascript:history.back()" id="button-top" class="button-full button-padded">Back</a> 
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?> 