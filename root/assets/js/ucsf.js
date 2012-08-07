/* Modernizr 2.5.3 (Custom Build) | MIT & BSD
 * Build: http://www.modernizr.com/download/#-localstorage-touch-shiv-cssclasses-addtest-prefixed-teststyles-testprop-testallprops-hasevent-prefixes-domprefixes-css_overflow_scrolling-load
 */
;window.Modernizr=function(a,b,c){function A(a){j.cssText=a}function B(a,b){return A(m.join(a+";")+(b||""))}function C(a,b){return typeof a===b}function D(a,b){return!!~(""+a).indexOf(b)}function E(a,b){for(var d in a)if(j[a[d]]!==c)return b=="pfx"?a[d]:!0;return!1}function F(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:C(f,"function")?f.bind(d||b):f}return!1}function G(a,b,c){var d=a.charAt(0).toUpperCase()+a.substr(1),e=(a+" "+o.join(d+" ")+d).split(" ");return C(b,"string")||C(b,"undefined")?E(e,b):(e=(a+" "+p.join(d+" ")+d).split(" "),F(e,b,c))}var d="2.5.3",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k,l={}.toString,m=" -webkit- -moz- -o- -ms- ".split(" "),n="Webkit Moz O ms",o=n.split(" "),p=n.toLowerCase().split(" "),q={},r={},s={},t=[],u=t.slice,v,w=function(a,c,d,e){var f,i,j,k=b.createElement("div"),l=b.body,m=l?l:b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),k.appendChild(j);return f=["&#173;","<style>",a,"</style>"].join(""),k.id=h,(l?k:m).innerHTML+=f,m.appendChild(k),l||(m.style.background="",g.appendChild(m)),i=c(k,a),l?k.parentNode.removeChild(k):m.parentNode.removeChild(m),!!i},x=function(){function d(d,e){e=e||b.createElement(a[d]||"div"),d="on"+d;var f=d in e;return f||(e.setAttribute||(e=b.createElement("div")),e.setAttribute&&e.removeAttribute&&(e.setAttribute(d,""),f=C(e[d],"function"),C(e[d],"undefined")||(e[d]=c),e.removeAttribute(d))),e=null,f}var a={select:"input",change:"input",submit:"form",reset:"form",error:"img",load:"img",abort:"img"};return d}(),y={}.hasOwnProperty,z;!C(y,"undefined")&&!C(y.call,"undefined")?z=function(a,b){return y.call(a,b)}:z=function(a,b){return b in a&&C(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=u.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(u.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(u.call(arguments)))};return e});var H=function(c,d){var f=c.join(""),g=d.length;w(f,function(c,d){var f=b.styleSheets[b.styleSheets.length-1],h=f?f.cssRules&&f.cssRules[0]?f.cssRules[0].cssText:f.cssText||"":"",i=c.childNodes,j={};while(g--)j[i[g].id]=i[g];e.touch="ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch||(j.touch&&j.touch.offsetTop)===9},g,d)}([,["@media (",m.join("touch-enabled),("),h,")","{#touch{top:9px;position:absolute}}"].join("")],[,"touch"]);q.touch=function(){return e.touch},q.localstorage=function(){try{return localStorage.setItem(h,h),localStorage.removeItem(h),!0}catch(a){return!1}};for(var I in q)z(q,I)&&(v=I.toLowerCase(),e[v]=q[I](),t.push((e[v]?"":"no-")+v));return e.addTest=function(a,b){if(typeof a=="object")for(var d in a)z(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,g.className+=" "+(b?"":"no-")+a,e[a]=b}return e},A(""),i=k=null,function(a,b){function g(a,b){var c=a.createElement("p"),d=a.getElementsByTagName("head")[0]||a.documentElement;return c.innerHTML="x<style>"+b+"</style>",d.insertBefore(c.lastChild,d.firstChild)}function h(){var a=k.elements;return typeof a=="string"?a.split(" "):a}function i(a){var b={},c=a.createElement,e=a.createDocumentFragment,f=e();a.createElement=function(a){var e=(b[a]||(b[a]=c(a))).cloneNode();return k.shivMethods&&e.canHaveChildren&&!d.test(a)?f.appendChild(e):e},a.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+h().join().replace(/\w+/g,function(a){return b[a]=c(a),f.createElement(a),'c("'+a+'")'})+");return n}")(k,f)}function j(a){var b;return a.documentShived?a:(k.shivCSS&&!e&&(b=!!g(a,"article,aside,details,figcaption,figure,footer,header,hgroup,nav,section{display:block}audio{display:none}canvas,video{display:inline-block;*display:inline;*zoom:1}[hidden]{display:none}audio[controls]{display:inline-block;*display:inline;*zoom:1}mark{background:#FF0;color:#000}")),f||(b=!i(a)),b&&(a.documentShived=b),a)}var c=a.html5||{},d=/^<|^(?:button|form|map|select|textarea)$/i,e,f;(function(){var a=b.createElement("a");a.innerHTML="<xyz></xyz>",e="hidden"in a,f=a.childNodes.length==1||function(){try{b.createElement("a")}catch(a){return!0}var c=b.createDocumentFragment();return typeof c.cloneNode=="undefined"||typeof c.createDocumentFragment=="undefined"||typeof c.createElement=="undefined"}()})();var k={elements:c.elements||"abbr article aside audio bdi canvas data datalist details figcaption figure footer header hgroup mark meter nav output progress section summary time video",shivCSS:c.shivCSS!==!1,shivMethods:c.shivMethods!==!1,type:"default",shivDocument:j};a.html5=k,j(b)}(this,b),e._version=d,e._prefixes=m,e._domPrefixes=p,e._cssomPrefixes=o,e.hasEvent=x,e.testProp=function(a){return E([a])},e.testAllProps=G,e.testStyles=w,e.prefixed=function(a,b,c){return b?G(a,b,c):G(a,"pfx")},g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+t.join(" "):""),e}(this,this.document),function(a,b,c){function d(a){return o.call(a)=="[object Function]"}function e(a){return typeof a=="string"}function f(){}function g(a){return!a||a=="loaded"||a=="complete"||a=="uninitialized"}function h(){var a=p.shift();q=1,a?a.t?m(function(){(a.t=="c"?B.injectCss:B.injectJs)(a.s,0,a.a,a.x,a.e,1)},0):(a(),h()):q=0}function i(a,c,d,e,f,i,j){function k(b){if(!o&&g(l.readyState)&&(u.r=o=1,!q&&h(),l.onload=l.onreadystatechange=null,b)){a!="img"&&m(function(){t.removeChild(l)},50);for(var d in y[c])y[c].hasOwnProperty(d)&&y[c][d].onload()}}var j=j||B.errorTimeout,l={},o=0,r=0,u={t:d,s:c,e:f,a:i,x:j};y[c]===1&&(r=1,y[c]=[],l=b.createElement(a)),a=="object"?l.data=c:(l.src=c,l.type=a),l.width=l.height="0",l.onerror=l.onload=l.onreadystatechange=function(){k.call(this,r)},p.splice(e,0,u),a!="img"&&(r||y[c]===2?(t.insertBefore(l,s?null:n),m(k,j)):y[c].push(l))}function j(a,b,c,d,f){return q=0,b=b||"j",e(a)?i(b=="c"?v:u,a,b,this.i++,c,d,f):(p.splice(this.i++,0,a),p.length==1&&h()),this}function k(){var a=B;return a.loader={load:j,i:0},a}var l=b.documentElement,m=a.setTimeout,n=b.getElementsByTagName("script")[0],o={}.toString,p=[],q=0,r="MozAppearance"in l.style,s=r&&!!b.createRange().compareNode,t=s?l:n.parentNode,l=a.opera&&o.call(a.opera)=="[object Opera]",l=!!b.attachEvent&&!l,u=r?"object":l?"script":"img",v=l?"script":u,w=Array.isArray||function(a){return o.call(a)=="[object Array]"},x=[],y={},z={timeout:function(a,b){return b.length&&(a.timeout=b[0]),a}},A,B;B=function(a){function b(a){var a=a.split("!"),b=x.length,c=a.pop(),d=a.length,c={url:c,origUrl:c,prefixes:a},e,f,g;for(f=0;f<d;f++)g=a[f].split("="),(e=z[g.shift()])&&(c=e(c,g));for(f=0;f<b;f++)c=x[f](c);return c}function g(a,e,f,g,i){var j=b(a),l=j.autoCallback;j.url.split(".").pop().split("?").shift(),j.bypass||(e&&(e=d(e)?e:e[a]||e[g]||e[a.split("/").pop().split("?")[0]]||h),j.instead?j.instead(a,e,f,g,i):(y[j.url]?j.noexec=!0:y[j.url]=1,f.load(j.url,j.forceCSS||!j.forceJS&&"css"==j.url.split(".").pop().split("?").shift()?"c":c,j.noexec,j.attrs,j.timeout),(d(e)||d(l))&&f.load(function(){k(),e&&e(j.origUrl,i,g),l&&l(j.origUrl,i,g),y[j.url]=2})))}function i(a,b){function c(a,c){if(a){if(e(a))c||(j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}),g(a,j,b,0,h);else if(Object(a)===a)for(n in m=function(){var b=0,c;for(c in a)a.hasOwnProperty(c)&&b++;return b}(),a)a.hasOwnProperty(n)&&(!c&&!--m&&(d(j)?j=function(){var a=[].slice.call(arguments);k.apply(this,a),l()}:j[n]=function(a){return function(){var b=[].slice.call(arguments);a&&a.apply(this,b),l()}}(k[n])),g(a[n],j,b,n,h))}else!c&&l()}var h=!!a.test,i=a.load||a.both,j=a.callback||f,k=j,l=a.complete||f,m,n;c(h?a.yep:a.nope,!!i),i&&c(i)}var j,l,m=this.yepnope.loader;if(e(a))g(a,0,m,0);else if(w(a))for(j=0;j<a.length;j++)l=a[j],e(l)?g(l,0,m,0):w(l)?B(l):Object(l)===l&&i(l,m);else Object(a)===a&&i(a,m)},B.addPrefix=function(a,b){z[a]=b},B.addFilter=function(a){x.push(a)},B.errorTimeout=1e4,b.readyState==null&&b.addEventListener&&(b.readyState="loading",b.addEventListener("DOMContentLoaded",A=function(){b.removeEventListener("DOMContentLoaded",A,0),b.readyState="complete"},0)),a.yepnope=k(),a.yepnope.executeStack=h,a.yepnope.injectJs=function(a,c,d,e,i,j){var k=b.createElement("script"),l,o,e=e||B.errorTimeout;k.src=a;for(o in d)k.setAttribute(o,d[o]);c=j?h:c||f,k.onreadystatechange=k.onload=function(){!l&&g(k.readyState)&&(l=1,c(),k.onload=k.onreadystatechange=null)},m(function(){l||(l=1,c(1))},e),i?k.onload():n.parentNode.insertBefore(k,n)},a.yepnope.injectCss=function(a,c,d,e,g,i){var e=b.createElement("link"),j,c=i?h:c||f;e.href=a,e.rel="stylesheet",e.type="text/css";for(j in d)e.setAttribute(j,d[j]);g||(n.parentNode.insertBefore(e,n),m(c,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))},Modernizr.addTest("overflowscrolling",function(){return Modernizr.testAllProps("overflowScrolling")});
/*! matchMedia() polyfill - Test a CSS media type/query in JS. Authors & copyright (c) 2012: Scott Jehl, Paul Irish, Nicholas Zakas. Dual MIT/BSD license */
window.matchMedia=window.matchMedia||(function(e,f){var c,a=e.documentElement,b=a.firstElementChild||a.firstChild,d=e.createElement("body"),g=e.createElement("div");g.id="mq-test-1";g.style.cssText="position:absolute;top:-100em";d.appendChild(g);return function(h){g.innerHTML='&shy;<style media="'+h+'"> #mq-test-1 { width: 42px; }</style>';a.insertBefore(d,b);c=g.offsetWidth==42;a.removeChild(d);return{matches:c,media:h}}})(document);
var ucsf=ucsf||{},_gaq=_gaq||[];ucsf.analytics=function(){var a={},b="UA-15855907-1",c=[{a:"UA-552286-29",s:"/library/"}];a.trackPageview=function(a){a=a||window.location.pathname+window.location.search+window.location.hash,_gaq.push(["_trackPageview",a]);for(var b=0;b<c.length;b++)a.substring(0,c[b].s.length)===c[b].s&&_gaq.push(["t"+b+"._trackPageview",a])},a.init=function(a){a=a||navigator.userAgent,_gaq.push(["_setAccount",b]);for(var d=0;d<c.length;d++)_gaq.push(["t"+d+"._setAccount",c[d].a]);/ mwf\-native\-[a-z]*\/[\d\.]*$/i.test(a)&&_gaq.push(["_setCustomVar",1,"mwf_native_client","1"]),this.trackPageview()};var d=document.createElement("script");return d.src="//www.google-analytics.com/ga.js",document.getElementsByTagName("head")[0].appendChild(d),a}(),ucsf.analytics.init();var Hogan={};(function(a,b){function i(a){return String(a===null||a===undefined?"":a)}function j(a){return a=i(a),h.test(a)?a.replace(c,"&amp;").replace(d,"&lt;").replace(e,"&gt;").replace(f,"&#39;").replace(g,"&quot;"):a}a.Template=function(a,c,d,e){this.r=a||this.r,this.c=d,this.options=e,this.text=c||"",this.buf=b?[]:""},a.Template.prototype={r:function(a,b,c){return""},v:j,t:i,render:function(a,b,c){return this.ri([a],b||{},c)},ri:function(a,b,c){return this.r(a,b,c)},rp:function(a,b,c,d){var e=c[a];return e?(this.c&&typeof e=="string"&&(e=this.c.compile(e,this.options)),e.ri(b,c,d)):""},rs:function(a,b,c){var d=a[a.length-1];if(!k(d)){c(a,b,this);return}for(var e=0;e<d.length;e++)a.push(d[e]),c(a,b,this),a.pop()},s:function(a,b,c,d,e,f,g){var h;return k(a)&&a.length===0?!1:(typeof a=="function"&&(a=this.ls(a,b,c,d,e,f,g)),h=a===""||!!a,!d&&h&&b&&b.push(typeof a=="object"?a:b[b.length-1]),h)},d:function(a,b,c,d){var e=a.split("."),f=this.f(e[0],b,c,d),g=null;if(a==="."&&k(b[b.length-2]))return b[b.length-1];for(var h=1;h<e.length;h++)f&&typeof f=="object"&&e[h]in f?(g=f,f=f[e[h]]):f="";return d&&!f?!1:(!d&&typeof f=="function"&&(b.push(g),f=this.lv(f,b,c),b.pop()),f)},f:function(a,b,c,d){var e=!1,f=null,g=!1;for(var h=b.length-1;h>=0;h--){f=b[h];if(f&&typeof f=="object"&&a in f){e=f[a],g=!0;break}}return g?(!d&&typeof e=="function"&&(e=this.lv(e,b,c)),e):d?!1:""},ho:function(a,b,c,d,e){var f=this.c,g=this.options;g.delimiters=e;var d=a.call(b,d);return d=d==null?String(d):d.toString(),this.b(f.compile(d,g).render(b,c)),!1},b:b?function(a){this.buf.push(a)}:function(a){this.buf+=a},fl:b?function(){var a=this.buf.join("");return this.buf=[],a}:function(){var a=this.buf;return this.buf="",a},ls:function(a,b,c,d,e,f,g){var h=b[b.length-1],i=null;if(!d&&this.c&&a.length>0)return this.ho(a,h,c,this.text.substring(e,f),g);i=a.call(h);if(typeof i=="function"){if(d)return!0;if(this.c)return this.ho(i,h,c,this.text.substring(e,f),g)}return i},lv:function(a,b,c){var d=b[b.length-1],e=a.call(d);if(typeof e=="function"){e=i(e.call(d));if(this.c&&~e.indexOf("{{"))return this.c.compile(e,this.options).render(d,c)}return i(e)}};var c=/&/g,d=/</g,e=/>/g,f=/\'/g,g=/\"/g,h=/[&<>\"\']/,k=Array.isArray||function(a){return Object.prototype.toString.call(a)==="[object Array]"}})(typeof exports!="undefined"?exports:Hogan),function(){"use strict";var a=[],b=[],c=[],d,e,f,g,h,i,j,k,l,m,n;j=[],k=function(){j.splice(0,2)},l=function(a,b){j.push(a,b),window.setTimeout(k,2500)},m=function(a){var b,c,d;for(b=0;b<j.length;b+=2)c=j[b],d=j[b+1],Math.abs(a.clientX-c)<25&&Math.abs(a.clientY-d)<25&&(a.stopPropagation(),a.preventDefault())},document.addEventListener("click",m,!0),e=function(a,b){this.element=a,this.handler=b,a.addEventListener("touchstart",this,!1),a.addEventListener("click",this,!1)},e.prototype.handleEvent=function(a){switch(a.type){case"touchstart":this.onTouchStart(a);break;case"touchmove":this.onTouchMove(a);break;case"touchend":this.onClick(a);break;case"click":this.onClick(a)}},e.prototype.onTouchStart=function(a){a.stopPropagation(),this.element.addEventListener("touchend",this,!1),document.body.addEventListener("touchmove",this,!1),this.startX=a.touches[0].clientX,this.startY=a.touches[0].clientY},e.prototype.onTouchMove=function(a){(Math.abs(a.touches[0].clientX-this.startX)>10||Math.abs(a.touches[0].clientY-this.startY)>10)&&this.reset()},e.prototype.onClick=function(a){a.stopPropagation(),this.reset(),this.handler(a),a.type==="touchend"&&l(this.startX,this.startY)},e.prototype.reset=function(){this.element.removeEventListener("touchend",this,!1),document.body.removeEventListener("touchmove",this,!1)},f=function(a,d){var e=c.indexOf(d);e<0&&(e=c.length,c.push(d)),b[e]=a},g=function(a,b,c){c=c||location.pathname+location.hash,f(a,c),history.replaceState(a,b,c)},h=function(a){var d=a?location.pathname+"#/"+a:location.pathname+location.hash,e=c.indexOf(d);return e<0?undefined:b[e]},i=function(a,b){return a.indexOf(b)<0&&a.push(b),a},n=function(){function l(a,b){var c,e,f;e=document.getElementById(a)||document.getElementById(d);if(e){for(f=0;f<b.length;f+=1)c=document.getElementById(b[f]),c&&c.setAttribute("style","display:none");e.setAttribute("style","display:block")}}var b,c,j,k;d=document.body.getAttribute("data-default-target-id")||"",!location.hash&&d!==""&&(location.hash="#/"+d),l(location.hash.substring(2),[d]);if(!(history instanceof Object&&history.replaceState instanceof Function))return;j=function(a){var b,c,e,f,j,k;b=this.element.getAttribute("data-target-id"),c=document.getElementById(b),c!==null&&(a.preventDefault(),e=document.getElementById(location.hash.substr(2)),f=e?e.getAttribute("id"):d,l(b,[f]),j=h(),k=j&&j.hasOwnProperty("hide")?i(j.hide,b):[b],g({show:f,hide:k},""),location.hash="#/"+b,j=h(),k=j&&j.hasOwnProperty("hide")?i(j.hide,f):[f],g({show:b,hide:k},""))},b=document.getElementsByTagName("a");for(c=0;c<b.length;c+=1)b[c].getAttribute("data-target-id")!==null&&a.push(new e(b[c],j));k=function(a){var b,d,e;b=h(),b&&l(b.show,b.hide);if(a.state){for(c=0;c<a.state.hide.length;c+=1)d=h(a.state.hide[c]),d&&(e=i(d.hide,a.state.show),f({show:a.state.hide[c],hide:e},location.pathname+"#/"+a.state.hide[c]));l(a.state.show,a.state.hide)}},window.addEventListener("popstate",k,!1)},document.readyState==="complete"||document.readyState==="interactive"?n():document.addEventListener("DOMContentLoaded",n,!1)}(),function(a){"use strict",a.picturefill=function(){var b=a.document.getElementsByTagName("div");for(var c=0,d=b.length;c<d;c++)if(b[c].getAttribute("data-picture")!==null){var e=b[c].getElementsByTagName("div"),f=[];for(var g=0,h=e.length;g<h;g++){var i=e[g].getAttribute("data-media");(!i||a.matchMedia&&a.matchMedia(i).matches)&&f.push(e[g])}var j=b[c].getElementsByTagName("img")[0];f.length?(j||(j=a.document.createElement("img"),j.alt=b[c].getAttribute("data-alt"),b[c].appendChild(j)),j.src=f.pop().getAttribute("data-src")):j&&b[c].removeChild(j)}},a.addEventListener?(a.addEventListener("resize",a.picturefill,!1),a.addEventListener("DOMContentLoaded",function(){a.picturefill(),a.removeEventListener("load",a.picturefill,!1)},!1),a.addEventListener("load",a.picturefill,!1)):a.attachEvent&&a.attachEvent("onload",a.picturefill),(document.readyState==="complete"||document.readyState==="loaded")&&a.picturefill()}(this),ucsf.callAnalytics=function(a){"use strict";if(a.oldURL.indexOf("#")!==-1){var b=window.location.hash==="#/main_menu"?"/":window.location.hash.substr(4);ucsf.analytics.trackPageview(b)}},window.addEventListener("hashchange",ucsf.callAnalytics,!1),ucsf.toggleHeaderAndFooter=function(){"use strict";var a=document.getElementById("header"),b=location.hash==="#/main_menu"?"":"display:block";a&&a.setAttribute("style",b)},window.addEventListener("hashchange",ucsf.toggleHeaderAndFooter,!1),window.addEventListener("DOMContentLoaded",ucsf.toggleHeaderAndFooter,!1),ucsf.news=function(){var a={},b=document.createElement("script");b.src="//www.google.com/jsapi",document.getElementsByTagName("head")[0].appendChild(b),a.loadFromStorage=function(a){var b;if(Modernizr.localstorage){b=window.localStorage.getItem(a);if(b!==null)return JSON.parse(b)}return{}},a.render=function(a,b,c,d,e){var f;f=new google.feeds.Feed(c),d.numEntries&&f.setNumEntries(d.numEntries),f.load(function(c){var f,g,h,i,j,k,l,m={};if(!c.error){m={feed:this.feed};for(f=0;f<m.feed.entries.length;f=f+1)g=m.feed.entries[f],h={},i=new Date(g.publishedDate),h.date=i.toLocaleDateString(),d.showTime&&(k=i.getMinutes(),k<10&&(k="0"+k),j=i.getHours(),l=j<12?"AM":"PM",j>12&&(j=j-12),j===0&&(j=12),h.time=j+":"+k+" "+l),g.dateTime=h;Modernizr.localstorage&&window.localStorage.setItem(b,JSON.stringify(m))}else m=ucsf.news.loadFromStorage(b);a.innerHTML=e.render(m)})},a.headlines=function(b,c,d,e){var f;e=e||{},f=typeof e.template!="function"?new Hogan.Template(function(a,b,c){var d=this;return d.b(c=c||""),d.s(d.f("feed",a,b,1),a,b,0,9,313,"{{ }}")&&(d.rs(a,b,function(a,b,c){c.b('<div class="menu detailed"><h2>'),c.b(c.v(c.f("title",a,b,0))),c.b("</h2><ol>"),c.s(c.f("entries",a,b,1),a,b,0,70,290,"{{ }}")&&(c.rs(a,b,function(a,b,c){c.b('  <li>    <a class="no-ext-ind" rel="external" href="'),c.b(c.v(c.f("link",a,b,0))),c.b('"><span class="external">'),c.b(c.v(c.f("title",a,b,0))),c.b('</span>    <div class="smallprint light">'),c.b(c.v(c.d("dateTime.date",a,b,0))),c.b('</div>    <div class="smallprint light">'),c.b(c.v(c.d("dateTime.time",a,b,0))),c.b("</div></a>")}),a.pop()),c.b("</ol></div>")}),a.pop()),d.s(d.f("feed",a,b,1),a,b,1,0,0,"")||d.b('<div class="content"><p>Content could not be loaded.</p></div>'),d.fl()}):new Hogan.Template(e.template),navigator.onLine?typeof google=="undefined"||!google.hasOwnProperty("load")?setTimeout(function(){typeof google=="undefined"||!google.hasOwnProperty("load")?b.innerHTML=f.render(a.loadFromStorage(c)):google.hasOwnProperty("feeds")?a.render(b,c,d,e,f):google.load("feeds","1",{nocss:!0,callback:function(){ucsf.news.render(b,c,d,e,f)}})},100):google.hasOwnProperty("feeds")?a.render(b,c,d,e,f):google.load("feeds","1",{nocss:!0,callback:function(){ucsf.news.render(b,c,d,e,f)}}):b.innerHTML=f.render(a.loadFromStorage(c))};var c=typeof _newsq=="undefined"?[]:_newsq;_newsq={push:function(b){return b.length===3&&(b[3]={}),a.headlines(document.getElementById(b[0]),b[1],b[2],b[3])}};for(var d=0,e=c.length;d<e;d++)_newsq.push(c[d]);return a}(),ucsf.shuttle=function(){var a={},b;return Modernizr.localstorage&&(localStorage.shuttle_start&&(b=document.getElementById("starting_from"),b!==null&&(b.selectedIndex=parseInt(localStorage.shuttle_start,10))),localStorage.shuttle_end&&(b=document.getElementById("ending_at"),b!==null&&(b.selectedIndex=parseInt(localStorage.shuttle_end,10)))),a.save=function(){Modernizr.localstorage&&(localStorage.shuttle_start=document.getElementById("starting_from").selectedIndex,localStorage.shuttle_end=document.getElementById("ending_at").selectedIndex)},a.swap=function(){if(Modernizr.localstorage){var a=localStorage.shuttle_start;localStorage.shuttle_start=localStorage.shuttle_end,localStorage.shuttle_end=a}},a}();