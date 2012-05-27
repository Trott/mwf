<?php

/**
 * Test class for JS_Vars_Helper.
 * 
 * @author trott
 * @copyright Copyright (c) 2012 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120211
 *
 * @uses PHPUnit_Framework_TestCase
 * @uses JS_Vars_Helper
 */
class JS_Vars_HelperTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        $_SERVER['HTTP_HOST'] = 'm.example.edu:8080';
        require_once dirname(__FILE__) . '/../../../../../root/assets/lib/config.class.php';
        Config::set('global', 'cookie_prefix', 'mwftest_');
        require_once dirname(__FILE__) . '/../../../../../root/assets/lib/cookie.class.php';
        require_once dirname(__FILE__) . '/../../../../../root/assets/lib/js_vars_helper.class.php';
    }

    /**
     * @runInSeparateProcess
     * @test
     */
    public function getSiteUrl_vanillaSiteUrl_vanillaSiteUrl() {
        Config::set('global', 'site_url', 'http://m.example.edu:8080/foo');
        $this->assertRegExp('/^[\'"]http:\\\\?\/\\\\?\/m\.example\.edu:8080\\\\?\/foo[\'"]/', JS_Vars_Helper::get_site_url());
    }

    /**
     * @runInSeparateProcess
     * @test
     */
    public function getSiteAssetsUrl_vanillaSiteAssetsUrl_vanillaSiteAssetsUrl() {
        Config::set('global', 'site_assets_url', 'http://m.example.edu:8080/foo/assets');
        $this->assertRegExp('/^[\'"]http:\\\\?\/\\\\?\/m\.example\.edu:8080\\\\?\/foo\\\\?\/assets[\'"]/', JS_Vars_Helper::get_site_asset_url());
    }

    /**
     * @runInSeparateProcess
     * @test
     */
    public function getLocalSiteUrl_vanillaSiteUrl_pathOnly() {
        Config::set('global', 'site_url', 'http://m.example.edu:8080/foo');
        $this->assertRegExp('/^[\'"]foo[\'"]$/', JS_Vars_Helper::get_local_site_url());
    }

    /**
     * @runInSeparateProcess
     * @test
     */
    public function getLocalSiteAssetsUrl_vanillaSiteAssetsUrl_pathOnly() {
        Config::set('global', 'site_assets_url', 'http://m.example.edu:8080/foo/assets');
        $this->assertRegExp('/^[\'"]foo\\\\?\/assets[\'"]$/', JS_Vars_Helper::get_local_site_asset_url());
    }

    /**
     * @runInSeparateProcess
     * @test
     */
    public function getLocalstoragePrefix_foo_foo() {
        Config::set('global', 'local_storage_prefix', 'foo');
        $this->assertRegExp('/^[\'"]foo[\'"]$/', JS_Vars_Helper::get_localstorage_prefix());
    }

    /**
     * @runInSeparateProcess
     * @test
     */
    public function getAnalyticsKey_false_null() {
        Config::set('analytics', 'account', false);
        $this->assertEquals('null', JS_Vars_Helper::get_analytics_key());
    }

    /**
     * @runInSeparateProcess
     * @test
     */
    public function getAnalyticsKey_key_key() {
        Config::set('analytics', 'account', 'UA-123456-7');
        $this->assertRegExp('/^[\'"]UA\-123456\-7[\'"]$/', JS_Vars_Helper::get_analytics_key());
    }

    /**
     * @runInSeparateProcess
     * @test
     */
    public function testGetPathKeys_empty_empty() {
        Config::set('analytics', 'path_account', array());
        Config::set('analytics', 'path_start', array());
        $this->assertEquals('[]', JS_Vars_Helper::get_path_keys());
    }

    /**
     * @runInSeparateProcess
     * @test
     */
    public function testGetPathKeys_values_values() {
        Config::set('analytics', 'path_account', array('UA-123456-7', 'UA-890123-4'));
        Config::set('analytics', 'path_start', array('/foo/', '/bar/'));
        $path_keys = json_decode(JS_Vars_Helper::get_path_keys());
        $this->assertEquals('UA-123456-7', $path_keys[0]->a);
        $this->assertEquals('/foo/', $path_keys[0]->s);
        $this->assertEquals('UA-890123-4', $path_keys[1]->a);
        $this->assertEquals('/bar/', $path_keys[1]->s);
    }

    
    /**
     * @runInSeparateProcess
     * @test
     */
    public function getMobileMaxWidth_799_799() {
        Config::set('mobile', 'max_width', '799');
        $this->assertSame('799', JS_Vars_Helper::get_mobile_max_width());
    }
    
    
    /**
     * @runInSeparateProcess
     * @test
     */
    public function getMobileMaxHeight_599_599() {
        Config::set('mobile', 'max_height', '599');
        $this->assertSame('599', JS_Vars_Helper::get_mobile_max_height());
    }
}
