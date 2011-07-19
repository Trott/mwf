<?php require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library | Parnassus Floor 3")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header("Library")
        ->render();
?>
<div class="content-full">
<h1 class="content-first">Parnassus Floor 3</h1>


<div>
<p><img src="../../../img/maps/3.gif" alt="" style="max-width: 100%"/></p>
<?php include(dirname(dirname(__FILE__)).'/map_key.html'); ?>
</div>

<div>
<span class="smallprint"> 
Service Desk: A<br/> 
Copy Services/Cashier: H<br/> 
Current Journals: C<br/> 
Reserves<br/> 
Hearst Reading Room<br/> 
Group Study Rooms<br/> 
</span>
</div>
</div>
<a href="javascript:history.back()" id="button-top" class="button-full button-padded">Back</a>
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>