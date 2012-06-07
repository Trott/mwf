ucsf.news = {
    headlines: function (container, storageId, feedUrl) {
        "use strict";
        // template compiled via Hogan.JS from news.hogan.src.js
        var template = new Hogan.Template(function(c,p,i){var _=this;_.b(i=i||"");_.b("<div class=\"menu detailed\"><h2 clas=\"light\">");_.b(_.v(_.f("title",c,p,0)));_.b("</h2><ol>");if(_.s(_.f("entries",c,p,1),c,p,0,74,130,"{{ }}")){_.rs(c,p,function(c,p,_){_.b("<li><a rel=\"external\" href=\"");_.b(_.v(_.f("link",c,p,0)));_.b("\">");_.b(_.v(_.f("title",c,p,0)));_.b("</a></li>");});c.pop();}_.b("</ol></div>");return _.fl();;}),
            feed;

        if (Modernizr.localstorage) {
            feed = window.localStorage.getItem(storageId);
            if (feed !== null) {
        //TODO: check date on feed and discard if too old 
        }
        }
        
        if (feed === null) {
            feed = new google.feeds.Feed(feedUrl);
            feed.load(function (result) {
                if (! result.error) {
                    container.innerHTML = template.render(this.feed);
                } else {
                    //TODO: sucks, make better
                    alert(result.error.message);
                }
            });
        if (Modernizr.localstorage) {
    //TODO: store the feed in localstorage
    }
    //TODO: render if from localstorage--right now we only handle loading from the network
    }
}
};

//TODO: add relevant stuff to offline appcache manifest. Is that going to even be possible? Does the Feed API require the network?
//    Maybe don't load the feed API unless there's nothing in  localStroage? Urgh....
//TODO: Maybe the thing to do is to try to load the Feed API/feeds with a low timeout and if that fails then use localstorage regardles
//   of how out-of-date it may be?
//TODO: Maybe in view, but "Loading..." should look better and should go away if there's an error.