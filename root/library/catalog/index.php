<?php
require_once(dirname(dirname(dirname(__FILE__))).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(dirname(__FILE__))).'/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Library | Mobile Resources")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/library">Library</a>')
        ->render();
?>
<form class="form-full form-padded" method="get" action="http://ucsf.worldcat.org/m/advancedsearch"> 
<h1 class="form-first">Library Catalog</h1> 
<input type="hidden" name="os" value="" /> 
<input type="hidden" name="on" value="" /> 
<input type="hidden" name="site" value="ucsf.worldcat.org" /> 
 
<label for="value1">Search Term</label> 
<input class="align-left" id="value1" type="text" name="value1" /> 
<label for="index1">Search By</label> 
<select id="index1" name="index1"> 
<option value="kw">Keyword</option> 
<option value="au">Author</option> 
<option value="ti">Title</option> 
<option value="su">Subject</option> 
<option value="bn">ISBN</option> 
</select> 
 
<input type="hidden" name="index2" value="ti"/> 
<input type="hidden" name="value2" value=""/> 
<input type="hidden" name="index3" value="au"/> 
<input type="hidden" name="value3" value=""/> 
 
<label for="relevancy">Sort By</label> 
<select id="relevancy" name="relevancy"> 
<option value="">Relevance</option> 
<option value="author">Author</option> 
<option value="title">Title</option> 
<option value="year">Publication Date</option> 
</select> 
 
<input class="large_submit" type="submit" value="Search" /> 
 
<p class="center form-last">Search powered by <img src="../img/worldcat_small.jpeg"  alt=""  title="WorldCat Mobile" /></p> 
 
</form>
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>