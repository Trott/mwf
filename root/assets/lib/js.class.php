<?php

/**
 * Static loader that manages Javascript assets. For local assets, it provides
 * ways to both include a script directly and to write it into the DOM via a
 * script tag. For remote assets, it only provides the latter, requiring such
 * assets to be loaded into the DOM and not included directly. This promotes
 * better caching properties among externally-hosted files that may be cached.
 * This loader also includes several key functions that load assets either
 * externally based on $_external[$key] or else from within the Javascript
 * asset folder.
 *
 * @package core
 * @subpackage handler
 *
 * @author ebollens
 * @copyright Copyright (c) 2010-11 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120310
 * 
 * @uses HTTPS
 */
require_once(dirname(__FILE__) . '/https.class.php');

class JS {

    /**
     * Boolean that denotes if init() has been invoked.
     * 
     * @var bool
     */
    private static $_init = false;

    /**
     * A mapping defined in init() of keys to external script files.
     * 
     * @var array
     */
    private static $_external = array();

    /**
     * Stores a set of loaded external scripts to prevent multiple imports.
     * 
     * @var array 
     */
    private static $_external_loaded = array();

    /**
     * An array by key that contains arrays of libraries that they library
     * by key name depends on.
     * 
     * @var array
     */
    private static $_dependencies = array();

    /**
     * Static, one-time firing initializer that defines the mappings for
     * external libraries and for dependencies.
     * 
     * @return void
     */
    public static function init() {
        if (self::$_init)
            return;

        /**
         * External libraries by key
         */
        self::$_external['jquery'] = 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js';
        self::$_external['jquery_ui'] = 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js';

        /**
         * Dependencies by key
         */
        self::$_dependencies['jquery_ui'] = array('jquery');
        self::$_dependencies['jquery_ui_touch_punch'] = array('jquery_ui');
        self::$_dependencies['messages'] = array('jquery');
        self::$_dependencies['customizableMenu'] = array('preferences');
    }

    /**
     * Loads a file under assets/js and returns true or else it returns false.
     * Unless $allow_multiple is set true, it will otherwise only include the
     * file once.
     * 
     * @param string $filename
     * @param bool $allow_multiple
     * @return bool 
     */
    public static function load($filename, $allow_multiple = false) {
        /**
         * $filename is under assets/js
         */
        $filename = dirname(dirname(__FILE__)) . '/js/' . $filename;

        /**
         * File must exist or else return false.
         */
        if (!file_exists($filename))
            return false;

        /**
         * Use include() if multiple allowed, or include_once() otherwise.
         */
        if ($allow_multiple)
            include($filename);
        else
            include_once($filename);

        return true;
    }

    /**
     * Load a Javascript file for a given $key.
     * If full, then $key may be assets/js/full/{$key}{$ext} for any extension
     * $ext defined in the array $_exts. If standard, or if full and not in 
     * assets/js/full, then it may be assets/js/standard/{$key}{$ext} for any
     * extension $ext in $_exts. This returns false if no matching file found.
     * 
     * @param string $key
     * @return bool 
     * 
     * @todo Is this unused? Should it be deprecated, made private, removed?
     */
    public static function load_key($key) {
        /**
         * If full device, check each $_exts as assets/js/full/{$key}{$ext}.
         * If found, use load() to include the file.
         */
        foreach (self::$_exts as $ext)
            if (self::load('full/' . $key . $ext))
                return true;

        /**
         * If standard device, or if full device and not already returned, check
         * each $_exts as assets/js/full/{$key}{$ext}. If found, then use load()
         * to include the file.
         */
        foreach (self::$_exts as $ext)
            if (self::load('standard/' . $key . $ext))
                return true;

        return false;
    }
}
