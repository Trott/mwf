<?php
require_once(dirname(__FILE__).'/../assets/config.php');
require_once(dirname(__FILE__).'/../assets/lib/decorator.class.php');

echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . ' | Maps')->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('Maps');?>
    <div class="menu-full menu-detailed menu-padded">
         <ol>
             <li class="menu-first"><a href="campus.php?campus=Parnassus">Parnassus</a></li>       
             <li><a href="campus.php?campus=Mission+Bay">Mission Bay</a></li>
             <li class="menu-last"><a href="locations.php">Location List</a> 
        </ol>
    </div>

        <a href="javascript:history.back()" id="button-top" class="button-full button-padded">Back</a>
<?php echo Site_Decorator::ucsf_footer()->render(); 
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>