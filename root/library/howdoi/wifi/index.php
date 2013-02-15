<?php
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/lib/decorator.class.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title('UCSF Mobile' . " | Library | Use WiFi")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header(HTML_Decorator::tag('a','Library', array('href'=>'/library')))
        ->render();
?>
<div class="content"> 
<h1>Use WiFi</h1> 
 
<div> 
<p>Wireless access allows UCSF personnel and students to connect a laptop computer, and in some cases a handheld mobile device, to the campus network and internet from many UCSF locations.</p> 
<h4>Laptops</h4> 
<ul class="bulleted"> 
  <li>Choose <strong>UCSFwpa</strong> from your list of possible WiFi connections.</li> 
  <li>Log in using your MyAccess ID and password.</li> 
  <li>Requires configuration of desktop client the first time.</li> 
</ul> 
<h4>Mobile Devices</h4> 
<ul class="bulleted"> 
  <li>Choose <strong>UCSFwpa</strong> from your list of possible wifi connections.</li> 
  <li>Log in  using your MyAccess ID and password.</li> 
  <li>If prompted, accept certificate.</li> 
</ul>
</div>
</div>
<div class="menu">
<h1>Help</h1> 
<ol> 
  <li><a href="http://it.ucsf.edu/services/wireless-service" rel="external">WiFi Service</a></li> 
  <li><a href="https://myaccess.ucsf.edu/eai/UCAlias/jsp/home.jsp" rel="external">MyAccess Accounts</a></li> 
  <li><a href="mailto:LibraryHelp@ucsf.edu">Contact the Tech Commons Staff</a></li> 
</ol> 
</div> 
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>