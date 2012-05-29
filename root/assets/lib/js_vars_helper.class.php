<?php

/**
 * Helper methods.  Mostly it makes Config stuff from PHP accessible
 *     via JavaScript.
 *
 * @package core
 * 
 * @author ebollens
 * @author trott
 * @copyright Copyright (c) 2010-2012 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120208
 *
 * @uses Config
 * @uses HTTPS
 */
require_once(dirname(dirname(__FILE__)) . '/config.php');
require_once(dirname(__FILE__) . '/https.class.php');

/**
 * Class that generates JS data from PHP data.
 */
class JS_Vars_Helper {
    /**
     *
     * @return string 
     */
    public static function get_site_url() {
        $site_url = Config::get('global', 'site_url');
        if (strpos($site_url, '://') !== false || substr($site_url, 0, 2) == '//') {
            if (HTTPS::is_https()) {
                $site_url = HTTPS::convert_path($site_url);
            }
        } else {
            $site_url = '//' . self::get_raw_cookie_domain() . (substr($site_url, 0, 1) != '/' ? '/' : '') . $site_url;
        }
        return json_encode($site_url);
    }

    /**
     *
     * @return string 
     */
    public static function get_site_asset_url() {
        $site_asset_url = Config::get('global', 'site_assets_url');
        if (strpos($site_asset_url, '://') !== false || substr($site_asset_url, 0, 2) == '//') {
            if (HTTPS::is_https()) {
                $site_asset_url = HTTPS::convert_path($site_asset_url);
            }
        }
        else
            $site_asset_url = '//' . self::get_raw_cookie_domain() . (substr($site_asset_url, 0, 1) != '/' ? '/' : '') . $site_asset_url;
        return json_encode($site_asset_url);
    }

    /**
     *
     * @return string 
     */
    public static function get_local_site_url() {
        $local_site_url = Config::get('global', 'site_url');
        if (strpos($local_site_url, '://') !== false || substr($local_site_url, 0, 2) == '//') {
            if (($scheme_pos = strpos($local_site_url, '//')) !== false) {
                if (($pos = strpos($local_site_url, '/', $scheme_pos + 2)) !== false && strlen($local_site_url) > ++$pos)
                    $local_site_url = substr($local_site_url, $pos);
                else
                    $local_site_url = '';
            }
        }
        return json_encode($local_site_url);
    }

    /**
     *
     * @return string 
     */
    public static function get_local_site_asset_url() {
        $local_site_asset_url = Config::get('global', 'site_assets_url');
        if (strpos($local_site_asset_url, '://') !== false || substr($local_site_asset_url, 0, 2) == '//') {
            if (($scheme_pos = strpos($local_site_asset_url, '//')) !== false) {
                if (($pos = strpos($local_site_asset_url, '/', $scheme_pos + 2)) !== false && strlen($local_site_asset_url) > ++$pos)
                    $local_site_asset_url = substr($local_site_asset_url, $pos);
                else
                    $local_site_asset_url = '';
            }
        }
        return json_encode($local_site_asset_url);
    }

    /**
     *
     * @return string 
     */
    public static function get_localstorage_prefix() {
        return json_encode(Config::get('global', 'local_storage_prefix'));
    }
}