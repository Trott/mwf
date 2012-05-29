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
}
