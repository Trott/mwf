<?php
require_once(dirname(dirname(dirname(__FILE__))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(__FILE__))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library | Where Is It?")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/library">Library</a>')
        ->render();
?>
<div class="menu-full menu-padded menu-detailed">
<h1 class="menu-first">Where Is It?</h1>
<ol>
 <li><a href="maps">Parnassus Library Floor Maps</a></li>
 <li><a href="services">Service Areas</a></li>
 <li><a href="computers">Computers</a></li>
 <li class="menu-last"><a href="studyspace">Study Spaces</a></li>
</ol>
</div>

<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>