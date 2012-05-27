<?php

/**
 * Test class for Menu_Site_Decorator.
 * 
 * @author trott
 * @copyright Copyright (c) 2010-12 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120229
 *
 * @uses PHPUnit_Framework_TestCase
 * @uses Menu_Site_Decorator
 */
class Menu_Site_DecoratorTest extends PHPUnit_Framework_TestCase {

    //@todo: remove this after fixing Config object
    public function setUp() {
        $_SERVER['HTTP_HOST'] = 'http://www.example.com';
    }

    protected $object;

    /**
     * @test
     * @runInSeparateProcess
     */
    public function render_ampersandInUrlParam_ampersandEntityUsed() {
        require dirname(dirname(dirname(dirname(dirname(dirname(dirname(__DIR__))))))) . '/root/assets/lib/decorator/site/menu.class.php';

        $this->object = new Menu_Site_Decorator;

        $this->object->add_item('test', 'http://www.example.com/test?foo&bar');
        $this->assertContains('http://www.example.com/test?foo&amp;bar', $this->object->render());
    }

    /**
     * @test
     * @runInSeparateProcess
     */
    public function render_quotesInUrlParam_quotesReplacedWithEntities() {
        require dirname(dirname(dirname(dirname(dirname(dirname(dirname(__DIR__))))))) . '/root/assets/lib/decorator/site/menu.class.php';

        $this->object = new Menu_Site_Decorator;

        $this->object->add_item('test', 'http://www.example.com/test?"foo"\'bar\'');
        $this->assertContains('http://www.example.com/test?&quot;foo&quot;\'bar\'', $this->object->render());
    }

    /**
     * @test
     * @runInSeparateProcess
     */
    public function setHomeScreen_noParam_isHomeScreen() {
        require dirname(dirname(dirname(dirname(dirname(dirname(dirname(__DIR__))))))) . '/root/assets/lib/decorator/site/menu.class.php';

        $this->object = new Menu_Site_Decorator;

        $this->object->set_home_screen();
        $result = $this->object->render();
        $this->assertRegExp('/\bclass\=\"[^"]*\bfront\b/', $result);
        $this->assertRegExp('/\bid=\"main_menu\"[\s>]/', $result);
    }
}
