ucsf.news=(function(){this.loadFromStorage=function(b){var c;if(Modernizr.localstorage){c=window.localStorage.getItem(b);if(c!==null){return JSON.parse(c)}}return{}};this.render=function(b,d,f,c){var e;e=new google.feeds.Feed(f);if(c.numEntries){e.setNumEntries(c.numEntries)}e.load(function(p){var j,g,o,m,n,h,k,l={};if(!p.error){l={feed:this.feed};for(j=0;j<l.feed.entries.length;j=j+1){g=l.feed.entries[j];o={};m=new Date(g.publishedDate);o.date=m.toLocaleDateString();if(c.showTime){h=m.getMinutes();if(h<10){h="0"+h}n=m.getHours();k=n<12?"AM":"PM";if(n>12){n=n-12}if(n===0){n=12}o.time=n+":"+h+" "+k}g.dateTime=o}if(Modernizr.localstorage){window.localStorage.setItem(d,JSON.stringify(l))}}else{l=ucsf.news.loadFromStorage(d)}b.innerHTML=c.template.render(l)})};this.headlines=function(b,d,e,c){c=c||{};if(!c.template){c.template=new Hogan.Template(function(j,h,g){var f=this;f.b(g=g||"");if(f.s(f.f("feed",j,h,1),j,h,0,9,313,"{{ }}")){f.rs(j,h,function(l,k,i){i.b('<div class="menu detailed"><h2>');i.b(i.v(i.f("title",l,k,0)));i.b("</h2><ol>");if(i.s(i.f("entries",l,k,1),l,k,0,70,290,"{{ }}")){i.rs(l,k,function(o,n,m){m.b('  <li>    <a class="no-ext-ind" rel="external" href="');m.b(m.v(m.f("link",o,n,0)));m.b('"><span class="external">');m.b(m.v(m.f("title",o,n,0)));m.b('</span>    <div class="smallprint light">');m.b(m.v(m.d("dateTime.date",o,n,0)));m.b('</div>    <div class="smallprint light">');m.b(m.v(m.d("dateTime.time",o,n,0)));m.b("</div></a>")});l.pop()}i.b("</ol></div>")});j.pop()}if(!f.s(f.f("feed",j,h,1),j,h,1,0,0,"")){f.b('<div class="content"><p>News feed could not be loaded.</p></div>')}return f.fl()})}if((typeof google!=="undefined")&&(navigator.onLine)){if(typeof google.feeds=="undefined"){google.load("feeds","1",{nocss:true,callback:function(){ucsf.news.render(b,d,e,c)}})}else{this.render(b,d,e,c)}}else{b.innerHTML=c.template.render(ucsf.news.loadFromStorage(d))}};var a=document.createElement("script");a.src="//www.google.com/jsapi";document.getElementsByTagName("head")[0].appendChild(a);return this}());