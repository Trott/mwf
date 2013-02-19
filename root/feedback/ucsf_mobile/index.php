<?php
require_once(dirname(dirname(__DIR__)).'/assets/lib/decorator.class.php');
?><!DOCYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>UCSF Mobile | Feedback</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/main.css" media="screen">
    <noscript><style>.jsonly{display:none}</style></noscript>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <script>
            window.onload = function () {
                var deferred = document.createElement('script');
                deferred.src = '/assets/js/ucsf.js';
                document.body.appendChild(deferred);
            }
    </script>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/apple-touch-icon-precomposed.png">
</head>
<?php
echo HTML_Decorator::body_start()->render();
?>
<header class="header" id="header">
    <a href="/"><img src="/assets/img/ucsf-logo.png" alt="UCSF"><span>Mobile</span></a>
    <img src="/assets/img/ucsf-header-separator.png" alt=" | " class="separator">
    <span>Feedback</span>
</header>
<?php
if (empty($_POST['Field1'])) {
	?>  
<form class="form" method="post" action="">
<h2>UCSF Mobile Feedback</h2>
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

<input id="saveForm" name="saveForm" type="submit" value="Submit Feedback" />
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
<div class="content"> 
    <p>Thank you for your feedback on UCSF Mobile!</p>
</div>

<div class="content"><a class="button" href="/">Continue</a></div>


<?php 
}
?><footer id="footer"><p>University of California &copy; 2010-13 UC Regents<br><a href="/about">About</a> | <a href="/feedback/">Feedback</a></p></footer><?php echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>