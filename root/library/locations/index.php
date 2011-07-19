<?php
require_once(dirname(dirname(dirname(__FILE__))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(__FILE__))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library | Mobile Resources")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header("Library")
        ->render();
?>
<div class="content-full content-padded"> 
<h1 class="content-first">Library Hours and Locations</h1> 
 
<p>For holidays and other exceptions call:
<a href="tel:+14154762337">(415)&nbsp;476-2337</a></p> 
 
<div> 
<h4>Parnassus Library</h4> 
<div>530 Parnassus Avenue <br /> 
  San Francisco, CA 94143-0840<br /> 
  <a href="/maps/map.php?loc=Kalmanovitz+Library">Map</a><br/> 
<br/> 
Mon - Thurs:    7:45 am - 8:00 pm    <br/> 
Fri:    7:45 am - 7:00 pm    <br/> 
Sat:    CLOSED    <br/> 
Sun:    12:00 noon - 8:00 pm
</div> 
</div> 
 
<div> 
<h4>Mission Bay Library</h4> 
<div>William J. Rutter Conference Center<br /> 
  Room 150 <br /> 
  1675 Owens Street <br /> 
  San Francisco, CA 94143-2119<br /> 
  <a href="/maps/map.php?loc=Rutter+Center">Map</a><br/> 
  <br/> 
  Mon - Thurs: 9:00 am - 9:00 pm    <br/> 
  Fri: 9:00 am - 5:30 pm    <br/> 
  Sat - Sun: CLOSED
</div> 
</div> 
 
 
<div><h4>Other Study Spaces</h4> 
<div class="content-last"> 
Enter with proxy/ID card<br/> 
<br/> 
Computer Lab, S166, Parnassus:<br /> 
24/7 access<br/> 
<br/> 
Hearst Room, Parnassus Library:<br /> 
24/7 access for UCSF students
</div> 
</div> 
</div> 
<a href="javascript:history.back()" id="button-top" class="button-full button-padded">Back</a>
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>