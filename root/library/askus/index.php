<?php
require_once(dirname(dirname(dirname(__FILE__))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(__FILE__))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library | Mobile Resources")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/library">Library</a>')
        ->render();
?>
<div class="content-full content-padded">
<h1 class="content-first">Ask Us</h1>

<div>
    Phone:<br/>
    <a href="tel:+14154762337">(415) 476-2337</a> Parnassus <br />
    <a href="tel:+14155144060">(415) 514-4060</a> Mission Bay<br/>
    <br/>
    <a href="mailto:LibraryHelp@ucsf.edu">Email</a><br/>
    <a href="mailto:LibraryHelp@ucsf.edu">Arrange a research consultation</a>
</div>
</div>
<a href="javascript:history.back()" id="button-top" class="button-full button-padded">Back</a>
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>