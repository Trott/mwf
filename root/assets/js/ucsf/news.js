ucsf.news=(function(){this.loadFromStorage=function(b){var c;if(Modernizr.localstorage){c=window.localStorage.getItem(b);if(c!==null){return JSON.parse(c)}}return{}};this.render=function(b,d,f,c){var e;e=new google.feeds.Feed(f);if(c.numEntries){e.setNumEntries(c.numEntries)}e.load(function(p){var j,g,o,m,n,h,k,l={};if(!p.error){l={feed:this.feed};for(j=0;j<l.feed.entries.length;j=j+1){g=l.feed.entries[j];o={};m=new Date(g.publishedDate);o.date=m.toLocaleDateString();if(c.showTime){h=m.getMinutes();if(h<10){h="0"+h}n=m.getHours();k=n<12?"AM":"PM";if(n>12){n=n-12}if(n===0){n=12}o.time=n+":"+h+" "+k}g.dateTime=o}if(Modernizr.localstorage){window.localStorage.setItem(d,JSON.stringify(l))}}else{l=ucsf.news.loadFromStorage(d)}b.innerHTML=template.render(l)})};this.headlines=function(b,d,f,c){var e;c=c||{};if(c.template){e=c.template}else{e=new Hogan.Template(function(k,j,h){var g=this;g.b(h=h||"");if(g.s(g.f("feed",k,j,1),k,j,0,9,313,"{{ }}")){g.rs(k,j,function(m,l,i){i.b('<div class="menu detailed"><h2>');i.b(i.v(i.f("title",m,l,0)));i.b("</h2><ol>");if(i.s(i.f("entries",m,l,1),m,l,0,70,290,"{{ }}")){i.rs(m,l,function(q,o,n){n.b('  <li>    <a class="no-ext-ind" rel="external" href="');n.b(n.v(n.f("link",q,o,0)));n.b('"><span class="external">');n.b(n.v(n.f("title",q,o,0)));n.b('</span>    <div class="smallprint light">');n.b(n.v(n.d("dateTime.date",q,o,0)));n.b('</div>    <div class="smallprint light">');n.b(n.v(n.d("dateTime.time",q,o,0)));n.b("</div></a>")});m.pop()}i.b("</ol></div>")});k.pop()}if(!g.s(g.f("feed",k,j,1),k,j,1,0,0,"")){g.b('<div class="content"><p>News feed could not be loaded.</p></div>')}return g.fl()})}if(typeof google!=="undefined"){if(typeof google.feeds=="undefined"){google.load("feeds","1",{nocss:true,callback:function(){ucsf.news.render(b,d,f,c)}})}else{this.render(b,d,f,c)}}else{alert("wat");b.innerHTML=e.render(ucsf.news.loadFromStorage(d))}};var a=document.createElement("script");a.src="//www.google.com/jsapi";document.getElementsByTagName("head")[0].appendChild(a);return this}());