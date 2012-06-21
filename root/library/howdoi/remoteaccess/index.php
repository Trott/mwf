<?php
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library | Get Network Access")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header(HTML_Decorator::tag('a','Library',array('href'=>'/library')))
        ->render();
?>
<div class="content"> 
<h2>Get Network Access</h2> 
<div> 
<p>Some  library resources require you to be on the UCSF network to search and get full text. If you are <strong>on campus</strong>, just connect to one of the <a href="/library/howdoi/wifi">UCSF WiFi networks</a>.  </p> 
<p>If you are off-campus:</p> 
</div> 
<div> 
<h4>Laptops or Desktop Computers</h4> 
<p>Go to the <a rel="external" href="https://vpn.ucsf.edu/dana-na/auth/url_default/welcome.cgi">VPN page</a> and log in with your MyAccess ID.</p> 
<ul class="bulleted"> 
  <li>Option1 &ndash; Network Connect:
    <ul> 
      <li>Click start next to Network Connect on right of the browser window. </li> 
      <li>Once connected, you may use multiple browser windows and client applications as necessary. </li> 
      <li>Pop-up blockers may interfere with this method of connection. </li> 
    </ul> 
  </li> 
  <li>Option 2 &ndash; Web VPN:
    <ul> 
      <li>Choose UCSF Library link on left of the browser window. </li> 
      <li>Proceed to the online materials.</li> 
      <li>You must stay within the same browser window when using this link. </li> 
    </ul> 
  </li> 
</ul> 
</div> 
<div> 
<h4>iOS Mobile Devices (iPad, iPhone, iPod Touch)</h4> 
<p>Go to the <a rel="external" href="http://it.ucsf.edu/services/ios-vpn" target="_blank">VPN for iOS</a> page and read instructions for setting up your device.</p> 
<ul class="bulleted"> 
  <li>View the instructions page on your mobile device and click link to install profile at bottom of page.</li> 
  <li>When prompted, enter your MyAccess credentials and device PIN</li> 
  <li>To use VPN, go to your device settings and activate VPN. De-activate when not needed.</li> 
</ul> 
</div> 
<div> 
<h4>Other Mobile Devices</h4> 
<p>Go to the <a rel="external" href="https://vpn.ucsf.edu/dana-na/auth/url_default/welcome.cgi">VPN page</a> and log in with your MyAccess ID. </p> 
<ul class="bulleted"> 
  <li>Option1 &ndash; Browse:
    <ul> 
      <li>Enter a web address in upper right and click Browse button.</li> 
      <li>You must stay within the same browser window when using this link. </li> 
    </ul> 
  </li> 
  <li>Option 2 &ndash; Web VPN:
    <ul> 
      <li>Choose UCSF Library link on left of the browser window. </li> 
      <li>Proceed to the online materials.</li> 
      <li class="content-last">You must stay within the same browser window when using this link. </li> 
    </ul> 
  </li> 
</ul> 
</div> 
</div>
<div class="menu">
<h2>Help</h2> 
<ol> 
  <li><a href="https://myaccess.ucsf.edu/eai/UCAlias/jsp/home.jsp" rel="external">MyAccess Accounts</a></li> 
  <li><a href="https://myaccess.ucsf.edu/eai/UCAlias/jsp/newuser.jsp" rel="external">Request VPN/MyAccess</a></li> 
  <li><a href="http://it.ucsf.edu/services/vpn/web-proxy-access" rel="external">Web VPN Tips</a></li> 
  <li class="menu-last"><a href="mailto:LibraryHelp@ucsf.edu">Contact the Tech Commons Staff</a></li> 
</ol> 
</div> 
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>