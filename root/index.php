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
            <a href="/"><img src="/assets/img/ucsf-logo.png" alt="UCSF"><span>Mobile</span></a>
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
        <div id="il/library/" style="display:none" class="menu detailed">
            <h2>Library</h2>
            <ol>
                <li><a data-target-id="il/library/locations" href="/library/locations">Hours and Locations</a></li>
                <li><a rel="external" href="http://ucsf.worldcat.org/m">Find Books and Journals</a></li>
                <li><a rel="external" href="http://guides.library.ucsf.edu/content.php?pid=252446&amp;sid=2084303">Mobile Resources</a></li>
                <li><a rel="external" href="http://tiny.ucsf.edu/reserve">Reserve a Study Room</a></li>
                <li><a data-target-id="il/library/help/" href="/library/help/">Get Help</a></li>
                <li><a href="/library/news">News</a></li>
                <li><a rel="external" href="http://library.ucsf.edu/?ovrrdr=1">Full Library Site</a></li>
            </ol>
        </div>
        <div id="il/library/locations" style="display:none" class="menu detailed">
            <h2>Locations</h2>
            <ol>
                <li><a data-target-id="il/library/locations/parnassus" href="/library/locations/parnassus">Parnassus Library</a></li>
                <li><a data-target-id="il/library/locations/mission_bay" href="/library/locations/mission_bay">Mission Bay Library</a></li>
            </ol>
        </div>
        <div id="il/library/locations/parnassus" style="display:none" class="menu detailed">
            <h2>Parnassus Library</h2>
            <ol>
                <li><a href="/maps/map.php?loc=Kalmanovitz+Library">Map<br><br><span class="smallprint">530 Parnassus Avenue<br>San Francisco, CA 94143-0840<br></span></a></li>
                <li><a href="tel:+14154762334">(415) 476-2334</a></li>
                <li><a rel="external" class="no-ext-ind" href="http://library.ucsf.edu/locations/hours?ovrrdr=1"><span class="smallprint">530 Parnassus Avenue<br>San Francisco, CA 94143-0840<br></span><br><br><span class="external">Holidays and exceptions</span></a></li>
            </ol>
        </div>
        <div id="il/library/locations/mission_bay" style="display:none" class="menu detailed">
            <h2>Mission Bay Library</h2>
            <ol><li><a href="/maps/map.php?loc=Rutter+Center">Map<br><br><span class="smallprint">William J. Rutter Conference Center<br>Room 150<br>1675 Owens Street<br>San Francisco, CA 94143-2119<br></span></a></li>
                <li><a href="tel:+14155144060">(415) 514-4060</a></li>
                <li><a rel="external" class="no-ext-ind" href="http://library.ucsf.edu/locations/hours?ovrrdr=1"><span class="smallprint">William J. Rutter Conference Center<br>Room 150<br>1675 Owens Street<br>San Francisco, CA 94143-2119<br></span><br><br><span class="external">Holidays and exceptions</span></a></li>
            </ol>
        </div>
        <div id="il/library/help/" style="display:none" class="menu detailed">
            <h2>Help</h2>
            <ol>
                <li><a href="/library/askus/">Ask Us</a></li><li><a rel="external" href="http://guides.library.ucsf.edu/">Getting Started Guides</a></li>
                <li><a data-target-id="il/library/howdoi/" href="/library/howdoi/">How Do I?</a></li>
                <li><a href="/library/whereisit/">Where Is It?</a></li>
            </ol>
        </div>
        <div id="il/library/howdoi/" style="display:none" class="menu detailed">
            <h2>How Do I?</h2>
            <ol>
                <li><a href="/library/howdoi/remoteaccess">Get Network Access</a></li>
                <li><a href="/library/howdoi/wifi">Use WiFi</a></li>
                <li><a href="/library/howdoi/renew">Renew Books</a></li>
            </ol>
        </div>
    <?php
    echo Site_Decorator::ucsf_fitness_menu('Fitness', array('id' => 'il/fitness', 'style' => 'display:none'))->render();
?>
        <div id="il/calendars" style="display:none" class="menu detailed">
            <h2>Calendars</h2>
            <ol>
                <li><a href="/calendars/ucsfevents">UCSF Events</a></li>
                <li><a href="/calendars/academicevents">Featured Academic Events</a></li>
                <li><a rel="external" href="http://www.ucsf.edu/about/ucsf-calendars?ovrrdr=1">UCSF Calendars Website</a></li>
            </ol>
        </div>
        <div id="il/social" style="display:none" class="menu detailed">
            <h2>Social Media</h2>
            <ol>
                <li><a rel="external" href="http://www.twitter.com/ucsf">Twitter</a></li>
                <li><a rel="external" href="http://www.youtube.com/ucsf">YouTube</a></li>
                <li><a rel="external" href="http://www.facebook.com/ucsf">Facebook</a></li>
            </ol>
        </div>
        <div id="il/emergency" style="display:none" class="menu detailed">
            <h2>Emergency</h2>
            <ol>
                <li><a href="tel:+911">911 <span class="smallprint">for emergencies only</span></a></li>
                <li><a href="tel:+14154761414">UCSF Police Non-Emergency<br><span class="smallprint">(415) 476-1414</span></a></li>
                <li><a href="tel:+14158857890">UCSF Medical Center Security<br><span class="smallprint">(415) 885-7890</span></a></li>
                <li><a href="tel:+14155024000">Campus Emergency Information Hotline<br><span class="smallprint">(415) 502-4000</span></a></li>
                <li><a href="tel:+18008738232">Back-up Campus Emergency Hotline<br><span class="smallprint">1 (800) 873-8232</span></a></li>
                <li><a href="tel:+14158857828">UCSF Medical Center Information Hotline<br><span class="smallprint">(415) 885-7828</span></a></li>
            </ol>
        </div>
        <footer id="footer">
            <p>&copy; 2012 Regents of the University of California<br>
                <a href="/about">About</a> | <a href="/feedback/">Feedback</a>
            </p>
        </footer>
    </body>
</html>