<?php
require_once(dirname(__FILE__) . '/../assets/config.php');
require_once(dirname(__FILE__) . '/../assets/lib/decorator.class.php');

switch (isset($_GET['campus']) ? $_GET['campus'] : 'none') {
    case 'Mission Bay':
        $lat = 37.767569;
        $lon = -122.392223;
        $initialZoom = 17;
        $startLocation = 'Mission Bay';
        break;
    case 'Parnassus':
        $lat = 37.763154;
        $lon = -122.457941;
        $initialZoom = 17;
        $startLocation = 'Parnassus';
        break;
    case 'Mt. Zion':
        $lat = 37.7846389;
        $lon = -122.439604;
        $initialZoom = 18;
        $startLocation = 'Mt. Zion';
        break;
    case 'SFGH':
        $lat = 37.7555365;
        $lon = -122.405038;
        $initialZoom = 17;
        $startLocation = 'SFGH';
        break;
    default:
        require_once(dirname(__FILE__) . '/location/locations.class.php');
        $locations = new Locations('http://' . $_SERVER['SERVER_NAME'] . '/maps/ucsf_map_coordinates.xml');
        $lat = 37.769765;
        $lon = -122.426147;
        $initialZoom = 12;
        $startLocation = '';
}

echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()
        ->set_title('UCSF Mobile' . " | $startLocation Map")
        ->add_inner_tag('script', '', array('src'=>'http://maps.google.com/maps/api/js?sensor=false&v=3.5'))
        ->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header(HTML_Decorator::tag('a', 'Maps', array('href' => '/maps')))->render();
echo HTML_Decorator::tag('div', '', array('id' => 'map_canvas'))->render();
?>
<script type="text/javascript">
    var lat=<?php echo $lat; ?>;
    var lon=<?php echo $lon; ?>;
    var initialZoom=<?php echo $initialZoom; ?>;
    var mapTypeId = 'UCSF Custom Map';
    var mapStyle = [
        {featureType:"administrative", elementType:"all", stylers:[{hue:"#dae6c3"},{saturation:22},{lightness:-5}]}, 
        {featureType:"landscape", elementType:"all", stylers:[{hue:"#dae6c3"},{saturation:16},{lightness:-7}]},
        {featureType:"road", elementType:"geometry", stylers:[{hue:"#ffffff"},{saturation:-100},{lightness:100}]},
        {featureType: "road.local", elementType: "labels", stylers: [{ visibility: "off" }]}
    ];
    
    var styledMap = new google.maps.StyledMapType(mapStyle);

    var mapType = new google.maps.ImageMapType({
        tileSize: new google.maps.Size(256,256),
        getTileUrl: function(coord,zoom) {
            return "img/tiles/"+zoom+"/"+coord.x+"/"+coord.y+".png";
        }
    });
    var map = new google.maps.Map(document.getElementById("map_canvas"), 
    {center:new google.maps.LatLng(lat,lon),
        mapTypeId:google.maps.MapTypeId.ROADMAP,
        zoom:initialZoom,
        mapTypeControl:false});
    map.overlayMapTypes.insertAt(0, mapType);

    map.mapTypes.set(mapTypeId, styledMap);
    map.setMapTypeId(mapTypeId);
<?php
if (empty($startLocation)):
    if (!isset($_GET['loc'])):
        foreach ($locations as $location):
            ?> 
                            google.maps.event.addListener(new google.maps.Marker({position: new google.maps.LatLng(<?php echo $location['lat']; ?>, <?php echo $location['lon']; ?>), map: map, title:"<?php echo htmlspecialchars($location['name']); ?>" }), 
                            'click', 
                            function(){
                                var lat = <?php echo htmlspecialchars($location['lat']); ?>;
                                var lon = <?php echo htmlspecialchars($location['lon']); ?>;
                                var info = new google.maps.InfoWindow({
                                    content:"<div><?php echo htmlspecialchars($location['name']); ?></div><div><a href=\"https://maps.google.com/maps?daddr="+lat+","+lon+"\">Directions</a></div>",
                                    position:new google.maps.LatLng(lat, lon)
                                });
                                info.open(map);
                            }
                        );
            <?php
        endforeach;
    else:
        $loc = $_GET['loc'];
        if ($location = $locations->find($loc)):
            ?>
                            google.maps.event.addListener(new google.maps.Marker({position: new google.maps.LatLng(<?php echo $location['lat']; ?>, <?php echo $location['lon']; ?>), map: map, title:"<?php echo htmlspecialchars($location['name']); ?>" }), 
                            'click', 
                            function(){
                                var lat = <?php echo htmlspecialchars($location['lat']); ?>;
                                var lon = <?php echo htmlspecialchars($location['lon']); ?>;
                                var info = new google.maps.InfoWindow({
                                    content:"<div><?php echo htmlspecialchars($location['name']); ?></div><div><a href=\"https://maps.google.com/maps?daddr="+lat+","+lon+"\">Directions</a></div>",
                                    position:new google.maps.LatLng(lat, lon)
                                });
                                info.open(map);
                            }
                        );
                            map.setCenter(new google.maps.LatLng(<?php echo $location['lat']; ?>,<?php echo $location['lon']; ?>));
                            map.setZoom(17);
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>
</script>
<?php
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>