ucsf.news={loadFromStorage:function(a){var b;if(Modernizr.localstorage){b=window.localStorage.getItem(a);if(b!==null){return JSON.parse(b)}}return{}},headlines:function(a,b,e){var c=new Hogan.Template(function(j,h,g){var f=this;f.b(g=g||"");if(f.s(f.f("feed",j,h,1),j,h,0,9,149,"{{ }}")){f.rs(j,h,function(l,k,i){i.b('<div class="menu detailed"><h2>');i.b(i.v(i.f("title",l,k,0)));i.b("</h2><ol>");if(i.s(i.f("entries",l,k,1),l,k,0,70,126,"{{ }}")){i.rs(l,k,function(o,n,m){m.b('<li><a rel="external" href="');m.b(m.v(m.f("link",o,n,0)));m.b('">');m.b(m.v(m.f("title",o,n,0)));m.b("</a></li>")});l.pop()}i.b("</ol></div>")});j.pop()}if(!f.s(f.f("feed",j,h,1),j,h,1,0,0,"")){f.b('<div class="content"><p>News feed could not be loaded.</p></div>')}return f.fl()}),d;if(typeof google!=="undefined"){d=new google.feeds.Feed(e);d.load(function(f){var g={};if(!f.error){g={feed:this.feed};if(Modernizr.localstorage){window.localStorage.setItem(b,JSON.stringify(g))}}else{g=ucsf.news.loadFromStorage(b)}a.innerHTML=c.render(g)})}else{a.innerHTML=c.render(ucsf.news.loadFromStorage(b))}}};