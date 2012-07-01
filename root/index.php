<?php
/**
 *
 * @package frontpage
 *
 * @author ebollens
 * @author trott
 * @copyright Copyright (c) 2010-12 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120426
 *
 * @uses Decorator
 * @uses Site_Decorator
 */

/**
 * Require necessary libraries.
 */
require_once(dirname(__FILE__) . '/assets/lib/decorator.class.php');
?><!DOCTYPE html>
<html lang="en" manifest="/assets/appcache.php">
    <head>
        <meta charset="utf-8">
        <title>UCSF Mobile</title>
        <link rel="stylesheet" type="text/css" href="/assets/css/main.css" media="screen">
        <noscript><style>.jsonly{display:none}</style></noscript>
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
        <script type="text/notJs" src="/assets/js.php"></script>
        <script type="text/notJs">
            var _newsq = _newsq || [];
            function loadSection() {
                _newsq.push(["ucsf-news","feed_ucsf_news","http://feeds.feedburner.com/UCSF_News"]);
                _newsq.push(["media-coverage","feed_media_coverage","http://feeds.feedburner.com/UCSF_Media_Coverage"]); 
            }
            loadSection();
            window.onhashchange=loadSection;
        </script>
        <script>
            window.addEventListener('load', function () {
                var scripts = document.getElementsByTagName('script');
                var scriptIndex = 0;
                for (var i = 0, len = scripts.length; i < len; i++) {
                    var scriptEl = scripts[scriptIndex];
                    if (scriptEl.type === 'text/notJs') {
                        scriptEl.type = 'text/javascript';
                        scriptEl.parentNode.removeChild(scriptEl);
                        document.body.appendChild(scriptEl); 
                    } else {
                        scriptIndex++;
                    }
                }
            },  false);
        </script>
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/apple-touch-icon-144x144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/apple-touch-icon-precomposed.png">
    </head>
    <body class="front" data-default-target-id="main_menu">
        <header id="header">
            <a href="/"><img src="http://localhost/assets/img/ucsf-logo.png" alt="UCSF"><span>Mobile</span></a>
        </header>
        <!-- prefetch background images -->
        <img style="display:none" alt="" src="/assets/img/background-decor.png">
        <img style="display:none" alt="" src="/assets/img/watermark.png">
        <div class="menu front" id="main_menu">
            <ol>
                <li>
                    <a data-target-id="il/shuttle/" href="shuttle/"><img class="dashboard_icon" src="/assets/img/homescreen/shuttle.png" alt=""><br>Shuttle</a>
                </li><li>
                    <a data-target-id="il/directory" href="directory"><img class="dashboard_icon" src="/assets/img/homescreen/directory.png" alt=""><br>Directory</a>
                </li><li>
                    <a data-target-id="il/news" href="news"><img class="dashboard_icon" src="/assets/img/homescreen/news.png" alt=""><br>News</a>
                </li><li>
                    <a data-target-id="il/maps/" href="maps/"><img class="dashboard_icon" src="/assets/img/homescreen/maps.png" alt=""><br>Maps</a>
                </li><li>
                    <a data-target-id="il/library/" href="library/"><img class="dashboard_icon" src="/assets/img/homescreen/library.png" alt=""><br>Library</a>         
                </li><li>
                    <a data-target-id="il/fitness" href="fitness"><img class="dashboard_icon" src="/assets/img/homescreen/fitness.png" alt=""><br>Fitness</a>
                </li><li>
                    <a data-target-id="il/calendars" href="calendars"><img class="dashboard_icon" src="/assets/img/homescreen/calendars.png" alt=""><br>Calendars</a>
                </li><li>
                    <a data-target-id="il/social" href="social"><img class="dashboard_icon" src="/assets/img/homescreen/social.png" alt=""><br>Social&nbsp;Media</a>
                </li><li><a data-target-id="il/emergency" href="emergency"><img class="dashboard_icon" src="/assets/img/homescreen/emergency.png" alt=""><br>Emergency</a>
                </li>
            </ol>
        </div>
        <div id="il/shuttle/" style="display:none" class="menu detailed">
            <h2>Shuttle</h2>
            <ol>
                <li><a href="/shuttle/planner">Trip Planner</a></li>
                <li><a data-target-id="il/shuttle/list/color" href="/shuttle/list/color">Shuttles By Color</a></li>
                <li><a data-target-id="il/shuttle/list/location" href="/shuttle/list/location">Shuttles By Location</a></li>
                <li><a rel="external" href="http://campuslifeservices.ucsf.edu/transportation/shuttles/timetables/shuttlemap.pdf">System Map <span class="smallprint light">PDF</span></a></li>
                <li><a rel="external" href="http://www.campuslifeservices.ucsf.edu/transportation/shuttles/timetables/pdf/ShuttleHolidaySchedule.pdf">Holiday Schedule <span class="smallprint light">PDF</span></a></li>
            </ol>
        </div>
        <div id="il/shuttle/list/color" style="display:none" class="menu detailed">
            <h2>Shuttles By Color</h2>
            <ol>
                <li><a href="/shuttle/schedule/blue"><div class="shuttle-color blue"></div> Blue</a></li>
                <li><a href="/shuttle/schedule/gold"><div class="shuttle-color gold"></div> Gold</a></li>
                <li><a href="/shuttle/schedule/grey"><div class="shuttle-color grey"></div> Grey</a></li>
                <li><a href="/shuttle/schedule/tan"><div class="shuttle-color tan"></div> Tan</a></li>
                <li><a href="/shuttle/schedule/black"><div class="shuttle-color black"></div> Black</a></li>
                <li><a href="/shuttle/schedule/purple"><div class="shuttle-color purple"></div> Purple</a></li>
                <li><a href="/shuttle/schedule/pink"><div class="shuttle-color pink"></div> Pink</a></li>
                <li><a href="/shuttle/schedule/va"><div class="shuttle-color va"></div> VA</a></li>
                <li><a href="/shuttle/schedule/bronze"><div class="shuttle-color bronze"></div> Bronze</a></li>
                <li><a href="/shuttle/schedule/yellow"><div class="shuttle-color yellow"></div> Yellow</a></li>
                <li><a href="/shuttle/schedule/red"><div class="shuttle-color red"></div> Red</a></li>
                <li><a href="/shuttle/schedule/lime"><div class="shuttle-color lime"></div> Lime</a></li>
                <li><a href="/shuttle/schedule/green"><div class="shuttle-color green"></div> Green</a></li>
            </ol>
        </div>
        <div id="il/shuttle/list/location" style="display:none" class="menu detailed">
            <h2>Shuttles By Location</h2>
            <ol>
                <li><a href="/shuttle/list/location/parnassus">Parnassus</a></li>
                <li><a href="/shuttle/list/location/sfgh">SFGH</a></li>
                <li><a href="/shuttle/list/location/mission_bay">Mission Bay (4th St.)</a></li>
                <li><a href="/shuttle/list/location/mt_zion">Mt. Zion</a></li>
                <li><a href="/shuttle/list/location/mcb">MCB</a></li>
                <li><a href="/shuttle/list/location/china_basin">China Basin</a></li>
                <li><a href="/shuttle/list/location/laurel_heights">Laurel Heights</a></li>
                <li><a href="/shuttle/list/location/3360_geary">3360 Geary St. (Med Center)</a></li>
                <li><a href="/shuttle/list/location/kezar">Kezar</a></li>
                <li><a href="/shuttle/list/location/va">VA</a></li>
                <li><a href="/shuttle/list/location/aldea">Aldea</a></li>
                <li><a href="/shuttle/list/location/buchanan_dental">Buchanan Dental</a></li>
                <li><a href="/shuttle/list/location/55_laguna">55 Laguna</a></li>
                <li><a href="/shuttle/list/location/bart">16th St. BART</a></li>
                <li><a href="/shuttle/list/location/17th">17th St. Lot</a></li>
                <li><a href="/shuttle/list/location/18th">18th St. CPC</a></li>
                <li><a href="/shuttle/list/location/2300">2300 Harrison</a></li>
                <li><a href="/shuttle/list/location/20th">20th St. CPFM</a></li>
                <li><a href="/shuttle/list/location/654_minnesota">654 Minnesota</a></li>
            </ol>
        </div>
        <form id="il/directory" style="display:none" method="get" action="/directory/query">
            <h2>Directory</h2>
            <label for="first_name">First Name</label><input id="first_name" type="text" name="first_name">
            <label for="last_name">Last Name</label><input id="last_name" type="text" name="last_name">
            <label for="department">Department</label><input id="department" type="text" name="department">
            <input value="Search" type="submit">
        </form>
        <div id="il/news" style="display:none">
            <section id="ucsf-news" class="center"><progress>Loading...</progress></section>
            <section id="media-coverage" class="center"><progress>Loading...</progress></section>
        </div>
        <div id="il/maps/" style="display:none" class="menu detailed">
            <h2>Maps</h2>
            <ol>
                <li><a href="/maps/campus.php?campus=Parnassus">Parnassus</a></li>
                <li><a href="/maps/campus.php?campus=Mission+Bay">Mission Bay</a></li>
                <li><a href="/maps/campus.php?campus=Mt.+Zion">Mt. Zion</a></li>
                <li><a href="/maps/campus.php?campus=SFGH">San Francisco General Hospital</a></li>
                <li><a href="/maps/locations.php">Location List</a></li>
            </ol>
        </div>
    <?php
    echo Site_Decorator::ucsf_library_menu('Library', array('id' => 'il/library/', 'style' => 'display:none'))->set_lightning(true)->render();
    echo Site_Decorator::ucsf_library_locations_menu('Locations', array('id' => 'il/library/locations', 'style' => 'display:none'))->set_lightning(true)->render();
    echo Site_Decorator::ucsf_library_locations_parnassus_menu('Parnassus Library', array('id' => 'il/library/locations/parnassus', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_library_locations_missionbay_menu('Mission Bay Library', array('id' => 'il/library/locations/mission_bay', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_library_help_menu('Help', array('id' => 'il/library/help/', 'style' => 'display:none'))->set_lightning(true)->render();
    echo Site_Decorator::ucsf_library_howdoi_menu('How Do I?', array('id' => 'il/library/howdoi/', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_fitness_menu('Fitness', array('id' => 'il/fitness', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_calendar_menu('Calendars', array('id' => 'il/calendars', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_social_media_menu('Social Media', array('id' => 'il/social', 'style' => 'display:none'))->render();
    echo Site_Decorator::ucsf_emergency_menu('Emergency', array('id' => 'il/emergency', 'style' => 'display:none'))->render();
?>
        <footer id="footer">
            <p>&copy; 2012 Regents of the University of California<br>
                <a href="/about">About</a> | <a href="/feedback/">Feedback</a>
            </p>
        </footer>
    </body>
</html>