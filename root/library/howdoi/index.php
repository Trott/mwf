<?php
require_once(dirname(dirname(dirname(__FILE__))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(__FILE__))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library | How Do I?")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/library">Library</a>')
        ->render();
?>
<div class="menu padded detailed"> 
<h1 class="menu-first">How Do I?</h1> 
<ol> 
 <li><a href="/library/howdoi/remoteaccess">Get Network Access</a></li> 
 <li><a href="/library/howdoi/wifi">Use WiFi</a></li> 
 <li><a href="/library/howdoi/print">Print and Copy</a></li> 
 <li><a href="/library/howdoi/renew">Renew Books</a></li>
 <li class="menu-last"><a rel="external" href="http://tiny.ucsf.edu/reserve">Reserve a Study Room</a></li>
</ol> 
</div> 
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>