var ucsf=ucsf||{};ucsf.ctsiProfile={renderProfile:function(C){if(C.hasOwnProperty("Profiles")){if((C.Profiles instanceof Array)&&(C.Profiles.length>0)){var a=C.Profiles[0],b=document.getElementById("ctsi-menu"),w=document.getElementById("ctsi-header"),o,d,v,A,k,f,p,n,y,z,x,q,h,c,s,B,u,t,m,g,e,l,r;if(a.hasOwnProperty("Name")){w.innerHTML=a.Name;if(a.hasOwnProperty("PhotoURL")){d=document.createElement("img");d.setAttribute("src","http://src.sencha.io/80/"+a.PhotoURL);d.setAttribute("alt","");d.setAttribute("style","border-top-right-radius:0;border-bottom-left-radius:.5em;float:left");v=w.clientHeight;w.setAttribute("style","height:52px;padding-top:20px");b.insertBefore(d,w)}}if(a.hasOwnProperty("Narrative")){o=document.createElement("ol");b.appendChild(o);A=document.createElement("li");k=document.createElement("a");k.setAttribute("href","#");k.setAttribute("onclick","ucsf.ctsiProfile.toggleNarrative(); return false;");f=document.createElement("span");f.setAttribute("class","smallprint");f.setAttribute("id","ctsi-narrative");p=a.Narrative.substring(0,a.Narrative.substring(0,200).lastIndexOf(" "));f.innerHTML=p+"...";document.getElementById("ctsi-narrative-hidden").innerHTML=a.Narrative;k.appendChild(f);A.appendChild(k);o.appendChild(A);d.setAttribute("style","border-top-right-radius:0;float:left")}if(a.hasOwnProperty("Keywords")&&a.Keywords.length>0){n=a.Keywords;y=document.createElement("ol");z=n.length>5?5:n.length;for(x=0;x<z;x=x+1){q=document.createElement("li");q.innerHTML=n[x];y.appendChild(q)}h=document.getElementById("ctsi-keywords");h.innerHTML='<h1 class="content-first light">Research Interests</h1>';h.appendChild(y)}if(a.hasOwnProperty("Publications")&&a.Publications.length>0){c=a.Publications;s=document.createElement("ol");B=c.length>5?5:c.length;for(u=0;u<B;u=u+1){if(c[u].hasOwnProperty("PublicationTitle")){t=document.createElement("li");m=document.createElement("span");m.setAttribute("class","smallprint");m.innerHTML=c[u].PublicationTitle;if(c[u].hasOwnProperty("PublicationSource")&&(c[u].PublicationSource[0].hasOwnProperty("PublicationSourceURL"))&&(c[u].PublicationSource[0].PublicationSourceURL.length>0)){g=document.createElement("a");g.setAttribute("href",c[u].PublicationSource[0].PublicationSourceURL);g.setAttribute("rel","external")}else{g=document.createElement("p")}g.appendChild(m);t.appendChild(g);s.appendChild(t)}}e=document.getElementById("ctsi-publications");e.innerHTML='<h1 class="content-first light">Recent Publications</h1>';e.appendChild(s)}if(a.hasOwnProperty("ProfilesURL")){l=document.createElement("li");r=document.createElement("a");r.innerHTML="Full Research Profile";r.setAttribute("rel","external");r.setAttribute("href",a.ProfilesURL);document.getElementById("ctsi-full-profile");l.appendChild(r);document.getElementById("ctsi-full-profile").appendChild(l)}}}},toggleNarrative:function(){var a=document.getElementById("ctsi-narrative").innerHTML;document.getElementById("ctsi-narrative").innerHTML=document.getElementById("ctsi-narrative-hidden").innerHTML;document.getElementById("ctsi-narrative-hidden").innerHTML=a}};