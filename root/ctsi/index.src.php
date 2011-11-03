<?php
require_once(dirname(dirname(__FILE__)) . '/assets/lib/decorator.class.php');
require_once(dirname(dirname(__FILE__)) . '/assets/config.php');
echo HTML_Decorator::html_start()->render();
echo Site_Decorator::head()->set_title(Config::get('global', 'title_text') . " | Research Profile")->render();
echo HTML_Decorator::body_start()->render();
echo Site_Decorator::ucsf_header('Research Profile')
        ->render();
?>
<div class="menu-full menu-padded menu-detailed" id="ctsi-menu">
    <h1 class="menu-first" id="ctsi-header"></h1>
    <ol id="ctsi-items"></ol>
</div>
<div style="display:none" id="ctsi-narrative-hidden"></div>

<div class="content-full content-padded" id="ctsi-keywords"></div>
<div class="menu-full menu-padded menu-detailed" id="ctsi-publications"></div>

<?php
echo HTML_Decorator::tag('a', 'Back', array('href' => 'javascript:history.back()',
    'id' => 'button-top',
    'class' => 'button-full button-padded'));
echo Site_Decorator::ucsf_footer()->render();
?>
<script type="text/javascript">
    if (mwf.classification.isFull()) {
        function getProfile(data) {
            if (data.hasOwnProperty("Profiles")) {
                if ((data.Profiles instanceof Array) && (data.Profiles.length > 0)) {
                    var myProfile = data.Profiles[0];
                    var menu = document.getElementById('ctsi-menu');
                    var header = document.getElementById('ctsi-header');
                    var items = document.getElementById('ctsi-items');
                    
                    if (myProfile.hasOwnProperty("Name")) {
                        header.innerHTML = myProfile.Name;
                        
                        if (myProfile.hasOwnProperty("PhotoURL")) {
                            var profilePhoto = document.createElement("img");
                            profilePhoto.setAttribute("src","/assets/min/img.php?max_height=80&img="+myProfile.PhotoURL);
                            profilePhoto.setAttribute("alt","");
                            profilePhoto.setAttribute("style","border-top-right-radius:0;float:left");
                            profilePhoto.setAttribute("class","menu-first");
                            var headerHeight = header.clientHeight;
                            header.setAttribute("style","height:52px;padding-top:20px");
                            menu.insertBefore(profilePhoto,header);
                        }
                    }
                    
                    if (myProfile.hasOwnProperty("Narrative")) {
                        var item = document.createElement("li");
                        var anchor = document.createElement("a");
                        anchor.setAttribute("href","javascript:toggleNarrative();");
                        var narrative = document.createElement("span");
                        narrative.setAttribute("class","smallprint");
                        narrative.setAttribute("id","ctsi-narrative");
                        var narrativeTextShort = myProfile.Narrative.substring(0,myProfile.Narrative.substring(0,200).lastIndexOf(' '));
                        narrative.innerHTML = narrativeTextShort+'...';
                        document.getElementById("ctsi-narrative-hidden").innerHTML=myProfile.Narrative;
                        anchor.appendChild(narrative);
                        item.appendChild(anchor);
                        items.appendChild(item);
                    }
                    
                    if (myProfile.hasOwnProperty("Keywords") && myProfile.Keywords.length > 0) {
                        var keywords = myProfile.Keywords;
                        var list = document.createElement("ol");
                        var limit = keywords.length > 5 ? 5 : keywords.length;
                        for (var i = 0; i < limit; i++) {
                            var thisItem = document.createElement("li");
                            thisItem.innerHTML=keywords[i];
                            list.appendChild(thisItem);
                        }
                        var keywordsContainer = document.getElementById("ctsi-keywords");
                        keywordsContainer.innerHTML='<h1 class="content-first light">Research Interests</h1>';
                        keywordsContainer.appendChild(list);
                    }
                    
                    if (myProfile.hasOwnProperty("Publications") && myProfile.Publications.length > 0) {
                        var publications = myProfile.Publications;
                        var list = document.createElement("ol");
                        var limit = publications.length > 5 ? 5 : publications.length;
                        for (var i = 0; i < limit; i++) {
                            if (publications[i].hasOwnProperty('PublicationTitle')) {
                                var thisItem = document.createElement("li");
                                var thisPublication = document.createElement("span");
                                thisPublication.setAttribute("class","smallprint");
                                thisPublication.innerHTML=publications[i].PublicationTitle;

                                if (publications[i].hasOwnProperty('PublicationSource') && 
                                    (publications[i].PublicationSource[0].hasOwnProperty('PublicationSourceURL')) &&
                                    (publications[i].PublicationSource[0].PublicationSourceURL.length > 0)) { 
                                    var thisAnchor = document.createElement("a");

                                    thisAnchor.setAttribute("href",publications[i].PublicationSource[0].PublicationSourceURL);

                                } else {
                                    var thisAnchor = document.createElement("p");
                                }
                                thisAnchor.appendChild(thisPublication);
                                thisItem.appendChild(thisAnchor);
 
                                list.appendChild(thisItem);
                            }
                        }
                        var publicationsContainer = document.getElementById("ctsi-publications");
                        publicationsContainer.innerHTML='<h1 class="content-first light">Publications</h1>';
                        publicationsContainer.appendChild(list);
                    }
                }
            }
        }
    }
    var script = document.createElement('script');
    script.setAttribute("src","http://profiles.ucsf.edu/CustomAPI/v1/JSONProfile.aspx?FNO=<?php echo urlencode($_GET['fno']); ?>&callback=getProfile&publications=full&mobile=on");

    document.getElementsByTagName('head')[0].appendChild(script);
    
    function toggleNarrative() {
        var temp = document.getElementById("ctsi-narrative").innerHTML;
        document.getElementById("ctsi-narrative").innerHTML = document.getElementById("ctsi-narrative-hidden").innerHTML;
        document.getElementById("ctsi-narrative-hidden").innerHTML = temp;
    }
</script>
<?php
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>