mwf.userAgent=new function(){this.cookieName=mwf.site.cookie.prefix+"user_agent";var b=navigator.userAgent.toLowerCase();var a=function(c){return b.indexOf(c)!=-1};this.getOS=function(){if(b.match(/(iphone)|(ipad)|(ipod)/)!=null){return"iphone_os"}var d=0,c=["android","blackberry","windows phone os","symbian","webos","mac os x","windows nt","linux"];for(;d<c.length;d++){if(a(c[d])){return c[d].replace(/ /g,"_")}}return""};this.getOSVersion=function(){var d=b,e,f="",c;switch(this.getOS()){case"iphone_os":c=d.match(/(iphone|cpu) os ([\d_]+)/);if(c!=null){f=c[2]}break;case"blackberry":c=d.match(/^mozilla\/5\.0 \(blackberry;.* version\/([\d\.]+)/);if(c!=null){f=c[1];break}else{if(d.substring(0,10)=="blackberry"){e=d.indexOf("/")+1;f=d.substring(e,d.indexOf(" ",e))}}break;case"android":if((e=d.indexOf("android "))!=-1){e+=8;f=d.substring(e,Math.min(d.indexOf(" ",e),d.indexOf(";",e),d.indexOf("-",e)))}break;case"windows_phone_os":if((e=d.indexOf("windows phone os "))!=-1){e+=17;f=d.substring(e,d.indexOf(";",e))}break;case"symbian":c=d.match(/symbianos\/([\d\.]+)/);if(c!=null){f=c[1]}break;case"webos":if((e=d.indexOf("webos/"))!=-1){e+=6;f=d.substring(e,Math.min(d.indexOf(";",e)))}break}return f.replace(/\_/g,".")};this.getBrowser=function(){if(a("safari")){return this.getOS()=="android"?"android_webkit":"safari"}var c,d=["chrome","iemobile","camino","seamonkey","firefox","opera mobi","opera mini"];for(c=0;c<d.length;c++){if(a(d[c])){return d[c].replace(/ /g,"_")}}return""};this.getBrowserEngine=function(){if(a("applewebkit")){return"webkit"}var d=0,c=["trident","gecko","presto"];for(;d<c.length;d++){if(a(c[d])){return c[d]}}return""};this.getBrowserEngineVersion=function(){var d=new RegExp(this.getBrowserEngine()+"/([\\d\\.]+)");var c=d.exec(b);return c!=null?c[1]:""};this.isNative=function(){return/ mwf\-native\-[a-z]*\/[\d\.]*$/.test(b)};this.generateCookieContent=function(){var d;var c="{";c+='"s":"'+navigator.userAgent+'"';if(d=this.getOS()){c+=',"os":"'+d+'"'}if(d=this.getOSVersion()){c+=',"osv":"'+d+'"'}if(d=this.getBrowser()){c+=',"b":"'+d+'"'}if(d=this.getBrowserEngine()){c+=',"be":"'+d+'"'}if(d=this.getBrowserEngineVersion()){c+=',"bev":"'+d+'"'}c+="}";return c}};