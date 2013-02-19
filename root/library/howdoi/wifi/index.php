<?php
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/lib/decorator.class.php');
?><!DOCYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>UCSF Mobile | Library | Use WiFi</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css" media="screen">
    <noscript><style>.jsonly{display:none}</style></noscript>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <script>
            window.onload = function () {
                var deferred = document.createElement('script');
                deferred.src = '/assets/js/ucsf.js';
                document.body.appendChild(deferred);
            }
    </script>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/apple-touch-icon-precomposed.png">
</head>
<?php
echo HTML_Decorator::body_start()->render();
?>
<header class="header" id="header">
    <a href="/"><img src="/assets/img/ucsf-logo.png" alt="UCSF"><span>Mobile</span></a>
    <img src="/assets/img/ucsf-header-separator.png" alt=" | " class="separator">
    <span><a href="/library">Library</a></span>
</header>
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
?><footer id="footer"><p>University of California &copy; 2010-13 UC Regents<br><a href="/about">About</a> | <a href="/feedback/">Feedback</a></p></footer><?php echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>