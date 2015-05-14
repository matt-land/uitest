<?php namespace UiTest;
/**
 * Created by IntelliJ IDEA.
 * User: blitzcat
 * Date: 5/13/15
 * Time: 11:49 PM
 */

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
        $this->url('/');
        $this->waitForText('Privacy');
    }
}