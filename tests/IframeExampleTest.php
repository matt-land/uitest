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
        $this->frame($this->byId('docusign-iframe'));
        $this->waitForText('Please review the documents below.');

        //switch to child iframe
        $this->frame($this->byId('nav-buttons'));
        // Do STUFF HERE

        //go back to the parent
        $this->frame(null);
        //back into the outer iframe
        $this->frame($this->byId('docusign-iframe'));

        //go back to the parent
        $this->frame(null);
    }
}