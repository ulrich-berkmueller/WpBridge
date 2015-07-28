<?php
namespace Gwa\Wordpress\MockeryWpBridge\Tests;

use Gwa\Wordpress\MockeryWpBridge\Traits\WpBridgeTrait;
use Gwa\Wordpress\MockeryWpBridge\MockeryWpBridge;

class WpBridgeTraitTest extends \PHPUnit_Framework_TestCase
{
    use WpBridgeTrait;

    public function testTraitSetWpBridge()
    {
        $this->setWPBridge(new MockeryWpBridge());

        $this->assertInstanceOf('Gwa\Wordpress\MockeryWpBridge\Contracts\WpBridgeInterface', $this->getWpBridge());
    }

    public function testTraitSetWpBridgeOutsideAClass()
    {
        $outside = new TestClass();

        $outside->setWPBridge(new MockeryWpBridge());

        $this->assertInstanceOf('Gwa\Wordpress\MockeryWpBridge\Contracts\WpBridgeInterface', $outside->getWpBridge());

        (new TestClass())->setWPBridge(new MockeryWpBridge())->init();
    }
}

class TestClass extends \PHPUnit_Framework_TestCase
{
    use WpBridgeTrait;

    public function init()
    {
        $this->assertInstanceOf('Gwa\Wordpress\MockeryWpBridge\Contracts\WpBridgeInterface', $this->getWpBridge());
    }
}
