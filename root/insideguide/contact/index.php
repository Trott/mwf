<?php
require_once(dirname(dirname(dirname(__FILE__))) . '/assets/config.php');
require_once(dirname(dirname(dirname(__FILE__))) . '/assets/lib/user_agent.class.php');
require_once(dirname(dirname(dirname(__FILE__))) . '/assets/lib/decorator.class.php');

echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . ' | Inside Guide')->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/insideguide">Inside Guide</a>')->render();
?>
<div class="menu-full menu-detailed menu-padded">
    <h1 class="light menu-first">Contact Us</h1>

    <ol>
        <li><a href="tel:+14153490990">Call or text (415) 349-0990</a></li> 
        <li class="menu-last"><a href="mailto:insideline@ucsf.edu">Email insideline@ucsf.edu</a></li> 
    </ol>
</div>
<a href="javascript:history.back()" id="button-top" class="button-full button-padded">Back</a>    
<?php
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();

echo HTML_Decorator::html_end()->render();
?>