<?php
namespace Gwa\Wordpress\MockeryWPBridge\Contracts;

interface WPBridgeInterface
{
    public function __call($function, $args);
}
