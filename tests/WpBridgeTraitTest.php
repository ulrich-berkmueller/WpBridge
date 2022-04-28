<?php
namespace Gwa\Wordpress\WpBridge\Tests;

use Gwa\Wordpress\WpBridge\Traits\WpBridgeTrait;
use Gwa\Wordpress\WpBridge\MockeryWpBridge;
use PHPUnit\Framework\TestCase;

class WpBridgeTraitTest extends TestCase
{
    use WpBridgeTrait;

    public function testTraitSetWpBridge(): void
    {
        $this->setWpBridge(new MockeryWpBridge());

        $this->assertInstanceOf('Gwa\Wordpress\WpBridge\Contracts\WpBridgeInterface', $this->getWpBridge());
    }

    public function testTraitSetWpBridgeOutsideAClass(): void
    {
        $outside = new TestClass();

        $outside->setWpBridge(new MockeryWpBridge());

        $this->assertInstanceOf('Gwa\Wordpress\WpBridge\Contracts\WpBridgeInterface', $outside->getWpBridge());

        (new TestClass())->setWpBridge(new MockeryWpBridge())->init();
    }
}

class TestClass extends TestCase
{
    use WpBridgeTrait;

    public function init(): void
    {
        $this->assertInstanceOf('Gwa\Wordpress\WpBridge\Contracts\WpBridgeInterface', $this->getWpBridge());
    }
}
