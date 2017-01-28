<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/** @var ClassLoader $loader */
$loader = require __DIR__.'/../vendor/autoload.php';

//$loader = require __DIR__.'/../vendor/symfony/symfony/src/Symfony';
$loader->add('Symfony', realpath(__DIR__.'/../vendor/symfony/symfony/src'));
AnnotationRegistry::registerLoader([$loader, 'loadClass']);

return $loader;
