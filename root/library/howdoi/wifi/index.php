<?php
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library | Use WiFi")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header("Library")
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
<h4>Need Help?</h4> 
<ul class="bulleted"> 
  <li>Detailed information at the <a href="http://its.ucsf.edu/main/campus_wireless.html"><span class="external">Wireless Access</span></a> page</li> 
  <li>What is a <a href="http://its.ucsf.edu/main/MyAccess/myaccess_faqs.html"><span class="external">MyAccess ID</span></a>?</li> 
  <li> Contact the <a href="mailto:LibraryHelp@ucsf.edu">Tech Commons Staff </a></li> 
  </ul> 
</div> 
</div>
<a href="javascript:history.back()" id="button-top" class="button-full button-padded">Back</a>
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>