<?php
require_once(dirname(dirname(__FILE__)) . '/assets/lib/decorator.class.php');
require_once(dirname(dirname(__FILE__)) . '/assets/config.php');
echo HTML_Decorator::html_start()->render();

echo Site_Decorator::head()
        ->set_title(Config::get('global', 'title_text') . " | Research Profile")
        ->add_js_handler_library('full','/research/js/profile.js')
        ->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('Research Profile')
        ->render();
?>
<div class="menu padded detailed" id="ctsi-menu">
    <h1 class="menu-first" id="ctsi-header"></h1>
    <ol id="ctsi-items"></ol>
</div>
<div style="display:none" id="ctsi-narrative-hidden"></div>

<div class="content padded" id="ctsi-keywords"></div>
<div class="menu padded detailed" id="ctsi-publications"></div>
<div class="menu padded"><ol id="ctsi-full-profile"></ol></div>

<?php
echo Site_Decorator::ucsf_footer()->render();
?><script>mwf.ucsfCtsiProfile.getProfile("<?php echo filter_var($_GET['fno'],FILTER_SANITIZE_EMAIL); ?>");</script><?php
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>