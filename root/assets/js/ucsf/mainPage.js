mwf.ucsf=mwf.ucsf||{};mwf.ucsf.callAnalytics=function(){var a=(window.location.hash=="#/main_menu")?"/":window.location.hash.substr(4);mwf.analytics.trackPageview(a)};window.addEventListener("hashchange",mwf.ucsf.callAnalytics,false);mwf.ucsf.toggleHeaderAndFooter=function(){var b=document.getElementById("header");var a=location.hash=="#/main_menu"?"":"display:block";if(b){b.setAttribute("style",a)}};window.addEventListener("hashchange",mwf.ucsf.toggleHeaderAndFooter,false);window.addEventListener("DOMContentLoaded",mwf.ucsf.toggleHeaderAndFooter,false);