<?php namespace UiTest;
/**
 * Created by IntelliJ IDEA.
 * User: blitzcat
 * Date: 5/14/15
 * Time: 2:08 PM
 */

class IframeExampleTest extends MyAbstract
{
    public function testTraverseIframe()
    {
        //switch to the iframe
        self::frame($this->byId('docusign-iframe'));
        self::waitForText('Please review the documents below.');

        //switch to child iframe
        self::frame($this->byId('nav-buttons'));
        // Do STUFF HERE

        //go back to the parent
        self::frame(null);
        //back into the outer iframe
        self::frame($this->byId('docusign-iframe'));

        //go back to the parent
        self::frame(null);
    }
}