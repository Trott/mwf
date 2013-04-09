<?php

/**
 * Test class for Input_Site_Decorator.
 * 
 * @author trott
 * @copyright Copyright (c) 2012 UC Regents
 * @license http://mwf.ucla.edu/license
 * @version 20120318
 *
 * @uses PHPUnit_Framework_TestCase
 * @uses Input_Site_Decorator
 */
require dirname(dirname(dirname(dirname(dirname(dirname(dirname(__DIR__))))))) . '/root/assets/lib/decorator/site/input.class.php';

/**
 * Test class for Input_Site_Decorator.
 * Generated by PHPUnit on 2012-03-15 at 22:34:55.
 */
class Input_Site_DecoratorTest extends PHPUnit_Framework_TestCase {

    //@todo: remove this after fixing Config object
    public function setUp() {
        $_SERVER['HTTP_HOST'] = 'http://www.example.com';
        $this->object = new Input_Site_Decorator('input_id', 'input_label');
    }

    protected $object;

    /**
     * @test
     */
    public function isRequired_required_true() {
        $this->object->required();
        $this->assertSame(true, $this->object->is_required());
    }

    /**
     * @test
     */
    public function isRequired_notRequired_false() {
        $this->assertSame(false, $this->object->is_required());
    }

    /**
     * @test
     */
    public function setPlaceholder_placeholderText_placedholderRendered() {
        $this->object->set_placeholder('Input placeholder text');
        $this->assertContains('placeholder="Input placeholder text"', $this->object->render());
    }

    /**
     * @test
     */
    public function setPlaceholder_placeholderText_returnsInputSiteDecorator() {
        $this->assertTrue(is_a($this->object->set_placeholder('Input placeholder text'), 'Input_Site_Decorator'));
    }

    /**
     * @test
     */
    public function required_void_requireRendered() {
        $this->object->required();
        $this->assertContains('required="required"', $this->object->render());
    }

    /**
     * @test
     */
    public function invalid_void_invalidClassApplied() {
        $this->object->invalid();
        $rendered = $this->object->render();
        $this->assertContains('class="invalid"', $rendered);
    }

    /**
     * @test
     */
    public function invalid_message_invalidClassAppliedAndMessageStored() {
        $this->object->invalid('Error message');
        $rendered = $this->object->render();
        $this->assertContains('class="invalid"', $rendered);
        $this->assertEquals('Error message', $this->object->get_invalid_message());
    }

    /**
     * @test
     */
    public function isInvalid_valid_false() {
        $this->assertFalse($this->object->is_invalid());
    }

    /**
     * @test
     */
    public function isInvalid_invalid_true() {
        $this->object->invalid();
        $this->assertTrue($this->object->is_invalid());
    }

    /**
     * @test
     */
    public function disable_void_disabledRendered() {
        $this->object->disable();
        $this->assertContains('disabled="disabled"', $this->object->render());
    }

    /**
     * @test
     */
    public function typeText_previousType_textRendered() {
        $this->object->type_color();
        $this->object->type_text();
        $rendered = $this->object->render();
        $this->assertContains('type="text"', $rendered);
        $this->assertNotContains('type="color"', $rendered);
    }

    /**
     * @test
     */
    public function typeColor_void_colorRendered() {
        $this->object->type_color();
        $this->assertContains('type="color"', $this->object->render());
    }

    /**
     * @test
     */
    public function typeColor_required_requiredIgnored() {
        $this->object->type_color()->required();
        $this->assertNotContains('required', $this->object->render());
    }

    /**
     * @test
     */
    public function isRequired_colorrequired_notrequired() {
        $this->object->type_color()->required();
        $this->assertFalse($this->object->is_required());
    }

    /**
     * @test
     */
    public function isRequired_requiredColor_notrequired() {
        $this->object->required()->type_color();
        $this->assertFalse($this->object->is_required());
    }

    /**
     * @test
     */
    public function typeSearch_void_searchRendered() {
        $this->object->type_search();
        $this->assertContains('type="search"', $this->object->render());
    }

