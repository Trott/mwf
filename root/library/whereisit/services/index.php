<?php
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/lib/decorator.class.php');
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>UCSF Mobile | Library | Parnassus Service Areas</title>
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
<div class="content padded"> 
<h1 class="content-first">Parnassus Service Areas</h1> 
 
<div> 
<ul class="bulleted"> 
<li>Archives - floor 5</li> 
<li>Check out a book - floor 3</li> 
<li>Circulation - floor 3</li> 
<li>Computer lab - floor 2</li> 
<li>Copy Services/Cashier - floor 3</li> 
<li>Group study rooms - floor 3</li> 
<li>Information - floor 3</li> 
<li>Loaner laptops - floor 3</li> 
<li>Research help - floor 3</li> 
<li>Reserves - floor 3</li> 
<li>Service Desk - floor 3</li> 
<li>Special Collections - floor 5</li> 
<li>Tech Commons - floor 2</li> 
<li class="content-last">Tech help - floor 2</li> 
</ul> 
</div> 
</div> 
<?php 
?><footer id="footer"><p>University of California &copy; 2010-13 UC Regents<br><a href="/about">About</a> | <a href="/feedback/">Feedback</a></p></footer><?php echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?> 