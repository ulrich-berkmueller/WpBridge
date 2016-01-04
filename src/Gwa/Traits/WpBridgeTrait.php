<?php
namespace Gwa\Wordpress\WpBridge\Traits;

use Gwa\Wordpress\WpBridge\Contracts\WpBridgeInterface;

/**
 * Trait to be used by all classes that use WpBridge
 */
trait WpBridgeTrait
{
    /**
     * WpBridge instance.
     *
     * @var \Gwa\Wordpress\WpBridge\Contracts\WpBridgeInterface $wpbridge
     */
    private $wpbridge;

    /**
     * Set WpBridge.
     *
     * @param WpBridgeInterface $wpbridge
     */
    public function setWpBridge(WpBridgeInterface $wpbridge)
    {
        $this->wpbridge = $wpbridge;

        return $this;
    }

    /**
     * Get WpBridge.
     *
     * @return WpBridge
     */
    public function getWpBridge()
    {
        return $this->wpbridge;
    }
}
