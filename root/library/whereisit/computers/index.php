<?php
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/lib/decorator.class.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title('UCSF Mobile' . " | Library | Computers")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header(HTML_Decorator::tag('a','Library',array('href'=>'/library')))
        ->render();
?>
<div class="content padded"> 
<h1 class="content-first">Computers</h1> 
 
<div> 
<p>Computing labs, open classrooms, and loaner laptops/iPads are available for UCSF students, faculty, and staff. Use your UCSF ID for entry to computing spaces.</p> 
</div> 
 
<div> 
<h4>Parnassus Library Tech Commons, CL230</h4> 
<ul class="bulleted"> 
<li>PCs and Macs</li> 
<li>Digital video workstations</li> 
<li><a href="tel:+14154764309">(415) 476-4309</a></li> 
</ul> 
</div> 
 
<div> 
<h4>Medical Sciences Building, S165</h4> 
<ul class="bulleted"> 
<li>24/7 access for UCSF students, faculty, residents and fellows</li> 
<li>PCs, 2 iMacs</li> 
<li><a href="tel:+14155025329">(415) 502-5329</a></li> 
</ul> 
</div> 
 
<div> 
<h4>Mission Bay Library, CC151</h4> 
<ul class="bulleted"> 
<li>Macs only, UCSF student ID access whenever the Rutter Center is open</li> 
<li>1675 Owens Street, Rutter Community Center</li> 
<li><a href="tel:+14154764309">(415) 476-4309</a></li> 
</ul> 
</div> 
 
<div> 
<h4>Loaner Laptops</h4> 
<ul class="bulleted"> 
<li>Check out at Parnassus Service Desk</li> 
<li>Library borrower account required</li> 
<li>For use in the Parnassus Library only</li> 
<li>More info: <a href="tel:+14154762336">(415) 476-2336</a></li> 
</ul> 
</div> 

<div> 
<h4>Loaner iPads</h4> 
<ul class="bulleted"> 
<li>Check out at Tech Commons Service Desk, CL240</li> 
<li>Library borrower account required</li> 
<li>1 week loan period, may be <a href="http://www.library.ucsf.edu/request-ipad">reserved</a> in advance</li> 
<li class="content-last">More info: <a href="tel:+14154762336">(415) 476-4309</a></li> 
</ul> 
</div> 
 
</div>
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?> 