<?php
namespace Gwa\Wordpress\MockeryWpBridge\Tests;

use Gwa\Wordpress\MockeryWpBridge\MockeryWpBridge;

class MockeryWpBridgeTest extends \PHPUnit_Framework_TestCase
{
    public function testGetMock()
    {
        $bridge = new MockeryWpBridge();
        $this->assertInstanceOf('\Mockery_0__WPBridge', $bridge->mock());
    }

    public function testMockFunction()
    {
        $bridge = new MockeryWpBridge();
        $bridge->mock()
            ->shouldReceive('fooBar')
            ->andReturn('baz');

        $result = $bridge->fooBar();
        $this->assertEquals('baz', $result);
    }
}
