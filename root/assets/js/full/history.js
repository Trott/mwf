mwf.full.history=new function(){var a=[];var b=[];var c=[];this.setState=function(f,e){var d=c.indexOf(e);if(d<0){d=c.length;c.push(e)}b[d]=f};this.saveState=function(e,f,d){d=d?d:location.pathname+location.hash;this.setState(e,d);history.replaceState(e,f,d)};this.getState=function(e){url=e?location.pathname+"#/"+e:location.pathname+location.hash;var d=c.indexOf(url);return d<0?undefined:b[d]};this.hideArray=function(e,d){if(e.indexOf(d)<0){e.push(d)}return e};this.init=function(){function f(o,k){var g;for(d=0;d<k.length;d++){g=document.getElementById(k[d]);if(g){g.setAttribute("style","display:none")}}var i=document.getElementById(o);var m=(mwf.userAgent.isNative()&&mwf.userAgent.getOS()=="android"&&o=="main_menu")?"display:inline":"display:block";if(i){i.setAttribute("style",m)}else{return false}var j=document.getElementById("header");var n=document.getElementById("footer");var l=document.getElementById("button-top");var h=o=="main_menu"?"":"display:block";if(l){if((o=="main_menu")||mwf.userAgent.isNative()){l.setAttribute("style","display:none")}else{l.setAttribute("style","display:inline")}}if(j){j.setAttribute("style",h)}if(n&&mwf.userAgent.isNative()&&mwf.userAgent.getOS()==="iphone_os"&&o==="main_menu"){n.setAttribute("style","display:none")}else{n.setAttribute("style","")}return true}if(!window.location.hash){window.location.hash="#/main_menu"}f(window.location.hash.substring(2),[]);if(!(history instanceof Object&&history.replaceState instanceof Function)){return}var e=document.getElementsByTagName("a");for(var d=0;d<e.length;d++){if((document.getElementById("il"+e[d].pathname)!=null)||(mwf.site.root==e[d].href.replace(/\/$/,""))){a.push(new mwf.full.fastLink(e[d],function(k){var h=(mwf.site.root==this.element.href.replace(/\/$/,""))?"main_menu":"il"+this.element.pathname;if(h=="il/main_menu"){h="main_menu"}var m=document.getElementById(h);if(m!=null){k.preventDefault();var g=document.getElementById(window.location.hash.substr(2));var j=g.getAttribute("id");f(h,[j]);var l=mwf.full.history.getState();var i=(l&&l.hasOwnProperty("hide"))?mwf.full.history.hideArray(l.hide,h):[h];mwf.full.history.saveState({show:j,hide:i},"");window.location.hash="#/"+h;l=mwf.full.history.getState();i=(l&&l.hasOwnProperty("hide"))?mwf.full.history.hideArray(l.hide,j):[j];mwf.full.history.saveState({show:h,hide:i},"");if(mwf.site.analytics){mwf.site.analytics.trackPageview(this.element.pathname)}}}))}}window.addEventListener("popstate",function(i){state=mwf.full.history.getState();if(state){f(state.show,state.hide)}if(i.state){var g;var h;for(d=0;d<i.state.hide.length;d++){g=mwf.full.history.getState(i.state.hide[d]);if(g){h=mwf.full.history.hideArray(g.hide,i.state.show);mwf.full.history.setState({show:i.state.hide[d],hide:h},location.pathname+"#/"+i.state.hide[d])}}f(i.state.show,i.state.hide)}},false)}};document.addEventListener("DOMContentLoaded",mwf.full.history.init,false);