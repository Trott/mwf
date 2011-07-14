<?php
require_once(dirname(__FILE__).'/../assets/config.php');
require_once(dirname(__FILE__).'/../assets/lib/user_agent.class.php');
require_once(dirname(__FILE__).'/../assets/lib/decorator.class.php');

echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . ' | Emergency')->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('Emergency');

?>
<div class="menu-full menu-detailed menu-padded">
<ol>
<li class="menu-first"><a href="tel:+911">911 <span class="smallprint">for emergencies only</span></a></li> 
<li><a href="tel:+14154761414">UCSF Police Non-Emergency<br/><span class="smallprint">(415) 476-1414</span></a></li> 
<li><a href="tel:+14158857890">UCSF Medical Center Security<br/><span class="smallprint">(415) 885-7890</span></a></li> 
<li><a href="tel:+14155024000">Campus Emergency Information Hotline<br/><span class="smallprint">(415) 502-4000</span></a></li> 
<li><a href="tel:+18008738232">Back-up Campus Emergency Hotline<br/><span class="smallprint">1 (800) 873-8232</span></a></li> 
<li class="menu-last"><a href="tel:+14158857828">UCSF Medical Center Information Hotline<br/><span class="smallprint">(415) 885-7828</span></a></li> 
</ol>
</div>
<a href="javascript:history.back()" id="button-top" class="button-full button-padded">Back</a>    
<?php echo Site_Decorator::ucsf_footer()->render(); 
echo HTML_Decorator::body_end()->render();

echo HTML_Decorator::html_end()->render();
?>