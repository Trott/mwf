<?php
require_once(dirname(__FILE__) . '/../assets/config.php');
require_once(dirname(__FILE__) . '/../assets/lib/decorator.class.php');
require_once(dirname(__FILE__) . '/../assets/lib/classification.class.php');

echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . ' | Maps')->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/maps">Maps</a>');
?>
<div class="menu-full menu-detailed menu-padded">
    <ol>
        <?php if (Classification::is_standard()): ?>
            <li class="menu-first"><a href="campus.php?campus=Parnassus">Parnassus</a></li>
            <li><a href="campus.php?campus=Mission+Bay">Mission Bay</a></li>
            <li class="menu-last"><a href="locations.php">Location List</a></li>
        <?php else: ?>
            <li class="menu-first"><a href="http://www.ucsf.edu/sites/default/files/documents/ucsf_parnassus_1.pdf"><span class="external">Parnassus <span class="smallprint light">PDF</span></span></a></li>
            <li class="menu-last"><a href="http://www.ucsf.edu/sites/default/files/documents/ucsf-mission-bay-8-16.pdf"><span class="external">Mission Bay <span class="smallprint light">PDF</span></span></a></li>
        <?php endif; ?>
    </ol>
</div>

<a href="javascript:history.back()" id="button-top" class="button-full button-padded">Back</a>
<?php
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>