    /**
     * @test
     */
    public function typeTelephone_void_telephoneRendered() {
        $this->object->type_telephone();
        $this->assertContains('type="tel"', $this->object->render());
    }

    /**
     * @test
     */
    public function typeUrl_void_urlRendered() {
        $this->object->type_url();
        $this->assertContains('type="url"', $this->object->render());
    }

    /**
     * @test
     */
    public function typeEmail_void_emailRendered() {
        $this->object->type_email();
        $this->assertContains('type="email"', $this->object->render());
    }

    /**
     * @test
     */
    public function typeDate_void_dateRendered() {
        $this->object->type_date();
        $this->assertContains('type="date"', $this->object->render());
    }

    /**
     * @test
     */
    public function typeMonth_void_monthRendered() {
        $this->object->type_month();
        $this->assertContains('type="month"', $this->object->render());
    }

    /**
     * @test
     */
    public function typeWeek_void_monthRendered() {
        $this->object->type_week();
        $this->assertContains('type="week"', $this->object->render());
    }

    /**
     * @test
     */
    public function typeDatetimeLocal_void_datetimeLocalRendered() {
        $this->object->type_datetime_local();
        $this->assertContains('type="datetime-local"', $this->object->render());
    }

    /**
     * @test
     */
    public function typeTime_void_timeRendered() {
        $this->object->type_time();
        $this->assertContains('type="time"', $this->object->render());
    }

    /**
     * @test
     */
    public function typeSubmit_void_submitRendered() {
        $this->object->type_submit();
        $this->assertContains('type="submit"', $this->object->render());
    }

    /**
     * @test
     */
    public function typeSubmit_void_classPrimary() {
        $this->object->type_submit();
        $this->assertContains('class="primary"', $this->object->render());
    }

    /**
     * @test
     */
    public function typeButton_void_submitRendered() {
        $this->object->type_button();
        $this->assertContains('type="submit"', $this->object->render());
    }

    /**
     * @test
     */
    public function typeButton_void_classNeutral() {
        $this->object->type_button();
        $this->assertContains('class="neutral"', $this->object->render());
    }

    /**
     * @test
     */
    public function typeCheckbox_void_checkboxRendered() {
        $this->object->type_checkbox();
        $this->assertContains('type="checkbox"', $this->object->render());
    }

    /**
     * @test
     */
    public function typeRadio_void_selectRendered() {
        $this->object->type_radio();
        $this->assertContains('type="radio"', $this->object->render());
    }

    /**
     * @test
     */
    public function typeNumber_void_numberRendered() {
        $this->object->type_number();
        $this->assertContains('type="number"', $this->object->render());
    }

    /**
     * @test
     */
    public function typeRange_void_rangeRendered() {
        $this->object->type_range();
        $this->assertContains('type="range"', $this->object->render());
    }

    /**
     * @test
     */
    public function typeSelect_void_selectTagRendered() {
        $this->object->type_select();
        $this->assertEquals('<select id="input_id" name="input_id"></select>', $this->object->render());
    }

    /**
     * @test
     */
    public function typeSelect_multiple_multipleRendered() {
        $this->object->type_select()
                ->multiple();
        $this->assertRegexp('/<select [^>]*\bmultiple\b.*><\/select>/', $this->object->render());
    }

    /**
     * @test
     */
    public function typeText_multiple_multipleIgnored() {
        $this->object->type_text()
                ->multiple();
        $this->assertNotContains('multiple', $this->object->render());
    }

    /**
     * @test
     */
    public function typeTextarea_multiple_multipleIgnored() {
        $this->object->type_textarea()
                ->multiple();
        $this->assertNotContains('multiple', $this->object->render());
    }

    /**
     * @test
     */
    public function typeText_size_sizeRendered() {
        $this->object->type_text()
                ->set_size(5);
        $this->assertRegexp('/<input [^>]* size="5".*>/', $this->object->render());
    }

