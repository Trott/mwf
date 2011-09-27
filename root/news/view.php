<?php
require_once(dirname(dirname(__FILE__)).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(__FILE__)).'/assets/config.php');
require_once(dirname(dirname(dirname(__FILE__))).'/auxiliary/feed/feed.class.php');
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

$rss = new Feed($feed['name'],$feed['url']);

if(! $rss)
    header('Location: index.php');

$id = false;
$items = $rss->get_items();
$item = false;
for($i=0; $i < count($items) && $id != $_GET['id']; $i++) {
	$item = $items[$i];
	$id = md5($item->get_link());
}

if(! $item)
    header('Location: index.php');

$date_format = array_key_exists('date_format',$feed) ? $feed['date_format'] : '';
date_default_timezone_set('America/Los_Angeles');
$date = empty($date_format) ? $item->get_date() : $item->get_date($date_format);
$description = $item->get_description();
if (array_key_exists('allowed_tags',$feed)) {
    $glue = count($feed['allowed_tags'])>0 ? '<'.implode('><',$feed['allowed_tags']).'>' : '';
    $description = strip_tags($description,$glue);
}

echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | " . strip_tags($header_title))->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header($header_title)
        ->render();
?>

<div class="content-full content-padded"><?php if($id != $_GET['id'] || empty($description)): ?>
<h1 class="content-first light">Error Encountered</h1>
<div class="content-last">
<p>An error was encountered while trying to fetch the requested news
entry. Please go back to the articles list and try again.</p>
</div>

<?php else: ?>
<h1 class="content-first align-left light"><?php echo $item->get_title(); ?></h1>
<div class="content">
<p><?php echo $date; ?></p>
<?php echo $description; ?>
<p>

</div>

<div class="content-last">
<p class="center"><a href="<?php echo $item->get_link(); ?>">View article on
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