ucsf.news = {
    headlines: function (container, storageId, feedUrl) {
        
        "use strict";
        // template compiled via Hogan.JS from news.hogan.src.js
        var template = new Hogan.Template(function(c,p,i){var _=this;_.b(i=i||"");_.b("<div class=\"menu detailed\"><h2 clas=\"light\">");_.b(_.v(_.f("title",c,p,0)));_.b("</h2><ol>");if(_.s(_.f("entries",c,p,1),c,p,0,74,115,"{{ }}")){_.rs(c,p,function(c,p,_){_.b("<li><a href=\"");_.b(_.v(_.f("link",c,p,0)));_.b("\">");_.b(_.v(_.f("title",c,p,0)));_.b("</a></li>");});c.pop();}_.b("</ol></div>");return _.fl();;}),
        feed;

        if (Modernizr.localstorage) {
            feed = window.localStorage.getItem(storageId);
            if (feed !== null) {
        //TODO: check date on feed and discard if too old 
        }
        }
        
        if (feed === null) {
            var feed = new google.feeds.Feed(feedUrl);
            feed.load(function (result) {
                if (! result.error) {
                    //var container = document.getElementById("feed");
                    container.innerHTML = template.render(this.feed);
                    console.log(this);
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


//TODO: move to view?
function loadSection() {
    ucsf.news.headlines(document.getElementById('ucsf-news'),'feed_ucsf_news','http://feeds.feedburner.com/UCSF_News');
    ucsf.news.headlines(document.getElementById('media-coverage'),'feed_media_coverage','http://feeds.feedburner.com/UCSF_Media_Coverage');
}
google.setOnLoadCallback(loadSection);