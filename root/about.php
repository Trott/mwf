<?php
require_once(__DIR__ . '/assets/lib/decorator.class.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>UCSF Mobile | About</title>
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
    <span>About</span>
</header>
<?php
//Decorator doesn't yet handle unordered lists, too tedious to use HTML_Decorator::tag, so they're hardcoded for now.
echo Site_Decorator::content()
        ->set_padded()
        ->add_header('About UCSF Mobile')
        ->add_section(array('UCSF Mobile is a joint project of:', 
            HTML_Decorator::tag('ul', array(
                HTML_Decorator::tag('li', 'Information Technology Services'),
                HTML_Decorator::tag('li', 'Library & Center for Knowledge Management'),
                HTML_Decorator::tag('li', 'University Relations')),
                    array('class'=>'bulleted')),
            'In collaboration with:',
            HTML_Decorator::tag('ul', array(
                HTML_Decorator::tag('li', 'Transportation Services (Shuttle)'),
                HTML_Decorator::tag('li', 'Campus Life Services (Fitness)'),
                HTML_Decorator::tag('li', 'Campus Planning (Maps)')),
                    array('class'=>'bulleted'))
            ))
        ->add_section(array('The UCSF Mobile website is powered by the ',
                HTML_Decorator::tag('a', 'Mobile Web Framework', array('href' => 'http://mwf.ucla.edu')), 
            '.'))
        ->render();

?><footer id="footer"><p>University of California &copy; 2010-13 UC Regents<br><a href="/about">About</a> | <a href="/feedback/">Feedback</a></p></footer><?php echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>