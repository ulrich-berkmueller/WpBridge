<?php
namespace Gwa\Wordpress\WpBridge\Contracts;

interface WpBridgeAwareInterface
{
    /**
     * Set WpBridge.
     *
     * @param WpBridgeInterface $wpbridge
     */
    public function setWpBridge(WpBridgeInterface $wpbridge);

    /**
     * Get WpBridge.
     *
     * @return WpBridge
     */
    public function getWpBridge();
}
