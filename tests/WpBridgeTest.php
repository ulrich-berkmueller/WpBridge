<?php
namespace Gwa\Wordpress\MockeryWpBridge\Tests;

use Gwa\Wordpress\MockeryWpBridge\WPBridge;

class WpBridgeTest extends \PHPUnit_Framework_TestCase
{
    public function testCamelToUnderscore()
    {
        $bridge = new WPBridge();
        $this->assertEquals('foo_bar', $bridge->camelToUnderscore('fooBar'));
        $this->assertEquals('wp_get_attachment_image_src', $bridge->camelToUnderscore('wpGetAttachmentImageSrc'));
        $this->assertEquals('__', $bridge->camelToUnderscore('__'));
        $this->assertEquals('is_404', $bridge->camelToUnderscore('is404'));
    }

    public function testCallGlobalFunction()
    {
        $bridge = new WPBridge();
        $result = $bridge->strRepeat('##', 2);
        $this->assertEquals('####', $result);

        $result = $bridge->strSplit('foobar', 2);
        $this->assertInternalType('array', $result);
        $this->assertEquals('fo', $result[0]);
        $this->assertEquals('ob', $result[1]);
        $this->assertEquals('ar', $result[2]);
    }
}
