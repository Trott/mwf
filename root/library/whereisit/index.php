<?php
require_once(dirname(dirname(dirname(__FILE__))).'/assets/lib/decorator.class.php');
echo HTML_Decorator::html_start()->render();
?>
<head>
    <meta charset="utf-8">
    <title>UCSF Mobile | Library | Where Is It?</title>
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
echo Site_Decorator::ucsf_header(HTML_Decorator::tag('a','Library',array('href'=>'/library')))
        ->render();
?>
<div class="menu padded detailed">
<h1 class="menu-first">Where Is It?</h1>
<ol>
 <li><a href="maps">Parnassus Library Floor Maps</a></li>
 <li><a href="services">Service Areas</a></li>
 <li><a href="computers">Computers</a></li>
 <li class="menu-last"><a href="studyspace">Study Spaces</a></li>
</ol>
</div>

<?php 
?><footer id="footer"><p>University of California &copy; 2010-13 UC Regents<br><a href="/about">About</a> | <a href="/feedback/">Feedback</a></p></footer><?php echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>