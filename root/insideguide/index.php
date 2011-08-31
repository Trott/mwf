<?php
require_once(dirname(dirname(__FILE__)) . '/assets/lib/decorator.class.php');
require_once(dirname(dirname(__FILE__)) . '/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Inside Guide")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/insideguide">Inside Guide</a>')
        ->render();
?>
<div class="menu-full menu-detailed menu-padded"> 
    <h1 class="light menu-first">Student Inside Guide</h1>

    <ol> 
        <li><a href="find">Find Your School</a></li>
        <li><a href="/news/insideguide">Events</a></li>
        <li class="menu-last"><a href="contact">Contact Us</a></li>
    </ol> 
</div> 

<a href="javascript:history.back()" id="button-top" class="button-full button-padded">Back</a> 
<?php
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>
