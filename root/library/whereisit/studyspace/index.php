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
<ul class="bulleted">
<li>In addition to general library space, room 506 is reserved for quiet study, UCSF students only.</li>
</ul>

<p>Parnassus Group Study Spaces</p>
<ul class="bulleted">
<li>Available to UCSF students for group study during library hours</li>
<li>Some feature whiteboard, X-ray light box</li>
<li>Check out at Service Desk. More info: <a href="tel:+14154762336">(415) 476-2336</a></li>
</ul>

<p>Faculty Carrels</p>
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
<h4>After Hours</h4>
<p>Enter with proxy/ID card</p>
<ul class="bulleted">
<li><a href="/library/whereisit/computers">Computer Spaces</a> (CC151, S165)</li>
<li>Hearst Room, Parnassus Library: 24/7 access, UCSF students only</li>
</ul>
<p class="content-last">More options for students are listed at the <a href="https://saa.ucsf.edu/studentportal/" rel="external">SAA portal</a>.</p>
</div>

</div>
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?> 