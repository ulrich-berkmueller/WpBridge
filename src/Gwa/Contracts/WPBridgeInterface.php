<?php
namespace Gwa\Wordpress\MockeryWpBridge\Contracts;

interface WpBridgeInterface
{
    public function __call($function, $args);
}
