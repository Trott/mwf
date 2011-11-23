<?php

/**
 *
 * @author trott
 * 
 * @uses Classification
 */

require_once(dirname(dirname(dirname(__FILE__))).'/assets/lib/classification.class.php');
$top = Classification::is_native() ? '0' : '35px';

header("Content-Type: text/css");
?>
html { height: 100% }
body { height: 100%; margin: 0; padding: 0 }
#map_canvas { position: absolute; top: <?php echo $top; ?>; left: 0; right: 0; bottom:0; z-index: 1; overflow: hidden; }
div#progress_indicator {position:relative; height:100%;}
div#progress_indicator img {position: absolute; top:50%; left: 50%; margin-top:-8px; margin-left:-8px; height:16px; width:16px }
a.button-full {!important; margin: 0; z-index: 2;}
a.button-full {
 clear: both;
 position: relative;
}
 