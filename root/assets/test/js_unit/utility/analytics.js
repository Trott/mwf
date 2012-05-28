/**
 * Unit tests for mwf.analytics
 *
 * @author trott
 * @copyright Copyright (c) 2012 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120226
 *
 * @requires mwf
 * @requires mwf.analytics
 * @requires qunit
 * 
 */

module("utility/analytics.js", {
    setup: function() {
        this._gaq_orig = _gaq;
        _gaq = [];
        this.key_orig = mwf.analytics.key;
        this.pathKeys_orig = mwf.analytics.pathKeys;
    },
    teardown: function() {
        _gaq = this._gaq_orig;
        mwf.analytics.key = this.key_orig;
        mwf.analytics.pathKeys = this.pathKeys_orig
    }
}); 

test("mwf.analytics.pathKeys is in expected format", function()
{
    // Use the var stashed by setup()
    var pathKeys = this.pathKeys_orig;
    ok(pathKeys instanceof Array, "pathKeys should be an array");
    for (var i=0; i<pathKeys.length; i++) {
        ok(pathKeys[i] instanceof Object, "pathKeys elements should be objects");
        if (pathKeys[i].hasOwnProperty('a')) {
            ok(typeof pathKeys[i].a == "string", "pathKeys 'a' property should be a string");
        } else {
            ok(false,"pathKeys elements should have 'a' (account) property")
        }
        if (pathKeys[i].hasOwnProperty('s')) {
            ok(typeof pathKeys[i].s == "string", "pathKeys 's' property should be a string");
        } else {
            ok(false,"pathKeys elements should have 's' (account) property")
        }
    }
})

test("mwf.analytics.key is in expected format", function()
{
    // Use the var stashed by setup()
    var key = this.key_orig;
    ok(typeof key == "string" || key === null, "key should be a string or null");
})

test("mwf.analytics.trackPageview() no keys", function()
{
    mwf.analytics.key = null;
    mwf.analytics.pathKeys = [];
    mwf.analytics.trackPageview("/foo.html");
    same(_gaq, [], "no reporting should occur if keys are not set");
});

test("mwf.analytics.trackPageview() global key only", function()
{
    mwf.analytics.key = "UA-XXXXXX-X";
    mwf.analytics.pathKeys = [];
    mwf.analytics.trackPageview("/foo.html");
    same(_gaq, 
        [["_trackPageview", "/foo.html"]], 
        "reporting should occur if global key is set");
})

test("mwf.analytics.trackPageview() path key only, no match", function()
{
    mwf.analytics.key = null;
    mwf.analytics.pathKeys = [{
        a:"UA-XXXXXX-X", 
        s:"/foo/"
    }];
    mwf.analytics.trackPageview("/bar.html");
    same(_gaq, 
        [], 
        "no reporting should occur if path key is set but path does not match");
})

test("mwf.analytics.trackPageview() path key only, match", function()
{
    mwf.analytics.key = null;
    mwf.analytics.pathKeys = [{
        a:"UA-XXXXXX-X", 
        s:"/foo/"
    }];
    mwf.analytics.trackPageview("/foo/bar.html");
    same(_gaq, 
        [["t0._trackPageview", "/foo/bar.html"]], 
        "reporting should occur if path key is set and path matches");
})

test("mwf.analytics.trackPageview() global and path keys, no path match", function()
{
    mwf.analytics.key = "UA-XXXXXX-X";
    mwf.analytics.pathKeys = [{
        a:"UA-YYYYYY-Y", 
        s:"/foo/"
    }];
    mwf.analytics.trackPageview("/bar/baz.html");
    same(_gaq, 
        [["_trackPageview", "/bar/baz.html"]], 
        "reporting should occur for global key only");
})

test("mwf.analytics.trackPageview() global and path keys, path match", function()
{
    mwf.analytics.key = "UA-XXXXXX-X";
    mwf.analytics.pathKeys = [{
        a:"UA-YYYYYY-Y", 
        s:"/bar/"
    }];
    mwf.analytics.trackPageview("/bar/baz.html");
    same(_gaq, 
        [["_trackPageview", "/bar/baz.html"],["t0._trackPageview", "/bar/baz.html"]], 
        "reporting should occur if for both keys");
})

test("mwf.analytics.trackPageview(), no global key, multiple path keys with no match", function()
{
    mwf.analytics.key = null;
    mwf.analytics.pathKeys = [{
        a:"UA-XXXXXX-X", 
        s:"/foo/"
    },{
        a:"UA-ZZZZZZ-Z", 
        s:"/bar/"
    }];
    mwf.analytics.trackPageview("/bar.html");
    same(_gaq, 
        [], 
        "no reporting should occur");
})

