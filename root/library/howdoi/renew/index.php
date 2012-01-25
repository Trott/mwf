<?php
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library | Renew Books")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/library">Library</a>')
        ->render();
?>
<div class="menu padded detailed">
<h1 class="menu-first">Renew Books</h1>

<ol>
<li><a rel="external" href="http://ucsfcat.ucsf.edu/patroninfo/">Online: 
<span class="smallprint">Log in to the Library Catalog</span>
</a></li>
<li class="menu-last"><a href="tel:+14154762336">Phone: (415) 476-2336</a></li>
</ol>
</div>

<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>