<?php namespace UiTest;
/**
 * Created by IntelliJ IDEA.
 * User: blitzcat
 * Date: 5/14/15
 * Time: 2:53 PM
 */

class InjectJavascriptTest extends MyAbstract
{
    protected function _testFireJqueryUiDatepicker($inputId)
    {
        self::execute([
            'script' => '$("#' . $inputId . '").datepicker("show"); console.log("datepicker show");',
            'args' => array()
        ]);
    }

    public function testInjectJavascript()
    {
        self::url('/');
        self::waitForText('privacy');
        self::_testFireJqueryUiDatepicker('mypicker');
    }
}