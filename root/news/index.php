<?php
require_once(dirname(dirname(__FILE__)).'/assets/lib/decorator.class.php');
require_once(dirname(dirname(__FILE__)).'/assets/config.php');
require_once(dirname(dirname(dirname(__FILE__))).'/auxiliary/feed/feed.class.php');

$feeds = Config::get('ucsf_news','feeds');
$alt_feeds = Config::get('ucsf_news','alternate_feeds');
$all_feeds = array_merge($feeds, $alt_feeds);

$more = TRUE;
$item_limit = 4;
$header_title = HTML_Decorator::tag('a', 'News', array('href'=>'/news'));
$header_feed = '';

if (array_key_exists('feed',$_GET) && in_array($_GET['feed'],$all_feeds)) {
    $my_feed=$_GET['feed'];
    $feeds = array($my_feed);
    if (Config::get('ucsf_news',"$my_feed.header_title")) {
        $header_title = Config::get('ucsf_news', "$my_feed.header_title");
        $header_feed=$my_feed;
    }
    
    $item_limit = PHP_INT_MAX;
    $more = FALSE;
}

$rss = array();
foreach ($feeds as $feed_code) {
        $rss[$feed_code] = new Feed(Config::get('ucsf_news',"$feed_code.name"),Config::get('ucsf_news',"$feed_code.url"));
}

$home_feed_code = '';

if (count($rss) == 1) {
    $home_feed_code = key($rss);
}

date_default_timezone_set('America/Los_Angeles');

echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | " . strip_tags($header_title))->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header($header_title)
        ->render();
         ?> 
        <?php foreach ($rss as $feed_code=>$feed): ?>
        <?php $direct_link = Config::get('ucsf_news',"$feed_code.direct_link"); ?>
        <?php $date_format = Config::get('ucsf_news',"$feed_code.date_format");   ?>
                <?php $num_items_displayed = 0;
                      $class = $direct_link ? 'class="external"' : '';
                      $rel = $direct_link ? ' rel="external" class="no-ext-ind"' : '';
                      $items=$feed->get_items();
                if (count($items)==0):?>
                    <div class="content padded"><h1 class="light content-first"><?php echo htmlspecialchars(Config::get('ucsf_news',"$feed_code.name")); ?></h1><div class="content-last">This news feed is currently unavailable. Please try again later.</div></div>
          <?php else: ?>
          <div class="menu padded detailed">
             <h1 class="light menu-first"><?php echo htmlspecialchars(Config::get('ucsf_news',"$feed_code.name")); ?></h1>
                    <ol>
              <?php for($i=0; $i < count($items) && $num_items_displayed<$item_limit; $i++):
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
                    <li <?php echo $class_text; ?>><a href="<?php echo $link; ?>"<?php echo $rel; ?>><span <?php echo $class;?>><?php echo $item->get_title(); ?></span><br/><span class="smallprint light"><?php echo $date; ?></span></a></li>
                        <?php $num_items_displayed++; ?>
                    <?php endfor; ?>
                <?php if ($more):?>
                    <li class="menu-last"><a href="?feed=<?php echo urlencode($feed_code); ?>">More...</a></li>
                <?php endif; ?>
                    </ol>
                </div>
              <?php  endif; ?>
        <?php endforeach; ?>

    <?php if ($feeds == Config::get('ucsf_news','feeds')): ?>
            <div class="menu padded detailed">
            <h1 class="light menu-first">Additional News</h1>
            <ol>
            <li><a href="http://m.youtube.com/ucsf" rel="external">UCSF on YouTube</a></li>
            <?php $i = 0; $len = count($alt_feeds);?>
            <?php foreach ($alt_feeds as $feed_code): ?>
                <?php if (!(Config::get('ucsf_news',"$feed_code.hidden"))): ?>
                <?php $class = $i==$len-1 ? 'class="menu-last"' : ''; ?>
                <li <?php echo $class; ?>><a href="?feed=<?php echo urlencode($feed_code); ?>"><?php echo Config::get('ucsf_news',"$feed_code.name"); ?></a></li>
                <?php endif; ?>
             <?php $i++; ?>
            <?php endforeach; ?>
            </ol>
            </div>
    <?php endif;
echo Site_Decorator::ucsf_footer()->render();
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>