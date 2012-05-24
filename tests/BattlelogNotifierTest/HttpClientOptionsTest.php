<?php
namespace BattlelogNotifierTest;

use BattlelogNotifier\HttpClientOptions;

class HttpClientOptionsTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->notifier = new HttpClientOptions();
    }

    public function testSettingKnownVariableViaSetter()
    {
        $this->notifier->setBattlelogEmail('foo@bar.com');
        $this->assertEquals('foo@bar.com', $this->notifier->getBattlelogEmail());
    }    

    /**
     * @expectedException \BadMethodCallException
     */
    public function testSettingUnknownVariableViaSetter()
    {
        $this->notifier->setDfkdfjlqeff('xxx');
    }

    public function testSettingKnownVariableViaConstructor()
    {
        $notifier = new HttpClientOptions(array(
            'battlelogEmail' => 'foo@bar.com'
        ));
        $this->assertEquals('foo@bar.com', $notifier->getBattlelogEmail());
    }

}
