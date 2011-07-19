<?php
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library | Parnassus Service Areas")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header("Library")
        ->render();
?>
<div class="content-full content-padded"> 
<h1 class="content-first">Parnassus Service Areas</h1> 
 
<div> 
<ul class="bulleted"> 
<li>Archives - floor 5</li> 
<li>Check out a book - floor 3</li> 
<li>Circulation - floor 3</li> 
<li>Computer lab - floor 2</li> 
<li>Copy Services/Cashier - floor 3</li> 
<li>Group study rooms - floor 3</li> 
<li>Information - floor 3</li> 
<li>Loaner laptops - floor 3</li> 
<li>Research help - floor 3</li> 
<li>Reserves - floor 3</li> 
<li>Service Desk - floor 3</li> 
<li>Special Collections - floor 5</li> 
<li>Tech Commons - floor 2</li> 
<li class="content-last">Tech help - floor 2</li> 
</ul> 
</div> 
</div> 
<a href="javascript:history.back()" id="button-top" class="button-full button-padded">Back</a> 
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?> 