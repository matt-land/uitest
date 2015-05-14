<?php namespace UiTest;
/**
 * Created by IntelliJ IDEA.
 * User: blitzcat
 * Date: 5/14/15
 * Time: 10:27 AM
 */

class ExampleFeatureToggleTest extends MyAbstract
{
    public function testMyFeature()
    {
        try {
            ToggleService::setFeature('featureName', $enabled = 0);
            $this->_testMyFeature();
            ToggleService::setFeature('featureName', $enabled = 1);
            $this->_testMyFeature();
        } catch (\Exception $e) {
            $this->fail(
                "With featureName set to " . $enabled . PHP_EOL
                . $e->getMessage() . PHP_EOL .  "Line:".$e->getLine() . PHP_EOL . "File:".$e->getFile());
        }
    }

    private function _testMyFeature()
    {
        /**
         * Do some UI test here
         */
    }
}