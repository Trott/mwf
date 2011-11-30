<?php
require_once(dirname(dirname(__FILE__)).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(__FILE__)).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/library">Library</a>')
        ->render();
?>
<div class="menu-full menu-detailed menu-padded"> 
 
         <ol> 
            <li class="menu-first"><a href="locations">Hours and Locations</a></li>
            <li><a href="http://ucsf.worldcat.org/m"><span class="external">Find Books and Journals</span></a></li>
            <li><a href="http://guides.library.ucsf.edu/content.php?pid=252446&sid=2084303"><span class="external">Mobile Resources</span></a></li>
            <li><a href="help/">Get Help</li></a>
            <li><a href="/news/library">News</a></li>
            <li class="menu-last"><a href="http://library.ucsf.edu/?ovrrdr=1"><span class="external">Full Library Site</span></a></li>
         </ol> 
    </div> 
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>
