/**
 * Unit tests for mwf.user_agent
 *
 * @author trott
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20111015
 *
 * @requires mwf
 * @requires mwf.user_agent
 * @requires qunit
 * 
 */

module("core/user_agent.js"); 
            
test("mwf.user_agent.is_iphone_os() DEPRECATED", function()
{    
    equal(typeof mwf.user_agent.is_iphone_os(), 'boolean', 'is_iphone_os() should return a Boolean');
});

test("mwf.user_agent.is_webkit_engine() DEPRECATED", function()
{    
    equal(typeof mwf.user_agent.is_webkit_engine(), 'boolean', 'is_webkit_engine() should return a Boolean');
});

test("mwf.user_agent.get_browser() DEPRECATED", function()
{   
    equal(typeof mwf.user_agent.get_browser(), 'string',' get_browser() should return a string');
});

test("mwf.user_agent.get_browser_version() DEPRECATED", function()
{   
    equal(typeof mwf.user_agent.get_browser_version(), 'boolean',' get_browser() should return a Boolean');
});

test("mwf.user_agent.get_os() DEPRECATED", function()
{   
    equal(typeof mwf.user_agent.get_os(), 'string', 'get_os() should return a string');
});

test("mwf.user_agent.get_os_version() DEPRECATED", function()
{   
    equal(typeof mwf.user_agent.get_os_version(), 'string', 'get_os_version() should return a string');
});