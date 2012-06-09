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

    headlines: function (container, storageId, feedUrl, options) {
        "use strict";
        // template precompiled via Hogan.JS from news.hogan.src.js
        var feed,
        template = new Hogan.Template(function(c,p,i){var _=this;_.b(i=i||"");if(_.s(_.f("feed",c,p,1),c,p,0,9,313,"{{ }}")){_.rs(c,p,function(c,p,_){_.b("<div class=\"menu detailed\"><h2>");_.b(_.v(_.f("title",c,p,0)));_.b("</h2><ol>");if(_.s(_.f("entries",c,p,1),c,p,0,70,290,"{{ }}")){_.rs(c,p,function(c,p,_){_.b("  <li>    <a class=\"no-ext-ind\" rel=\"external\" href=\"");_.b(_.v(_.f("link",c,p,0)));_.b("\"><span class=\"external\">");_.b(_.v(_.f("title",c,p,0)));_.b("</span>    <div class=\"smallprint light\">");_.b(_.v(_.d("dateTime.date",c,p,0)));_.b("</div>    <div class=\"smallprint light\">");_.b(_.v(_.d("dateTime.time",c,p,0)));_.b("</div></a>");});c.pop();}_.b("</ol></div>");});c.pop();}if(!_.s(_.f("feed",c,p,1),c,p,1,0,0,"")){_.b("<div class=\"content\"><p>News feed could not be loaded.</p></div>");};return _.fl();;});

        options = options || {};
        if (typeof google !== "undefined") {

            feed = new google.feeds.Feed(feedUrl);

            if (options.numEntries) {
                feed.setNumEntries(options.numEntries);
            }

            feed.load(function (result) {
                var i,
                    thisEntry,
                    dateTime,
                    dateObject,
                    hours,
                    minutes,
                    designation,
                    content = {};

                if (! result.error) {
                    content = {
                        "feed": this.feed
                    };
                    for (i = 0; i < content.feed.entries.length; i = i + 1) {
                        thisEntry = content.feed.entries[i];
                        dateTime = {};
                        dateObject = new Date(thisEntry.publishedDate);
                        dateTime.date = dateObject.toLocaleDateString();
                        if (options.showTime) {
                            minutes = dateObject.getMinutes();
                            if (minutes < 10) {
                                minutes = "0" + minutes;
                            }
                            hours = dateObject.getHours();
                            designation = hours < 12 ? 'AM' : 'PM';
                            if (hours > 12) {
                                hours = hours - 12;
                            }
                            if (hours === 0) {
                                hours = 12;
                            }
                            
                            dateTime.time = hours + ':' + 
                                minutes + ' ' + 
                                designation;
                        }
                        thisEntry.dateTime = dateTime;
                    }
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

//TODO: minify template-2.0.0
//TODO: minify this