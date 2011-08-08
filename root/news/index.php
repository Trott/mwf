<?php
require_once(dirname(dirname(__FILE__)).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(__FILE__)).'/assets/config.php');
require_once(dirname(dirname(dirname(__FILE__))).'/auxiliary/feed/feed.class.php');

$feeds = Config::get('ucsf_news','feeds');
$alt_feeds = Config::get('ucsf_news','alternate_feeds');
$all_feeds = array_merge($feeds, $alt_feeds);

$more = TRUE;
$item_limit = 4;
$header_title = '<a href="/news">News</a>';
$header_feed = '';

if (array_key_exists('feed',$_GET) && array_key_exists($_GET['feed'],$all_feeds)) {
    $feeds = array($_GET['feed']=>$all_feeds[$_GET['feed']]);
    if (array_key_exists('header_title', $feeds[$_GET['feed']]) && !empty($feeds[$_GET['feed']]['header_title'])) {
        $header_title = $feeds[$_GET['feed']]['header_title'];
        $header_feed = $_GET['feed'];
    } 
    $item_limit = PHP_INT_MAX;
    $more = FALSE;
}

$rss = array();
foreach ($feeds as $feed_code=>$feed_info) {
        $rss[$feed_code] = new Feed($feed_info['name'],$feed_info['url']);
}

$home_feed_code = '';

if (count($rss) == 1) {
    $home_feed_code = key($rss);
}

date_default_timezone_set('America/Los_Angeles');

echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | $header_title")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header($header_title)
        ->render();
         ?> 
        <?php foreach ($rss as $feed_code=>$feed):?>
        <?php $direct_link = array_key_exists('direct_link',$all_feeds[$feed_code]) ? $all_feeds[$feed_code]['direct_link'] : false; ?>
        <?php $date_format = array_key_exists('date_format',$all_feeds[$feed_code]) ? $all_feeds[$feed_code]['date_format'] : ''; ?>
        <div class="menu-full menu-detailed menu-padded">
             <h1 class="light menu-first"><?php echo htmlspecialchars($feeds[$feed_code]['name']); ?></h1>
             <ol>
                <?php $num_items_displayed = 0;
                      $class = $direct_link ? 'class="external"' : '';
                      $items=$feed->get_items();
                for($i=0; $i < count($items) && $num_items_displayed<$item_limit; $i++):
                    $item = $items[$i];

                    $description = $item->get_description();
                    if (empty($description))
                        continue;

                    $link = $direct_link ? $item->get_link() : 'view.php?feed=' . urlencode($feed_code) . '&amp;id=' . md5($item->get_link());
                    if (!$more && ($i == count($feed->get_items())-1)) {
                        $class_text='class="menu-last"';
                    } else {
                        $class_text='';
                    }
 
                   $date = empty($date_format) ? $item->get_date() : $item->get_date($date_format);
                ?>
                    <li <?php echo $class_text; ?>><a href="<?php echo $link; ?>"><span <?php echo $class;?>><?php echo $item->get_title(); ?></span><br/><span class="smallprint light"><?php echo $date; ?></span></a></li>
                        <?php $num_items_displayed++; ?>
                <?php endfor; ?>
                <?php if ($more):?>
                    <li class="menu-last"><a href="?feed=<?php echo urlencode($feed_code); ?>">More...</a></li>
                <?php endif; ?>
            </ol>
        </div>
        <?php endforeach; ?>

    <?php if ($feeds == Config::get('ucsf_news','feeds')): ?>
        <?php $listed_alt_feeds = array_filter($alt_feeds, function ($feed_config_info) { return ! (array_key_exists('hidden',$feed_config_info) && $feed_config_info['hidden']); }); ?>
        <?php  if (count($listed_alt_feeds)>0): ?>  
            <div class="menu-full menu-detailed menu-padded">
            <h1 class="light menu-first">Additional News</h1>
            <ol>
            <li><a href="http://m.youtube.com/ucsf"><span class="external">UCSF on YouTube</span></a></li>
            <?php $i = 0; $len = count($listed_alt_feeds);?>
            <?php foreach ($listed_alt_feeds as $feed_code=>$feed): ?>
                <?php $class = $i==$len-1 ? 'class="menu-last"' : ''; ?>
                <li <?php echo $class; ?>><a href="?feed=<?php echo urlencode($feed_code); ?>"><?php echo $feed['name']; ?></a></li>
             <?php $i++; ?>
            <?php endforeach; ?>
            </ol>
            </div>
        <?php endif; ?>
    <?php endif;?>
<a href="javascript:history.back()" id="button-top" class="button-full button-padded">Back</a>
<?php 
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>