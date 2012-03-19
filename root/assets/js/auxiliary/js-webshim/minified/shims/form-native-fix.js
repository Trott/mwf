jQuery.webshims.register("form-native-fix",function(b,d,h,j,p){if(Modernizr.formvalidation&&!Modernizr.bugfreeformvalidation){var k=b.browser.webkit,o=k&&534.5>=d.browserVersion,q=o?"input:invalid-element, select:invalid-element, textarea:invalid-element":":invalid",i=[],g,l;if(h.addEventListener){var m=p,n=!1;h.addEventListener("submit",function(c){if(!n&&c.target.checkValidity&&null==b.attr(c.target,"novalidate")&&(b(q,c.target).length&&(b(c.target).unbind("submit.preventInvalidSubmit").bind("submit.preventInvalidSubmit",
function(a){null==b.attr(c.target,"novalidate")&&(a.stopImmediatePropagation(),k&&a.preventDefault());c.target&&b(c.target).unbind("submit.preventInvalidSubmit")}),d.moveToFirstEvent(c.target,"submit")),!h.opera))d.fromSubmit=!0,b(c.target).checkValidity(),d.fromSubmit=!1},!0);j=function(c){null!=b.attr(c.target,"formnovalidate")&&(m&&clearTimeout(m),n=!0,m=setTimeout(function(){n=!1},20))};h.addEventListener("click",j,!0);h.addEventListener("touchstart",j,!0);h.addEventListener("touchend",j,!0)}b(document).bind("firstinvalidsystem",
function(b,a){if(l=a.form)g=!1,i=[],d.fromSubmit&&(g=a)}).bind("invalid",function(b){-1==i.indexOf(b.target)?i.push(b.target):b.stopImmediatePropagation()}).bind("lastinvalid",function(c,a){var e=a.invalidlist[0];e&&(k||!Modernizr.requiredSelect&&b.nodeName(e,"select"))&&document.activeElement&&e!==document.activeElement&&g&&!g.isInvalidUIPrevented()&&d.validityAlert.showFor(e);g=!1;i=[];l&&b(l).unbind("submit.preventInvalidSubmit")});(function(){o&&(["input","textarea","select"].forEach(function(c){var a=
d.defineNodeNameProperty(c,"checkValidity",{prop:{value:function(){if(!this.willValidate)return!0;var c=(b.prop(this,"validity")||{valid:!0}).valid;d.fromCheckValidity=!0;!c&&a.prop._supvalue&&a.prop._supvalue.call(this)&&b(this).trigger("invalid");d.fromCheckValidity=!1;return c}}})}),d.defineNodeNameProperty("form","checkValidity",{prop:{value:function(){var c=!0;b(this.elements||[]).getNativeElement().each(function(){!1===b(this).checkValidity()&&(c=!1)});return c}}}))})();Modernizr.requiredSelect||
d.ready("form-extend",function(){d.addValidityRule("valueMissing",function(c,a,e,d){if("select"==e.nodeName&&!a&&c.prop("required")){if(!e.type)e.type=c[0].type;if(a=!a)if(!(a=0>c[0].selectedIndex))c=c[0],a="select-one"==c.type&&2>c.size?b("> option:first-child",c).prop("selected"):!1;if(a)return!0}return d.valueMissing});d.defineNodeNamesBooleanProperty(["select"],"required",{set:function(c){this.setAttribute("aria-required",c?"true":"false");b.prop(this,"validity")},initAttr:!0})});"formTarget"in
document.createElement("input")||function(){var c={submit:1,button:1,image:1},a={};[{name:"enctype",limitedTo:{"application/x-www-form-urlencoded":1,"multipart/form-data":1,"text/plain":1},defaultProp:"application/x-www-form-urlencoded",proptype:"enum"},{name:"method",limitedTo:{get:1,post:1},defaultProp:"get",proptype:"enum"},{name:"action",proptype:"url"},{name:"target"}].forEach(function(e){var d="form"+(e.propName||e.name).replace(/^[a-z]/,function(b){return b.toUpperCase()}),f="form"+e.name,
h=e.name,g="click.webshimssubmittermutate"+h,j=function(){if("form"in this&&c[this.type]){var a=b.prop(this,"form");if(a){var g=b.attr(this,f);if(null!=g&&(!e.limitedTo||g.toLowerCase()===b.prop(this,d))){var i=b.attr(a,h);b.attr(a,h,g);setTimeout(function(){null!=i?b.attr(a,h,i):b(a).removeAttr(h)},9)}}}};switch(e.proptype){case "url":var i=document.createElement("form");a[d]={prop:{set:function(a){b.attr(this,f,a)},get:function(){var a=b.attr(this,f);if(null==a)return"";i.setAttribute("action",
a);return i.action}}};break;case "boolean":a[d]={prop:{set:function(a){a?b.attr(this,"formnovalidate","formnovalidate"):b(this).removeAttr("formnovalidate")},get:function(){return null!=b.attr(this,"formnovalidate")}}};break;case "enum":a[d]={prop:{set:function(a){b.attr(this,f,a)},get:function(){var a=b.attr(this,f);return!a||(a=a.toLowerCase())&&!e.limitedTo[a]?e.defaultProp:a}}};break;default:a[d]={prop:{set:function(a){b.attr(this,f,a)},get:function(){var a=b.attr(this,f);return null!=a?a:""}}}}a[f]||
(a[f]={});a[f].attr={set:function(c){a[f].attr._supset.call(this,c);b(this).unbind(g).bind(g,j)},get:function(){return a[f].attr._supget.call(this)}};a[f].initAttr=!0;a[f].removeAttr={value:function(){b(this).unbind(g);a[f].removeAttr._supvalue.call(this)}}});d.defineNodeNamesProperties(["input","button"],a)}()}});
