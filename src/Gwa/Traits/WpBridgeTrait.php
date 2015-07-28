<?php
namespace Gwa\Wordpress\MockeryWpBridge\Traits;

use Gwa\Wordpress\MockeryWpBridge\Contracts\WpBridgeInterface;

/**
 * Trait to be used by all classes that use MockeryWPBridge
 */
trait WpBridgeTrait
{
    /**
     * MockeryWpBridge instance.
     *
     * @var \Gwa\Wordpress\MockeryWPBridge\Contracts\WpBridgeInterface $wpbridge
     */
    private $wpbridge;

    /**
     * Set MockeryWPBridge.
     *
     * @param WpBridgeInterface $wpbridge
     *
     * @return WpBridgeTrait
     */
    public function setWpBridge(WpBridgeInterface $wpbridge)
    {
        $this->wpbridge = $wpbridge;

        return $this;
    }

    /**
     * Get MockeryWpBridge.
     *
     * @return WpBridge
     */
    public function getWpBridge()
    {
        return $this->wpbridge;
    }
}
