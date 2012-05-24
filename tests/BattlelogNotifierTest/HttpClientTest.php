<?php
namespace BattlelogNotifierTest;

use BattlelogNotifier\HttpClient;
use BattlelogNotifier\HttpClientOptions;

class HttpClientTest extends \PHPUnit_Framework_TestCase
{

    public function setUp()
    {
        $this->clientOptions = new HttpClientOptions();
        $this->client = new HttpClient($this->clientOptions);
    }

    public function testPassingOptionsObjectViaConstructor()
    {
        $options = new HttpClientOptions();
        $client = new HttpClient($options);
        $this->assertEquals($options, $client->getOptions());
    }

    public function testPassingOptionsObjectViaSetter()
    {
        $options = new HttpClientOptions();
        $this->client->setOptions($options);
        $this->assertEquals($options, $this->client->getOptions());
    }

    public function testPassingRawHttpClientViaSetterOverridesDefault()
    {
        $m = $this->getMock('\Zend_Http_Client');

        $this->client->setHttpClient($m);
        $this->assertEquals($m, $this->client->getHttpClient());
    }

    public function testPerformUserLogin()
    {
        $m = $this->getMock('\Zend_Http_Client');
        $m->expects($this->any())
          ->method('setCookieJar')
          ->will($this->returnValue($m));

        $this->client->setHttpClient($m);
        $this->client->performUserLogin();
    }
}
