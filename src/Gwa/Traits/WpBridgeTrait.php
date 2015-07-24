<?php
namespace Gwa\Wordpress\MockeryWPBridge\Traits;

use Gwa\Wordpress\MockeryWPBridge\Contracts\WPBridgeInterface;

/**
 * Trait to be used by all classes that use MockeryWPBridge
 */
trait WpBridgeTrait
{
    /**
     * MockeryWPBridge instance.
     *
     * @var \Gwa\Wordpress\MockeryWPBridge\Contracts\WPBridgeInterface $wpbridge
     */
    private $wpbridge;

    /**
     * Set MockeryWPBridge.
     *
     * @param WPBridgeInterface $wpbridge
     *
     * @return WpBridgeTrait
     */
    public function setWPBridge(WPBridgeInterface $wpbridge)
    {
        $this->wpbridge = $wpbridge;

        return $this;
    }

    /**
     * Get MockeryWPBridge.
     *
     * @return WPBridge
     */
    public function getWPBridge()
    {
        return $this->wpbridge;
    }
}
