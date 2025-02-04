<?php

use PhpCsFixer\Runner\Parallel\ParallelConfigFactory;

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->ignoreVCSIgnored(true)
;

$config = new PhpCsFixer\Config();
$config
    ->setParallelConfig(ParallelConfigFactory::detect())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PER-CS2.0' => true,
        '@PER-CS2.0:risky' => true,
    ])
    ->setFinder($finder)
;

return $config;
