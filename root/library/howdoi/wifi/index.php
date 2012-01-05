<?php
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library | Use WiFi")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/library">Library</a>')
        ->render();
?>
<div class="content-full content-padded"> 
<h1 class="content-first">Use WiFi</h1> 
 
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
<div class="menu-full menu-padded">
<h1 class="menu-first">Help</h1> 
<ol> 
  <li><a href="http://its.ucsf.edu/main/campus_wireless.html" rel="external">ITS Wireless Access Page</a></li> 
  <li><a href="http://its.ucsf.edu/main/MyAccess/myaccess_faqs.html" rel="external">MyAccess FAQ</a></li> 
  <li class="menu-last"><a href="mailto:LibraryHelp@ucsf.edu">Contact the Tech Commons Staff</a></li> 
</ol> 
</div> 
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>