test("mwf.analytics.trackPageview(), global key, multiple path keys with no match", function()
{
    mwf.analytics.key = "UA-YYYYYY-Y";
    mwf.analytics.pathKeys = [{
        a:"UA-XXXXXX-X", 
        s:"/foo/"
    },{
        a:"UA-ZZZZZZ-Z", 
        s:"/bar/"
    }];
    mwf.analytics.trackPageview("/bar.html");
    same(_gaq, 
        [["_trackPageview", "/bar.html"]], 
        "reporting should occur for global key only");
})

test("mwf.analytics.trackPageview(), no global key, multiple path keys with single match", function()
{
    mwf.analytics.key = null;
    mwf.analytics.pathKeys = [{
        a:"UA-XXXXXX-X", 
        s:"/foo/"
    },{
        a:"UA-ZZZZZZ-Z", 
        s:"/bar/"
    }];
    mwf.analytics.trackPageview("/foo/bar.html");
    same(_gaq, 
        [["t0._trackPageview", "/foo/bar.html"]], 
        "reporting should occur only for matching key");
})

test("mwf.analytics.trackPageview(), global key, multiple path keys with single match", function()
{
    mwf.analytics.key = "UA-YYYYYY-Y";
    mwf.analytics.pathKeys = [{
        a:"UA-XXXXXX-X", 
        s:"/foo/"
    },{
        a:"UA-ZZZZZZ-Z", 
        s:"/bar/"
    }];
    mwf.analytics.trackPageview("/foo/bar.html");
    same(_gaq, 
        [["_trackPageview", "/foo/bar.html"],["t0._trackPageview", "/foo/bar.html"]], 
        "reporting should occur only for global key and matching key");
})

test("mwf.analytics.trackPageview(), no global key, multiple path keys with multiple matches", function()
{
    mwf.analytics.key = null;
    mwf.analytics.pathKeys = [{
        a:"UA-XXXXXX-X", 
        s:"/foo/bar/"
    },{
        a:"UA-ZZZZZZ-Z", 
        s:"/foo/"
    }];
    mwf.analytics.trackPageview("/foo/bar/baz.html");
    same(_gaq, 
        [["t0._trackPageview", "/foo/bar/baz.html"],["t1._trackPageview", "/foo/bar/baz.html"]], 
        "reporting should occur for multiple matching keys");
})

test("mwf.analytics.trackPageview(), global key, multiple path keys with multiple matches", function()
{
    mwf.analytics.key = "UA-YYYYYY-Y";
    mwf.analytics.pathKeys = [{
        a:"UA-XXXXXX-X", 
        s:"/foo/bar/"
    },{
        a:"UA-ZZZZZZ-Z", 
        s:"/foo/"
    },{
        a:"UA-AAAAAA-A", 
        s:"/whatever/"
    }];
    mwf.analytics.trackPageview("/foo/bar/baz.html");
    same(_gaq, 
        [["_trackPageview", "/foo/bar/baz.html"], ["t0._trackPageview", "/foo/bar/baz.html"], ["t1._trackPageview", "/foo/bar/baz.html"]], 
        "reporting should occur for global key and multiple matching keys");
})

test("mwf.analytics constructor populates account key", function() {
    mwf.analytics.key = "UA-XXXXXX-X";
    _gaq = [];
    var save = _gaq;
    mwf.analytics.init();
    var success = false;
    for (var i=0; i<save.length; i++)
        if (save[i][0]=="_setAccount" && save[i][1]=="UA-XXXXXX-X")
            success=true;
    ok(success,'key should be registered in init()');

})

test("mwf.analytics constructor populates path keys", function() {
    mwf.analytics.pathKeys = [{
        a:"UA-XXXXXX-X",
        s:"/whatever"
    }];
    _gaq = [];
    var save = _gaq;
    mwf.analytics.init();
    var success = false;
    for (var i=0; i<save.length; i++)
        if (save[i][0]=="t0._setAccount" && save[i][1]=="UA-XXXXXX-X")
            success=true;
    ok(success,'key should be registered in init()');
})

test("mwf.analytics constructor notes native app", function() {
    _gaq = [];
    var save = _gaq;
    mwf.analytics.init('some random UA string prefix and then mwf-native-iphone/2.1');
    var success = false;
   
    for (var i=0; i<save.length; i++)
        if (save[i][0]=='_setCustomVar' && save[i][1]==1 && save[i][2]=='mwf_native_client'
            && save[i][3]==='1')
            success=true;
    ok(success, 'analytics constructor should note native app');
})