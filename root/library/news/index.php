<?php

require_once(dirname(dirname(__DIR__)) . '/assets/lib/decorator.class.php');

echo HTML_Decorator::html_start()->render();
?>
<head>
    <meta charset="utf-8">
    <title>UCSF Mobile</title>
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
echo Site_Decorator::ucsf_header()->render();
?>
<noscript><div class="content center" ' . $this->_style . '><p>JavaScript is required to load this content.</p></div></noscript>
<div class="jsonly">
<section id="library-news" class="center"><progress>Loading...</progress></section>
<script type="text/javascript">
	var _newsq = _newsq || [];
    function loadSection() {
        _newsq.push(["library-news","feed_library_news","http://www.library.ucsf.edu/news/all/feed"]);
    }   
    loadSection();window.onhashchange=loadSection;
</script>
<?php
?><footer id="footer"><p>University of California &copy; 2010-13 UC Regents<br><a href="/about">About</a> | <a href="/feedback/">Feedback</a></p></footer><?php echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();