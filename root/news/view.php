<?php
define('MAGPIE_CACHE_DIR','/var/mobile/cache/magpierss');
require_once(dirname(dirname(__FILE__)).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(__FILE__)).'/assets/config.php');
require_once(dirname(dirname(dirname(__FILE__))).'/auxiliary/feed/magpierss/rss_fetch.inc');
require_once(dirname(dirname(dirname(__FILE__))).'/auxiliary/feed/htmlpurifier/HTMLPurifier.includes.php');
$feeds = array_merge(Config::get('ucsf_news','feeds'),Config::get('ucsf_news','alternate_feeds'));
$header_title = '<a href="/news">News</a>';
$header_feed = '';

if (array_key_exists('feed',$_GET) && array_key_exists($_GET['feed'],$feeds)) {
	$feed = $feeds[$_GET['feed']];
	$feed_code = $_GET['feed'];
	if (array_key_exists('header_title', $feed) && !empty($feed['header_title'])) {
		$header_title = $feed['header_title'];
		$header_feed = $feed_code;
	}
} else {
	$feed = array_shift($feeds);
	$feed_code='';
}

$purifier = HTMLPurifier::getInstance();

function handle_error($errno, $errstr) { if($errno == E_USER_WARNING){ throw new ErrorException($errstr, $errno); } }
set_error_handler('handle_error');

$fetch_error = false;
define('MAGPIE_OUTPUT_ENCODING', 'UTF-8');
try{ $rss = fetch_rss($feed['url']); }
catch (ErrorException $e) { $fetch_error = true; }

restore_error_handler();

if($fetch_error === true)
header('Location: index.php');

$id = false;
for($i=0; $i < count($rss->items) && $id != $_GET['id']; $i++) {
	$item = $rss->items[$i];
	$id = md5($item['link']);
}

$date_format = array_key_exists('date_format',$feed) ? $feed['date_format'] : 'F j, Y';
$allowed_tags = array_key_exists('allowed_tags',$feed) ? $feed['allowed_tags'] : array('b', 'i', 'p', 'a', 'em', 'strong','img');

date_default_timezone_set('America/Los_Angeles');
if (array_key_exists('date_timestamp',$item)) {
	$item['date'] = date($date_format, $item['date_timestamp']);
} else if (array_key_exists('dc',$item) && array_key_exists('date',$item['dc'])) {
	$item['date'] = date($date_format,parse_w3cdtf($item['dc']['date']));
} else {
	$item['date']='';
}

echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | $header_title")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header($header_title)
        ->render();
?>

<div class="content-full content-padded"><?php if($id != $_GET['id'] || !isset($item['description'])): ?>
<h1 class="content-first light">Error Encountered</h1>
<div class="content-last">
<p>An error was encountered while trying to fetch the requested news
entry. Please go back to the articles list and try again.</p>
</div>

<?php else: ?>
<h1 class="content-first align-left light"><?php echo $item['title']; ?></h1>
<div class="content">
<p><?php echo $item['date']; ?></p>
<?php $allowed_tags ?> <?php echo $purifier->purify($item['description'], HTMLPurifier_Config::create(array('HTML.AllowedElements' => $allowed_tags))); ?>
<p>

</div>

<div class="content-last">
<p class="center"><a href="<?php echo $item['link']; ?>">View article on
full site</a></p>
</div>

<?php endif; ?></div>

<a href="javascript:history.back()" id="button-top"
	class="button-full button-padded">Back</a>
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>
