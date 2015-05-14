<?php namespace UiTest;
/**
 * Created by IntelliJ IDEA.
 * User: blitzcat
 * Date: 5/14/15
 * Time: 10:07 AM
 */
use PHPUnit_Extensions_Selenium2TestCase;
class WhileLoops extends MyAbstract
{
    public function waitForElementDisplay($id)
    {
        $time = time();
        while(! $this->byId($id)->displayed()) {
            usleep(10000);
            if (time() > $time + 15) {
                throw new \Exception('element ' . $id . ' failed to display in time');
            }
        }
    }

    public function testSomething()
    {
        self::url('/myPage');
        self::waitForText('Please enter how much rent the customer paid you during');
        $value = round(rand(100,9999)/100, 2, PHP_ROUND_HALF_DOWN);
        self::byId('rent-tenant-other')->value($value);
        self::byId('edit-tenant-rent-submit')->click();
        //wait for client side jquery event to finish
        while(self::byId('edit-tenant-rent-collected-title')->displayed()) {
            sleep(1);
        }
        $this->assertEquals('$' . $value, self::byId('rent'));
    }
}