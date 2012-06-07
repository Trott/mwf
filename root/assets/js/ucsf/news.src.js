ucsf.news = {
    headlines: function (container, storageId, feedUrl) {
        "use strict";
        // template precompiled via Hogan.JS from news.hogan.src.js
        var template = new Hogan.Template(function(c,p,i){
            var _=this;
            _.b(i=i||"");
            _.b("<div class=\"menu detailed\"><h2 clas=\"light\">");
            _.b(_.v(_.f("title",c,p,0)));
            _.b("</h2><ol>");
            if(_.s(_.f("entries",c,p,1),c,p,0,74,130,"{{ }}")){
                _.rs(c,p,function(c,p,_){
                    _.b("<li><a rel=\"external\" href=\"");
                    _.b(_.v(_.f("link",c,p,0)));
                    _.b("\">");
                    _.b(_.v(_.f("title",c,p,0)));
                    _.b("</a></li>");
                });
                c.pop();
            }
            _.b("</ol></div>");
            return _.fl();;
        }),
        feed;
        
        feed = new google.feeds.Feed(feedUrl);
        feed.load(function (result) {
            var content = {},
            stored;
            if (! result.error) {
                content = this.feed;
                if (Modernizr.localstorage) {
                    window.localStorage.setItem(storageId, JSON.stringify(content));
                }
            } else {
                if (Modernizr.localstorage) {
                    stored = window.localStorage.getItem(storageId);
                    if (stored !== null) {
                        content = JSON.parse(stored);
                    }
                }
            }
            //TODO: add error message on empty object to template 
            container.innerHTML = template.render(content);
        });
    }
};

//TODO: minimize this thing
//TODO: add relevant stuff to offline appcache manifest. Is that going to even be possible? Does the Feed API require the network?
//    Maybe don't load the feed API unless there's nothing in  localStroage? Urgh....
//TODO: Maybe the thing to do is to try to load the Feed API/feeds with a low timeout and if that fails then use localstorage regardles
//   of how out-of-date it may be?
//TODO: Maybe in view, but "Loading..." should look better and should go away if there's an error.
//TODO: google is undefined error when loaded without network
//TODO: whoa, what's up with Modernizr not being defined in the shuttle planner?