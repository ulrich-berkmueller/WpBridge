<?php
namespace Gwa\Wordpress\MockeryWpBridge\Tests;

use Gwa\Wordpress\MockeryWpBridge\MockeryWpBridge;

class MockeryWpBridgeTest extends \PHPUnit_Framework_TestCase
{
    public function testGetMock()
    {
        $bridge = new MockeryWpBridge();
        $this->assertInstanceOf('\Mockery_0__WpBridge', $bridge->mock());
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

    public function testAddShortCode()
    {
        $bridge = new MockeryWpBridge();
        $bridge->addShortcode('testshortcode', function() {
            return 'test';
        });

        $this->assertEquals(true, $bridge->hasShortcode('testshortcode'));
        $this->assertEquals(false, $bridge->hasShortcode('notestshortcode'));
    }

    public function testGetShortCode()
    {
        $func =  function() {
            return 'test';
        };

        $bridge = new MockeryWpBridge();
        $bridge->addShortcode('testshortcode', $func);

        $this->assertSame($func, $bridge->getShortcodeCallback('testshortcode'));
        $this->assertEquals(null, $bridge->getShortcodeCallback('notestshortcode'));
    }

    public function testGetText()
    {
        $bridge = new MockeryWpBridge();

        $this->assertEquals('test', $bridge->__('test', 'MockTest'));
    }

    public function testShortcodeAtts()
    {
        $atts = [
            'id' => ''
        ];

        $excepted = [
            'id' => '1'
        ];

        $bridge = new MockeryWpBridge();
        $attr   = $bridge->shortcodeAtts($atts, $excepted);

        $this->assertEquals($excepted, $attr);
    }
}
