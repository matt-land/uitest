<?php namespace UiTest;
/**
 * Created by IntelliJ IDEA.
 * User: blitzcat
 * Date: 5/13/15
 * Time: 11:41 PM
 */
use PHPUnit_Extensions_Selenium2TestCase;

class MyAbstract extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        self::setHost('localhost');
        self::setPort(4444);
        self::setBrowser('firefox');
        self::setSeleniumServerRequestsTimeout(10);
        self::setBrowserUrl('https://www.google.com');
        self::prepareSession()->currentWindow()->maximize();
    }

    protected function tearDown()
    {
        self::closeWindow();
    }

    protected function waitForText($string)
    {
        $maxTime = time() + 15; //wait 15 sec max
        while (stripos(self::source(), '<body') === false) {
            usleep(333333);
            if (time() > $maxTime) {
                throw new \Exception('Timeout waiting for page to load');
            }
        };
        while (stripos(self::byTag('body')->text(), $string) === false) {
            usleep(333333);
            if (time() > $maxTime) {
                throw new \Exception('Timeout waiting for string ' . $string);
            }
        }
        return true;
    }
}