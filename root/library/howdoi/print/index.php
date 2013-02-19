<?php
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/lib/decorator.class.php');
?><!DOCYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>UCSF Mobile | Library | Print and Copy</title>
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
<h1 class="content-first">Print and Copy</h1>

<div>
<h4>Printing</h4>

<p>Printing is available for a fee from library workstations.</p>

<p>You will need a <a rel="external" href="https://www.ckm.ucsf.edu/account/">GALEN Account</a>, with money added to your account.</p>

<p>Price per printed side, B/W: $0.14</p>

<p>Locations (some are UCSF-only):</p>
<ul class="bulleted">
<li>Parnassus Library (and loaner laptops)</li>
<li>Mission Bay Library</li> 
<li>Medical Sciences Tech Commons (S-165)</li>
<li>Medical Student Lounge (S-245) - SOM students only</li>
<li>Nursing Building (N-735)</li>
</ul>

<p>Color printing is available in the Tech Commons (CL-240): $0.30 per printed side.</p>
</div>

<div>
<h4>Copying</h4>

<p>Self-service copiers are available throughout the Parnassus Library and at the Mission Bay Library.</p>

<p>All copiers use debit cards. Buy a card from the Cashier's Window (Parnassus 3rd floor) or a vending machine.</p>

<p>Price per copy: $0.14</p>
</div>

<div>
<h4>More Information</h4>
<p>Printing: <a href="tel:+14154764309">(415) 476-4309</a><br/>
Copying: <a href="tel:+14154768128">(415) 476-8128</a></p>
</div>

</div>
<?php 
?><footer id="footer"><p>University of California &copy; 2010-13 UC Regents<br><a href="/about">About</a> | <a href="/feedback/">Feedback</a></p></footer><?php echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>