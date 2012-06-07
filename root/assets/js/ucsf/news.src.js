ucsf.news = {
    
    loadFromStorage: function(storageId) {
        var stored;
        if (Modernizr.localstorage) {
            stored = window.localStorage.getItem(storageId);
            if (stored !== null) {
                return JSON.parse(stored);
            }
        }
        return {};
    },
    
    headlines: function (container, storageId, feedUrl) {
        "use strict";
        // template precompiled via Hogan.JS from news.hogan.src.js
        var template = new Hogan.Template(function(c,p,i){var _=this;_.b(i=i||"");if(_.s(_.f("feed",c,p,1),c,p,0,9,149,"{{ }}")){_.rs(c,p,function(c,p,_){_.b("<div class=\"menu detailed\"><h2>");_.b(_.v(_.f("title",c,p,0)));_.b("</h2><ol>");if(_.s(_.f("entries",c,p,1),c,p,0,70,126,"{{ }}")){_.rs(c,p,function(c,p,_){_.b("<li><a rel=\"external\" href=\"");_.b(_.v(_.f("link",c,p,0)));_.b("\">");_.b(_.v(_.f("title",c,p,0)));_.b("</a></li>");});c.pop();}_.b("</ol></div>");});c.pop();}if(!_.s(_.f("feed",c,p,1),c,p,1,0,0,"")){_.b("<div class=\"content\"><p>News feed could not be loaded.</p></div>");};return _.fl();;}),
        feed;

        if (typeof google !== "undefined") {
            feed = new google.feeds.Feed(feedUrl);
            feed.load(function (result) {
                var content = {};

                if (! result.error) {
                    content = {
                        "feed": this.feed
                    };
                    if (Modernizr.localstorage) {
                        window.localStorage.setItem(storageId, JSON.stringify(content));
                    }
                } else {
                    content = ucsf.news.loadFromStorage(storageId);
                }
                container.innerHTML = template.render(content);
            });
        } else {
            container.innerHTML = template.render(ucsf.news.loadFromStorage(storageId));
        }
    }
};

//TODO: google is undefined error when loaded without network
//TODO: whoa, what's up with Modernizr not being defined in the shuttle planner?
//TODO: get it to work on home page, at #/il/news, and at /news
//TODO: maybe add some noscript value?