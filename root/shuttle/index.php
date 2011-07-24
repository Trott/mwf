<?php
require_once(dirname(dirname(__FILE__)).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(__FILE__)).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Shuttle")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/shuttle">Shuttle</a>')
        ->render();
?>
    <div class="menu-full menu-detailed menu-padded"> 
         <ol> 
            <li class="menu-first"><a href="planner">Trip Planner</a></li>
            <li><a href="list/color">Shuttles By Color</a></li>
            <li><a href="list/location">Shuttles By Location</a></li>
            <li><a href="http://campuslifeservices.ucsf.edu/transportation/shuttles/timetables/shuttlemap.pdf"><span class="external">System Map <span class="smallprint light">PDF</span></span></a></li>
            <li><a href="http://www.campuslifeservices.ucsf.edu/transportation/shuttles/timetables/pdf/ShuttleHolidaySchedule.pdf"><span class="external">Holiday Schedule <span class="smallprint light">PDF</span></span></a></li>
            <li class="menu-last"><a href="http://campuslifeservices.ucsf.edu/transportation/feedback/"><span class="external">Transportation Feedback</span></a></li>
        </ol> 
    </div> 
        <a href="javascript:history.back()" id="button-top" class="button-full button-padded">Back</a> 
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>
