<?php
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library | Renew Books")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/library">Library</a>')
        ->render();
?>
<div class="content-full content-padded">
<h1 class="content-first">Renew Books</h1>

<div>
<h4>Online</h4>
<p><a class="external" href="http://ucsfcat.ucsf.edu/patroninfo/">Log in to the Library Catalog</a> to renew books.</p>
</div>

<div>
<h4>By Phone</h4>
<p>Call the Service Desk at <a href="tel:+14154762336">(415) 476-2336</a>.</p>
</div>
</div>

<a href="javascript:history.back()" id="button-top" class="button-full button-padded">Back</a>
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>