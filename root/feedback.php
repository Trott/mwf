<?php
require_once(dirname(__FILE__).'/assets/lib/decorator.class.php');
require_once(dirname(__FILE__).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Feedback")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header("Feedback")
        ->render();
if (empty($_POST['Field1'])) {
	?>
<form class="form padded" method="post" action="">
<h1 class="form-first">Feedback</h1>
<label  id="title1" for="Field1">I am:</label> 
<select id="Field1" name="Field1" class="field select medium" onclick="handleInput(this);" onkeyup="handleInput(this);" tabindex="1" > 
<option value="Student" selected="selected">Student</option>
<option value="Faculty" >Faculty</option>
<option value="Staff" >Staff</option>
<option value="Other" >Other</option>
</select>
<label  id="title102" for="Field102">Did you find what you were looking for?</label>
<select id="Field102" name="Field102" class="field select medium" onclick="handleInput(this);" onkeyup="handleInput(this);" tabindex="2" > 
<option value="Yes" selected="selected">Yes</option>
<option value="No" >No</option>
</select>

<label id="title103" for="Field103">If "No", what where you looking for?</label>
<input id="Field103" name="Field103" type="text" class="field text medium" value="" maxlength="255" size="40" tabindex="3" onkeyup="handleInput(this); validateRange(103, 'character');" onchange="handleInput(this);" /><br />

<label id="title205" for="Field205">Comments/Suggestions?<br/><span class="smallprint">(Include email for a response!)</span></label>
<textarea id="Field205" name="Field205" class="field textarea medium" rows="10" cols="40" tabindex="8" onkeyup="handleInput(this); validateRange(205,'character');" onchange="handleInput(this);"></textarea><br />

<input id="saveForm" name="saveForm" class="form-last" type="submit" value="Submit Feedback" />
</form>
<script type="text/javascript"> 
__RULES = [];
</script> 
<script type="text/javascript" src="http://ucsflibrary.wufoo.com/scripts/public/dynamic.11751.js"></script>
<script type="text/javascript"> 
__EMBEDKEY = "false"
</script>
<?php
} else {
	$post_data = array( 'Field1' => $_POST['Field1'],
	                    'Field102' => $_POST['Field102'],
	                    'Field103' => $_POST['Field103'],
	                    'Field205' => $_POST['Field205'],
	                    'idstamp' => 'n96bihRmNHhAUDUxozFfcvIYwrRqlOnxWDSUR7zXGUY=');
    $url = 'http://ucsflibrary.wufoo.com/embed/z7x4a9/#public';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
    if (! curl_exec($curl)) {
    	//If curl didn't work, log via email to web team.
    	error_log("Feedback form submission for m.ucsf.edu failed.  Form data:\n" . print_r($post_data, TRUE), 3, 'LibraryWeb@ucsf.edu' );
    }
    curl_close($curl);
    ?>
<div class="content padded"> 
    <p class="content-first">Thank you for the feedback on UCSF Mobile!</p>
    <p class="content-last"><a href="/">Continue</a></p>
</div>
<?php 
}
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>