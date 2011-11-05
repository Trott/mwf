mwf.ucsfCtsiProfile = new function() {
        
    /* Callback for getProfile() */
    this.renderProfile = function(data) {
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
                    anchor.setAttribute("href","javascript:mwf.ucsfCtsiProfile.toggleNarrative();");
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
                    var pubList = document.createElement("ol");
                    var pubLimit = publications.length > 5 ? 5 : publications.length;
                    for (var j = 0; j < pubLimit; j++) {
                        if (publications[j].hasOwnProperty('PublicationTitle')) {
                            var pubItem = document.createElement("li");
                            var thisPublication = document.createElement("span");
                            thisPublication.setAttribute("class","smallprint");
                            thisPublication.innerHTML=publications[j].PublicationTitle;

                            var thisAnchor;
                            if (publications[j].hasOwnProperty('PublicationSource') && 
                                (publications[j].PublicationSource[0].hasOwnProperty('PublicationSourceURL')) &&
                                (publications[j].PublicationSource[0].PublicationSourceURL.length > 0)) { 
                                thisAnchor = document.createElement("a");

                                thisAnchor.setAttribute("href",publications[j].PublicationSource[0].PublicationSourceURL);

                            } else {
                                thisAnchor = document.createElement("p");
                            }
                            thisAnchor.appendChild(thisPublication);
                            pubItem.appendChild(thisAnchor);
 
                            pubList.appendChild(pubItem);
                        }
                    }
                    var publicationsContainer = document.getElementById("ctsi-publications");
                    publicationsContainer.innerHTML='<h1 class="content-first light">Publications</h1>';
                    publicationsContainer.appendChild(pubList);
                }
                
                if (myProfile.hasOwnProperty("ProfilesURL")) {
                    var fullProfileItem = document.createElement("li");
                    var fullProfileAnchor = document.createElement("a");
                    var fullProfileAnchorText = document.createElement("span");
                    fullProfileAnchorText.innerHTML="Full Research Profile";
                    fullProfileAnchorText.setAttribute("class","external");
                    fullProfileAnchor.appendChild(fullProfileAnchorText);
                    fullProfileAnchor.setAttribute("href",myProfile.ProfilesURL);
                    document.getElementById("ctsi-full-profile")
                    fullProfileItem.appendChild(fullProfileAnchor);
                    document.getElementById('ctsi-full-profile').appendChild(fullProfileItem);
                }
            }
        }
    }
    
    this.getProfile = function(fno) {
        mwf.util.importJS("http://profiles.ucsf.edu/CustomAPI/v1/JSONProfile.aspx?FNO="+fno+"&callback=mwf.ucsfCtsiProfile.renderProfile&publications=full&mobile=on");
    }
        
    this.toggleNarrative = function() {
        var temp = document.getElementById("ctsi-narrative").innerHTML;
        document.getElementById("ctsi-narrative").innerHTML = document.getElementById("ctsi-narrative-hidden").innerHTML;
        document.getElementById("ctsi-narrative-hidden").innerHTML = temp;
    }
}