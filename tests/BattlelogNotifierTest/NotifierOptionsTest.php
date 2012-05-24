<?php
namespace BattlelogNotifierTest;

use BattlelogNotifier\NotifierOptions;

class NotifierOptionsTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->notifier = new NotifierOptions();
    }

    public function testSettingKnownVariable()
    {
        $this->notifier->setBattlelogEmail('foo@bar.com');
        $this->assertEquals('foo@bar.com', $this->notifier->getBattlelogEmail());
    }    

    /**
     * @expectedException \BadMethodCallException
     */
    public function testSettingUnknownVariable()
    {
        $this->notifier->setDfkdfjlqeff('xxx');
    }

}