    /**
     * @test
     */
    public function typeTextarea_size_sizeIgnored() {
        $this->object->type_textarea()
                ->set_size(5);
        $this->assertNotContains('size', $this->object->render());
    }

    /**
     * @test
     */
    public function typeSelect_size_sizeRendered() {
        $this->object->type_select()
                ->set_size(5);
        $this->assertRegexp('/<select [^>]* size="5".*><\/select>/', $this->object->render());
    }

    /**
     * @test
     */
    public function typeTextarea_void_textareaTagRendered() {
        $this->object->type_textarea();
        $this->assertEquals('<textarea id="input_id" name="input_id"></textarea>', $this->object->render());
    }

    /**
     * @test
     */
    public function typeTextarea_setValue_valueIsTagContents() {
        $this->object->type_textarea();
        $this->object->set_value('foo');
        $this->assertRegexp('/^<textarea .*?>foo<\/textarea>/', $this->object->render());
    }

    /**
     * @test
     */
    public function addOption_fooBar_optionRendered() {
        $this->object->add_option('foo', 'bar');
        $this->assertEquals('<select id="input_id" name="input_id"><option value="foo">bar</option></select>', $this->object->render());
    }

    /**
     * @test
     */
    public function primary_void_classPrimary() {
        $this->object->type_button();
        $this->object->primary();
        $this->assertContains('class="primary"', $this->object->render());
    }

    /**
     * @test
     */
    public function neutral_void_classNeutral() {
        $this->object->type_button();
        $this->object->neutral();
        $this->assertContains('class="neutral"', $this->object->render());
    }

    /**
     * @test
     */
    public function render_void_inputRendered() {
        $rendered = $this->object->render();
        $this->assertRegExp('/<input.*id="input_id".*>/', $rendered);
        $this->assertRegExp('/<input.*name="input_id".*>/', $rendered);
    }

    /**
     * @test
     */
    public function setName_foo_nameIsDifferentFromId() {
        $this->object->set_name('foo');
        $rendered = $this->object->render();

        $this->assertRegExp('/<input.*id="input_id".*>/', $rendered);
        $this->assertRegExp('/<input.*name="foo".*>/', $rendered);
    }

    /**
     * @test
     */
    public function setValue_foo_valueIsFoo() {
        $this->object->set_value('foo');
        $rendered = $this->object->render();
        $this->assertRegExp('/<input.*value="foo".*>/', $rendered);
    }

    /**
     * @test
     */
    public function isOption_checkbox_true() {
        $this->object->type_checkbox();
        $this->assertTrue($this->object->is_option());
    }

    /**
     * @test
     */
    public function isOption_radio_true() {
        $this->object->type_radio();
        $this->assertTrue($this->object->is_option());
    }

    /**
     * @test
     */
    public function isOption_void_false() {
        $this->assertFalse($this->object->is_option());
    }

    /**
     * @test
     */
    public function isOption_text_false() {
        $this->object->type_text();
        $this->assertFalse($this->object->is_option());
    }

    /**
     * @test
     * 
     * HTML5 requires tha the first child option element of a select element 
     * with a required attribute and without a multiple attribute, and whose 
     * size is 1, must have either an empty value attribute, or must have no 
     * text content.
     */
    public function typeSelect_requiredNotMultipleSizeNotSetNoOptions_emptyOptionAdded() {
        $this->object->type_select()
                ->required();
        $this->assertContains('<option value></option>', $this->object->render());
    }

    /**
     * @test
     * 
     * See comment for typeSelect_requiredNotMultipleSizeNotSetNoOptions_emptyOptionAdded()
     */
    public function typeSelect_requiredNotMultipleSizeNotSetOptions_emptyOptionAddedAsFirstOption() {
        $this->object->type_select()
                ->add_option(1, 'The Beatles')
                ->add_option(2, 'The Rolling Stones')
                ->add_option(3, 'The Who')
                ->add_option(4, 'The Kinks')
                ->required();
        $this->assertRegexp('/<select [^>]+><option value><\/option>/', $this->object->render());
    }

}