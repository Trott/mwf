<?php
require_once(dirname(__FILE__) . '/../assets/lib/decorator.class.php');
require_once(dirname(__FILE__) . '/location/locations.class.php');
$locations = new Locations('http://' . $_SERVER['SERVER_NAME'] . '/maps/ucsf_map_coordinates.xml');
$search_results = false;

if ($search_results = (isset($_GET['search']) && strlen(trim($_GET['search'])) > 0 && $search = trim($_GET['search'])))
    $locations = $locations->search($search);

echo HTML_Decorator::html_start()->render();

?>
<head>
    <meta charset="utf-8">
    <title>UCSF Mobile | Map</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/apple-touch-icon-144x144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/apple-touch-icon-precomposed.png">
</head>
<?php

echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header(HTML_Decorator::tag('a', 'Maps', array('href' => '/maps')))->render();
?>
<form class="padded" action="locations.php" method="get">
    <h1 class="light">Search Locations</h1><br/>
    <input type="text" id="menu-filter" name="search" />
    <input type="submit" name="submit" value="Search" />
</form>

<div class="menu detailed padded">
    <h1 class="light">Locations<?php echo $search_results ? ' (Results)' : ''; ?></h1>
    <ol class="menu-filterable">
        <?php
        if (!$search_results)
            if (count($locations) == 0)
                echo '<li><a><em>No results</em></a></li>';
            else
                echo '<li><a href="map.php">All Locations</a></li>';
        foreach ($locations as $location)
            echo '<li><a href="map.php?loc=' . urlencode($location['name']) . '">' . $location['name'] . '</a></li>';
        if ($search_results)
            echo '<li><a href="locations.php"><em>List All Locations</em></a></li>';
        ?>
    </ol>
</div>

<?php echo Site_Decorator::ucsf_footer()->render(); ?>


<script>
    if(typeof $ != 'undefined')
    {
        $('#menu-filter').siblings('input[type=submit]').hide();
        var filter = function() {
            var str = $('#menu-filter').val().toLowerCase();
            var ele = $('.menu-filterable li');
            for(var i = 0; i < ele.length; i++)
            {
                var elei = $(ele[i]);
                if(str.length == 0)
                    elei.show();
                if(elei.children('a').html().toLowerCase().indexOf(str) >= 0)
                    elei.show();
                else
                    elei.hide();
            }
            window.setTimeout(filter, 500);
        }
        window.setTimeout(filter, 500);
    }
</script>
<?php
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>