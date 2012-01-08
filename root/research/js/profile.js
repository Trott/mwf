mwf.ucsfCtsiProfile=new function(){this.renderProfile=function(C){if(C.hasOwnProperty("Profiles")){if((C.Profiles instanceof Array)&&(C.Profiles.length>0)){var a=C.Profiles[0];var b=document.getElementById("ctsi-menu");var w=document.getElementById("ctsi-header");var o=document.getElementById("ctsi-items");if(a.hasOwnProperty("Name")){w.innerHTML=a.Name;if(a.hasOwnProperty("PhotoURL")){var d=document.createElement("img");d.setAttribute("src","/assets/min/img.php?max_height=80&img="+a.PhotoURL);d.setAttribute("alt","");d.setAttribute("style","border-top-right-radius:0;float:left");d.setAttribute("class","menu-first");var v=w.clientHeight;w.setAttribute("style","height:52px;padding-top:20px");b.insertBefore(d,w)}}if(a.hasOwnProperty("Narrative")){var A=document.createElement("li");var k=document.createElement("a");k.setAttribute("href","javascript:mwf.ucsfCtsiProfile.toggleNarrative();");var f=document.createElement("span");f.setAttribute("class","smallprint");f.setAttribute("id","ctsi-narrative");var p=a.Narrative.substring(0,a.Narrative.substring(0,200).lastIndexOf(" "));f.innerHTML=p+"...";document.getElementById("ctsi-narrative-hidden").innerHTML=a.Narrative;k.appendChild(f);A.appendChild(k);o.appendChild(A)}if(a.hasOwnProperty("Keywords")&&a.Keywords.length>0){var n=a.Keywords;var y=document.createElement("ol");var z=n.length>5?5:n.length;for(var x=0;x<z;x++){var q=document.createElement("li");q.innerHTML=n[x];y.appendChild(q)}var h=document.getElementById("ctsi-keywords");h.innerHTML='<h1 class="content-first light">Research Interests</h1>';h.appendChild(y)}if(a.hasOwnProperty("Publications")&&a.Publications.length>0){var c=a.Publications;var s=document.createElement("ol");var B=c.length>5?5:c.length;for(var u=0;u<B;u++){if(c[u].hasOwnProperty("PublicationTitle")){var t=document.createElement("li");var m=document.createElement("span");m.setAttribute("class","smallprint");m.innerHTML=c[u].PublicationTitle;var g;if(c[u].hasOwnProperty("PublicationSource")&&(c[u].PublicationSource[0].hasOwnProperty("PublicationSourceURL"))&&(c[u].PublicationSource[0].PublicationSourceURL.length>0)){g=document.createElement("a");g.setAttribute("href",c[u].PublicationSource[0].PublicationSourceURL);g.setAttribute("rel","external")}else{g=document.createElement("p")}g.appendChild(m);t.appendChild(g);s.appendChild(t)}}var e=document.getElementById("ctsi-publications");e.innerHTML='<h1 class="content-first light">Recent Publications</h1>';e.appendChild(s)}if(a.hasOwnProperty("ProfilesURL")){var l=document.createElement("li");var r=document.createElement("a");r.innerHTML="Full Research Profile";r.setAttribute("rel","external");r.setAttribute("href",a.ProfilesURL);document.getElementById("ctsi-full-profile");l.appendChild(r);document.getElementById("ctsi-full-profile").appendChild(l)}}}};this.getProfile=function(a){mwf.util.importJS("http://profiles.ucsf.edu/CustomAPI/v1/JSONProfile.aspx?FNO="+a+"&callback=mwf.ucsfCtsiProfile.renderProfile&publications=full&mobile=on")};this.toggleNarrative=function(){var a=document.getElementById("ctsi-narrative").innerHTML;document.getElementById("ctsi-narrative").innerHTML=document.getElementById("ctsi-narrative-hidden").innerHTML;document.getElementById("ctsi-narrative-hidden").innerHTML=a}};