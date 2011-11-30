<?php
require_once(dirname(dirname(dirname(__FILE__))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(__FILE__))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library | Mobile Resources")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/library">Library</a>')
        ->render();
?>
<div class="menu-full menu-detailed menu-padded">
<h1 class="menu-first">Ask Us</h1>

<ol>
    <li><a href="tel:+14154762337">(415) 476-2337<br/><span class="smallprint">Parnassus</span></a></li>
    <li><a href="tel:+14155144060">(415) 514-4060<br/><span class="smallprint">Mission Bay</span></a></li>
    <li><a href="mailto:LibraryHelp@ucsf.edu">Email</a></li>
    <li><a href="mailto:LibraryHelp@ucsf.edu">Arrange a research consultation</a></li>
</ol>
</div>
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>