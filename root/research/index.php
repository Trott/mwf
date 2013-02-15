<?php
require_once(dirname(dirname(__FILE__)) . '/assets/lib/decorator.class.php');
echo HTML_Decorator::html_start()->render();

echo Site_Decorator::head()
        ->set_title('UCSF Mobile' . " | Research Profile")
        ->add_inner_tag('script','',array('src'=>'/research/js/profile.js'))
        ->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('Research Profile')
        ->render();
?>
<div class="menu detailed" id="ctsi-menu">
    <h1 id="ctsi-header"></h1>
</div>
<div style="display:none" id="ctsi-narrative-hidden"></div>

<div class="content" id="ctsi-keywords"></div>
<div class="menu detailed" id="ctsi-publications"></div>
<div class="menu"><ol id="ctsi-full-profile"></ol></div>

<?php
echo Site_Decorator::ucsf_footer()->render();
?>
<script src="http://profiles.ucsf.edu/CustomAPI/v1/JSONProfile.aspx?FNO=<?php 
	echo filter_var($_GET['fno'],FILTER_SANITIZE_EMAIL); 
	?>&amp;callback=ucsf.ctsiProfile.renderProfile&amp;publications=full&amp;mobile=on"></script>
	