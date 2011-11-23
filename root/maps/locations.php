<?php
require_once(dirname(__FILE__).'/../assets/config.php');
require_once(dirname(__FILE__).'/../assets/lib/classification.class.php');
require_once(dirname(__FILE__).'/../assets/lib/decorator.class.php');
require_once(dirname(__FILE__).'/location/locations.class.php');
$locations = new Locations('http://' . $_SERVER['SERVER_NAME'] . '/maps/ucsf_map_coordinates.xml');
$search_results = false;

if($search_results = (isset($_GET['search']) && strlen(trim($_GET['search'])) > 0 && $search = trim($_GET['search'])))
    $locations = $locations->search($search);

echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()
    ->set_title(Config::get('global', 'title_text') . " | Map")
    ->add_js_handler_library('full_libs','jquery')
    ->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('<a href="/maps">Maps</a>')->render();
?>
<form class="form-full form-padded" action="locations.php" method="get">
         <h1 class="light form-first">Search Locations</h1>
            <input class="form-last" type="text" id="menu-filter" name="search" />
            <input type="submit" name="submit" value="Search" />
    </form>

    <div class="menu-full menu-detailed menu-padded menu-filterable">
         <h1 class="light menu-first">Locations<?php echo $search_results ? ' (Results)' : ''; ?></h1>
         <ol>
             <?php
             if(!$search_results)			 	
             if(count($locations) == 0)
                 echo '<li><a><em>No results</em></a></li>';
			 elseif(Classification::is_full())
          		echo '<li><a href="map.php">All Locations</a></li>';
             foreach($locations as $location)
                echo '<li><a href="map.php?loc='.urlencode($location['name']).'">'.$location['name'].'</a></li>';
             if($search_results)
                 echo '<li><a href="locations.php"><em>List All Locations</em></a></li>';
             ?>
        </ol>
    </div>

<?php echo Site_Decorator::ucsf_footer()->render(); ?>

    
    <script>
    if(typeof $ != 'undefined')
    {
        $('#menu-filter').siblings('input[type=submit]').hide();
        $('#menu-filter').css('right', '0px');
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
<?php echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>