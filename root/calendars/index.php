<?php
require_once(dirname(dirname(__FILE__)) . '/assets/lib/decorator.class.php');
require_once(dirname(dirname(__FILE__)) . '/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Calendars")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/calendars">Calendars</a>')
        ->render();
?>
<div class="menu-full menu-detailed menu-padded"> 
    <ol> 
        <li class="menu-first"><a href="/news/?feed=ucsfevents">UCSF Events</a></li>
        <li><a href="/news/?feed=academicevents">Featured Academic Events</a></li>
        <li class="menu-last"><a href="http://www.ucsf.edu/about/ucsf-calendars?ovrrdr=1"><span class="external">UCSF Calendars Website</span></a></li>
    </ol> 
</div> 

<a href="javascript:history.back()" id="button-top" class="button-full button-padded">Back</a> 
<?php
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>
