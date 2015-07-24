<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->files()
    ->in(__DIR__)
    ->exclude('build')
    ->exclude('vendor')
    ->notName('*.phar')
    ->notName('CONTRIBUTING')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return Symfony\CS\Config\Config::create()
    // use default PSR-2_LEVEL:
    ->level(Symfony\CS\FixerInterface::PSR2_LEVEL)
    ->fixers(
        [
            'header_comment',
            'phpdoc_order',
            'ordered_use',
            'short_array_syntax',
            'strict',
            'strict_param',
        ]
    )
    ->finder($finder)
    ->setUsingCache(true);
