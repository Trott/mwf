/**
 * Unit tests for JS loaded via vars.php
 *
 * @author trott
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20111015
 *
 * @requires mwf
 * @requires mwf.site
 * @requires qunit
 * 
 */

module("core/vars.php"); 
            
test("mwf.site.root", function()
{
    var root = mwf.site.root;
    ok(root, "mwf.site.root is " + root);
});

test("mwf.site.asset.root", function()
{
    var root = mwf.site.asset.root;
    ok(root, "mwf.site.asset.root is " + root);
});

test("mwf.site.cookie.exists()", function()
{
    equal(mwf.site.cookie.exists('this_cookie_should_not_exist'), false,
        'totally wacky cookie should not exist');
    //@todo: write a cookie and then confirm that exists() can find it
})

test("mwf.site.local.domain()", function()
{
    //@todo: minimal test for domain()
})

test("mwf.site.local.isSameOrigin()", function()
{
    var isSameOrigin = mwf.site.local.isSameOrigin();
    equal(typeof isSameOrigin, 'boolean', 'isSameOrigin() should return a boolean');
})

test("mwf.site.local.cookie.exists()", function()
{
    //@todo: minimal test for local.cookie.exists()
})

test("mwf.site.local.cookie.value()", function()
{
    //@todo: minimal test for local.cookie.value()
})
