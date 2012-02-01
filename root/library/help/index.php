<?php
require_once(dirname(dirname(dirname(__FILE__))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(__FILE__))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/library">Library</a>')
        ->render();
?>
<div class="menu detailed padded"> 
 <h1 class="menu-first">Help</h1>
         <ol> 
            <li><a href="/library/askus/">Ask Us</a></li>
            <li><a rel="external" href="http://guides.library.ucsf.edu/index.php">Getting Started Guides</a></li>
            <li><a href="/library/howdoi">How Do I?</a></li>
            <li><a href="/library/whereisit">Where Is It?</a></li>
         </ol> 
    </div> 
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>
