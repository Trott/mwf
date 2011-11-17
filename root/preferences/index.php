<?php
require_once(dirname(dirname(__FILE__)) . '/assets/lib/decorator.class.php');
require_once(dirname(dirname(__FILE__)) . '/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()
        ->add_js_handler_library('standard_libs', 'preferences')
        ->set_title(Config::get('global', 'title_text') . " | Preferences")
        ->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header("Preferences")
        ->render();
?>
<noscript><div class="content-full content-padded"><p><b>Preferences are disabled on your device because it does not support JavaScript or has JavaScript disabled.</b></p></div></noscript>
<?php // @TODO: Move this JS in to Handler/Decorator? ?>
<script type="text/javascript">
    if (! mwf.standard.preferences.isSupported()) {
        document.write('<div class="content-full content-padded"><p><b>Preferences are not supported on your device.</b></p></div>');
    }
</script>
<form id="preferences_form" class="form-full form-padded" method="post" 
      action="" onsubmit="mwf.standard.preferences.set('main_menu_layout',document.getElementById('main_menu_layout').value); history.back(); return false">
    <h1 class="form-first">Preferences</h1>
    <label  id="main_menu_layout_label" for="main_menu_layout">Home Screen Layout:</label> 
    <select id="main_menu_layout" name="main_menu_layout" tabindex="1"> 
        <option id="main_menu_list" value="list">List</option>
        <option id="main_menu_grid" value="grid">Grid</option>
    </select>
    <input id="save_button" name="save_button" class="form-last" 
           type="submit" value="Save"/>

</form>
<a href="javascript:history.back()" id="button-top" class="button-full button-padded">Back</a>
<?php
echo Site_Decorator::ucsf_footer()->render();
?>
<script type="text/javascript">
    if (! mwf.standard.preferences.isSupported()) {
        document.getElementById('save_button').disabled="disabled";
    } else {
        var pref = mwf.standard.preferences.get('main_menu_layout');
        if (! pref) {
            pref = mwf.userAgent.isNative() ? "grid" : "list";
        }
        var selected = document.getElementById('main_menu_'+pref);
        if (selected != null) {
            selected.selected = 'selected';
        }
    }  
</script>
<?php
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>