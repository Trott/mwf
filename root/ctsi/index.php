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
if(mwf.classification.isFull()){function getProfile(v){if(v.hasOwnProperty("Profiles")){if((v.Profiles instanceof Array)&&(v.Profiles.length>0)){var a=v.Profiles[0];var b=document.getElementById("ctsi-menu");var q=document.getElementById("ctsi-header");var m=document.getElementById("ctsi-items");if(a.hasOwnProperty("Name")){q.innerHTML=a.Name;if(a.hasOwnProperty("PhotoURL")){var d=document.createElement("img");d.setAttribute("src","/assets/min/img.php?max_height=80&img="+a.PhotoURL);d.setAttribute("alt","");d.setAttribute("style","border-top-right-radius:0;float:left");d.setAttribute("class","menu-first");var p=q.clientHeight;q.setAttribute("style","height:52px;padding-top:20px");b.insertBefore(d,q)}}if(a.hasOwnProperty("Narrative")){var u=document.createElement("li");var j=document.createElement("a");j.setAttribute("href","javascript:toggleNarrative();");var f=document.createElement("span");f.setAttribute("class","smallprint");f.setAttribute("id","ctsi-narrative");var n=a.Narrative.substring(0,a.Narrative.substring(0,200).lastIndexOf(" "));f.innerHTML=n+"...";document.getElementById("ctsi-narrative-hidden").innerHTML=a.Narrative;j.appendChild(f);u.appendChild(j);m.appendChild(u)}if(a.hasOwnProperty("Keywords")&&a.Keywords.length>0){var l=a.Keywords;var s=document.createElement("ol");var t=l.length>5?5:l.length;for(var r=0;r<t;r++){var o=document.createElement("li");o.innerHTML=l[r];s.appendChild(o)}var h=document.getElementById("ctsi-keywords");h.innerHTML='<h1 class="content-first light">Research Interests</h1>';h.appendChild(s)}if(a.hasOwnProperty("Publications")&&a.Publications.length>0){var c=a.Publications;var s=document.createElement("ol");var t=c.length>5?5:c.length;for(var r=0;r<t;r++){if(c[r].hasOwnProperty("PublicationTitle")){var o=document.createElement("li");var k=document.createElement("span");k.setAttribute("class","smallprint");k.innerHTML=c[r].PublicationTitle;if(c[r].hasOwnProperty("PublicationSource")&&(c[r].PublicationSource[0].hasOwnProperty("PublicationSourceURL"))&&(c[r].PublicationSource[0].PublicationSourceURL.length>0)){var g=document.createElement("a");g.setAttribute("href",c[r].PublicationSource[0].PublicationSourceURL)}else{var g=document.createElement("p")}g.appendChild(k);o.appendChild(g);s.appendChild(o)}}var e=document.getElementById("ctsi-publications");e.innerHTML='<h1 class="content-first light">Publications</h1>';e.appendChild(s)}}}}}var script=document.createElement("script");script.setAttribute("src","http://profiles.ucsf.edu/CustomAPI/v1/JSONProfile.aspx?FNO=<?php echo urlencode($_GET['fno']); ?>&callback=getProfile&publications=full&mobile=on");document.getElementsByTagName("head")[0].appendChild(script);function toggleNarrative(){var a=document.getElementById("ctsi-narrative").innerHTML;document.getElementById("ctsi-narrative").innerHTML=document.getElementById("ctsi-narrative-hidden").innerHTML;document.getElementById("ctsi-narrative-hidden").innerHTML=a};
</script>
<?php
echo HTML_Decorator::body_end()->render();
echo HTML_Decorator::html_end()->render();
?>