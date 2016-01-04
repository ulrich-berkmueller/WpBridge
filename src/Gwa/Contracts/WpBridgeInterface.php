<?php
namespace Gwa\Wordpress\WpBridge\Contracts;

interface WpBridgeInterface
{
    public function __call($function, $args);
}
