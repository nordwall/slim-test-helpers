<?php

namespace NordwallTest\Slim\Test;

use Nordwall\Slim\Test\WebTestCase;

class WebTestCaseTest extends \PHPUnit_Framework_TestCase
{
    public function testSetup()
    {
        $testCase = new WebTestCase();
        $testCase->setup();
        self::assertInstanceOf('\Slim\App', $testCase->getSlimInstance());
    }

    public function testGetSlimInstance()
    {
        $expectedConfig = array(
            'version' => '0.0.0',
            'debug'   => false,
            'mode'    => 'testing'
        );
        $testCase = new WebTestCase();
        $slim = $testCase->getSlimInstance();
        self::assertInstanceOf('\Slim\App', $slim);
        foreach ($expectedConfig as $key => $value) {
            self::assertSame($expectedConfig[$key], $slim->getContainer()->get('settings')[$key]);
        }
    }
}
