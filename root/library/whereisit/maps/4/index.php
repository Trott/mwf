<?php require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(dirname(dirname(__FILE__))))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library | Parnassus Floor 4")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/library">Library</a>')
        ->render();
?>
<div class="content-full">
<h1 class="content-first">Parnassus Floor 4</h1>


<div>
<p><img src="../../../img/maps/4.gif" alt="" style="max-width: 100%"/></p>
<?php include(dirname(dirname(__FILE__)).'/map_key.html'); ?>
</div>

<div>
<span class="smallprint"> 
Books, Q-Z: A, B<br/> 
Group Study Rooms
</span>
</div>
</div>
<a href="javascript:history.back()" id="button-top" class="button-full button-padded">Back</a>
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>