(function(){var h=[],n=[],d=[],b,a,f,e,g,i,j,k,c,l,m;j=[];k=function(){j.splice(0,2)};c=function(o,p){j.push(o,p);window.setTimeout(k,2500)};clickBust=function(q){var p,o,r;for(p=0;p<j.length;p+=2){o=j[p];r=j[p+1];if(Math.abs(q.clientX-o)<25&&Math.abs(q.clientY-r)<25){q.stopPropagation();q.preventDefault()}}};document.addEventListener("click",clickBust,true);a=function(o,p){this.element=o;this.handler=p;o.addEventListener("touchstart",this,false);o.addEventListener("click",this,false)};a.prototype.handleEvent=function(o){switch(o.type){case"touchstart":this.onTouchStart(o);break;case"touchmove":this.onTouchMove(o);break;case"touchend":this.onClick(o);break;case"click":this.onClick(o);break}};a.prototype.onTouchStart=function(o){o.stopPropagation();this.element.addEventListener("touchend",this,false);document.body.addEventListener("touchmove",this,false);this.startX=o.touches[0].clientX;this.startY=o.touches[0].clientY};a.prototype.onTouchMove=function(o){if(Math.abs(o.touches[0].clientX-this.startX)>10||Math.abs(o.touches[0].clientY-this.startY)>10){this.reset()}};a.prototype.onClick=function(o){o.stopPropagation();this.reset();this.handler(o);if(o.type==="touchend"){c(this.startX,this.startY)}};a.prototype.reset=function(){this.element.removeEventListener("touchend",this,false);document.body.removeEventListener("touchmove",this,false)};f=function(q,p){var o=d.indexOf(p);if(o<0){o=d.length;d.push(p)}n[o]=q};e=function(p,q,o){o=o||location.pathname+location.hash;f(p,o);history.replaceState(p,q,o)};g=function(q){var p=q?location.pathname+"#/"+q:location.pathname+location.hash,o=d.indexOf(p);return o<0?undefined:n[o]};i=function(p,o){if(p.indexOf(o)<0){p.push(o)}return p};m=function(){var p,o;b=document.body.getAttribute("data-default-target-id")||"";function q(r,t){var v,u,s;u=document.getElementById(r)||document.getElementById(b);if(u){for(s=0;s<t.length;s+=1){v=document.getElementById(t[s]);if(v){v.setAttribute("style","display:none")}}u.setAttribute("style","display:block")}}if(!location.hash){location.hash="#/"+b}q(location.hash.substring(2),[]);if(!(history instanceof Object&&history.replaceState instanceof Function)){return}this.touchHandler=function(v){var s,x,r,u,w,t;s=this.element.getAttribute("data-target-id");x=document.getElementById(s);if(x!==null){v.preventDefault();r=document.getElementById(location.hash.substr(2));u=r?r.getAttribute("id"):b;q(s,[u]);w=g();t=(w&&w.hasOwnProperty("hide"))?i(w.hide,s):[s];e({show:u,hide:t},"");location.hash="#/"+s;w=g();t=(w&&w.hasOwnProperty("hide"))?i(w.hide,u):[u];e({show:s,hide:t},"")}};p=document.getElementsByTagName("a");for(o=0;o<p.length;o+=1){if(p[o].getAttribute("data-target-id")!==null){h.push(new a(p[o],this.touchHandler))}}this.popHandler=function(t){var u,r,s;u=g();if(u){q(u.show,u.hide)}if(t.state){for(o=0;o<t.state.hide.length;o+=1){r=g(t.state.hide[o]);if(r){s=i(r.hide,t.state.show);f({show:t.state.hide[o],hide:s},location.pathname+"#/"+t.state.hide[o])}}q(t.state.show,t.state.hide)}};window.addEventListener("popstate",this.popHandler,false)};document.addEventListener("DOMContentLoaded",m,false)}());