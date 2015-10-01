<?php
namespace Gwa\Wordpress\MockeryWpBridge\Traits;

use Gwa\Wordpress\MockeryWpBridge\Contracts\WpBridgeInterface;

/**
 * Trait to be used by all classes that use MockeryWpBridge
 */
trait WpBridgeTrait
{
    /**
     * MockeryWpBridge instance.
     *
     * @var \Gwa\Wordpress\MockeryWpBridge\Contracts\WpBridgeInterface $wpbridge
     */
    private $wpbridge;

    /**
     * Set MockeryWpBridge.
     *
     * @param WpBridgeInterface $wpbridge
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
