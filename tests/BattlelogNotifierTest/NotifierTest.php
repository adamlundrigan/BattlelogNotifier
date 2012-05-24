<?php
namespace BattlelogNotifierTest;

use BattlelogNotifier\Notifier;
use BattlelogNotifier\NotifierOptions;

class NotifierTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->notifierOptions = new NotifierOptions();
        $this->notifier = new Notifier($this->notifierOptions);
    }

    public function testPassingOptionsObjectViaConstructor()
    {
        $options = new NotifierOptions();
        $notifier = new Notifier($options);
        $this->assertEquals($options, $notifier->getOptions());
    }

    public function testPassingOptionsObjectViaSetter()
    {
        $options = new NotifierOptions();
        $this->notifier->setOptions($options);
        $this->assertEquals($options, $this->notifier->getOptions());
    }

}
