<?php
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(dirname(__FILE__)))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library | Print and Copy")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/library">Library</a>')
        ->render();
?>
<div class="content-full content-padded">
<h1 class="content-first">Print and Copy</h1>

<div>
<h4>Printing</h4>

<p>Printing is available for a fee from library workstations and loaner laptops.</p>

<p>You will need a <a class="external" href="https://www.ckm.ucsf.edu/account/">GALEN Account</a>, with money added to your account.</p>

<p>Price per printed side, B/W: $0.14</p>

<p>Locations (some are UCSF-only):</p>
<ul class="bulleted">
<li>Parnassus Library (and loaner laptops)</li>
<li>Mission Bay Library</li> 
<li>Medical Sciences Tech Commons (S-165)</li>
<li>Mission Bay Genentech Hall study space (GH-227)</li> 
<li>Medical Student Lounge (S-245) - SOM students only</li>
<li>Nursing Building (N-735)</li>
</ul>

<p>Color printing is available in the Tech Commons (CL-506): $0.30 per printed side.</p>
</div>

<div>
<h4>Copying</h4>

<p>Self-service copiers are available throughout the Parnassus Library and at the Mission Bay Library.</p>

<p>All copiers use debit cards. Buy a card from the Cashier's Window (Parnassus 3rd floor) or a vending machine.</p>

<p>Price per copy: $0.14</p>
</div>

<div>
<h4>More Information</h4>
<p>Printing: <a href="tel:+14154764309">(415) 476-4309</a><br/>
Copying: <a href="tel:+14154768128">(415) 476-8128</a></p>
</div>

</div>
<a href="javascript:history.back()" id="button-top" class="button-full button-padded">Back</a>
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>