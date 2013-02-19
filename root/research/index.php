<?php
require_once(dirname(dirname(__FILE__)) . '/assets/lib/decorator.class.php');
?><!DOCYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>UCSF Mobile | Research Profile</title>
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
    <script src="/research/js/profile.js"></script>
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
    <span>Research Profile</span>
</header>

<div class="menu detailed" id="ctsi-menu">
    <h1 id="ctsi-header"></h1>
</div>
<div style="display:none" id="ctsi-narrative-hidden"></div>

<div class="content" id="ctsi-keywords"></div>
<div class="menu detailed" id="ctsi-publications"></div>
<div class="menu"><ol id="ctsi-full-profile"></ol></div>

<?php
?><footer id="footer"><p>University of California &copy; 2010-13 UC Regents<br><a href="/about">About</a> | <a href="/feedback/">Feedback</a></p></footer>
<script src="http://profiles.ucsf.edu/CustomAPI/v1/JSONProfile.aspx?FNO=<?php 
	echo filter_var($_GET['fno'],FILTER_SANITIZE_EMAIL); 
	?>&amp;callback=ucsf.ctsiProfile.renderProfile&amp;publications=full&amp;mobile=on"></script>
	