<?php

$finder = PhpCsFixer\Finder::create()
    ->files()
    ->in(__DIR__)
    ->exclude('build')
    ->exclude('vendor')
    ->notName('*.phar')
    ->notName('CONTRIBUTING')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);
;

$config = new PhpCsFixer\Config();
return $config->setRules([
    '@PSR12' => true,
    'header_comment' => true,
    'phpdoc_order' => true,
    'ordered_use' => true,
    'short_array_syntax' => true,
    'strict' => true,
    'strict_param' => true,
    ])
    ->setFinder($finder)
;
