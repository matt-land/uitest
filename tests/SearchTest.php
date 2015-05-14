<?php namespace UiTest;
/**
 * Created by IntelliJ IDEA.
 * User: blitzcat
 * Date: 5/13/15
 * Time: 11:49 PM
 */
use PHPUnit_Extensions_Selenium2TestCase_Keys as Keys;
class SearchTest extends MyAbstract
{
    protected function waitForText($string)
    {
        $maxTime = time() + 15;
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

    public function testSearch()
    {
        self::url('/');
        self::waitForText('Privacy');
        self::byName('q')->value('ninjas or monkeys');
        self::keys(Keys::ENTER);
        self::waitForText('results');
    }
}