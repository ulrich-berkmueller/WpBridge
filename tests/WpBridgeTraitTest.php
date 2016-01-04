<?php
namespace Gwa\Wordpress\WpBridge\Tests;

use Gwa\Wordpress\WpBridge\Traits\WpBridgeTrait;
use Gwa\Wordpress\WpBridge\MockeryWpBridge;

class WpBridgeTraitTest extends \PHPUnit_Framework_TestCase
{
    use WpBridgeTrait;

    public function testTraitSetWpBridge()
    {
        $this->setWpBridge(new MockeryWpBridge());

        $this->assertInstanceOf('Gwa\Wordpress\WpBridge\Contracts\WpBridgeInterface', $this->getWpBridge());
    }

    public function testTraitSetWpBridgeOutsideAClass()
    {
        $outside = new TestClass();

        $outside->setWpBridge(new MockeryWpBridge());

        $this->assertInstanceOf('Gwa\Wordpress\WpBridge\Contracts\WpBridgeInterface', $outside->getWpBridge());

        (new TestClass())->setWpBridge(new MockeryWpBridge())->init();
    }
}

class TestClass extends \PHPUnit_Framework_TestCase
{
    use WpBridgeTrait;

    public function init()
    {
        $this->assertInstanceOf('Gwa\Wordpress\WpBridge\Contracts\WpBridgeInterface', $this->getWpBridge());
    }
}
