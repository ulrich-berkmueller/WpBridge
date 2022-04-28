<?php
namespace Gwa\Wordpress\WpBridge\Tests;

use Gwa\Wordpress\WpBridge\MockeryWpBridge;
use PHPUnit\Framework\TestCase;

class MockeryWpBridgeTest extends TestCase
{
    public function testGetMock(): void
    {
        $bridge = new MockeryWpBridge();
        $this->assertInstanceOf('\Mockery_0__WpBridge', $bridge->mock());
    }

    public function testMockFunction(): void
    {
        $bridge = new MockeryWpBridge();
        $bridge->mock()
            ->shouldReceive('fooBar')
            ->andReturn('baz');

        $result = $bridge->fooBar();
        $this->assertEquals('baz', $result);
    }

    public function testAddShortCode(): void
    {
        $bridge = new MockeryWpBridge();
        $bridge->addShortcode('testshortcode', function() {
            return 'test';
        });

        $this->assertEquals(true, $bridge->hasShortcode('testshortcode'));
        $this->assertEquals(false, $bridge->hasShortcode('notestshortcode'));
    }

    public function testGetShortCode(): void
    {
        $func =  function() {
            return 'test';
        };

        $bridge = new MockeryWpBridge();
        $bridge->addShortcode('testshortcode', $func);

        $this->assertSame($func, $bridge->getShortcodeCallback('testshortcode'));
        $this->assertEquals(null, $bridge->getShortcodeCallback('notestshortcode'));
    }

    public function testGetText(): void
    {
        $bridge = new MockeryWpBridge();

        $this->assertEquals('test', $bridge->__('test', 'MockTest'));
    }

    public function testAddFilter(): void
    {
        $bridge = new MockeryWpBridge();
        $bridge->addFilter('network_admin_url', [$this, 'testGetText'], 1, 1);

        $filters = $bridge->getAddedFilters();

        $this->assertEquals(1, count($filters));
        $this->assertEquals(1, $filters[0]->prio);
        $this->assertEquals(1, $filters[0]->numvars);
        $this->assertEquals('network_admin_url', $filters[0]->filtername);
        $this->assertIsArray($filters[0]->callback);
    }

    public function testAddAction(): void
    {
        $bridge = new MockeryWpBridge();
        $bridge->addAction('network_admin_url', [$this, 'testGetText'], 1, 1);

        $actions = $bridge->getAddedActions();

        $this->assertCount(1, $actions);
        $this->assertEquals(1, $actions[0]->prio);
        $this->assertEquals(1, $actions[0]->numvars);
        $this->assertEquals('network_admin_url', $actions[0]->filtername);
        $this->assertIsArray($actions[0]->callback);
    }

    public function testShortcodeAtts(): void
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
