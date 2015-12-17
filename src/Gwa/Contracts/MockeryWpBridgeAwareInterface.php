<?php
namespace Gwa\Wordpress\MockeryWpBridge\Contracts;

interface MockeryWpBridgeAwareInterface
{
    /**
     * Set MockeryWpBridge.
     *
     * @param WpBridgeInterface $wpbridge
     */
    public function setWpBridge(WpBridgeInterface $wpbridge);

    /**
     * Get MockeryWpBridge.
     *
     * @return WpBridge
     */
    public function getWpBridge();
}
