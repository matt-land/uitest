<?php namespace UiTest;
/**
 * Created by IntelliJ IDEA.
 * User: blitzcat
 * Date: 5/13/15
 * Time: 11:49 PM
 */
use \PHPUnit_Extensions_Selenium2TestCase_Keys as Keys;
class SearchTest extends MyAbstract
{
    public function testSearch()
    {
        self::url('/');
        self::waitForText('Privacy');
        self::byName('q')->value('ninjas or monkeys');
        self::keys(Keys::ENTER);
        self::waitForText('results');
    }
}