<?php
namespace Gwa\Wordpress\WpBridge\Tests;

use Gwa\Wordpress\WpBridge\WpBridge;
use PHPUnit\Framework\TestCase;

class WpBridgeTest extends TestCase
{
    public function testCamelToUnderscore(): void
    {
        $bridge = new WpBridge();
        $this->assertEquals('foo_bar', $bridge->camelToUnderscore('fooBar'));
        $this->assertEquals('wp_get_attachment_image_src', $bridge->camelToUnderscore('wpGetAttachmentImageSrc'));
        $this->assertEquals('__', $bridge->camelToUnderscore('__'));
        $this->assertEquals('is_404', $bridge->camelToUnderscore('is404'));
    }

    public function testCallGlobalFunction(): void
    {
        $bridge = new WpBridge();
        $result = $bridge->strRepeat('##', 2);
        $this->assertEquals('####', $result);

        $result = $bridge->strSplit('foobar', 2);
        $this->assertIsArray($result);
        $this->assertEquals('fo', $result[0]);
        $this->assertEquals('ob', $result[1]);
        $this->assertEquals('ar', $result[2]);
    }
}
