<?php

declare(strict_types=1);

use Composer\Autoload\ClassLoader;

/** @var ClassLoader $classLoader */
$classLoader = require \dirname(__DIR__) . \DIRECTORY_SEPARATOR . 'vendor' . \DIRECTORY_SEPARATOR . 'autoload.php';

if (! $classLoader instanceof ClassLoader) {
    /** @psalm-suppress UncaughtThrowInGlobalScope */
    throw new \RuntimeException('Class loader not found');
}

ini_set('memory_limit', '-1');

$path = __DIR__ . \DIRECTORY_SEPARATOR . 'Fixture';

if (\is_dir($path)) {
    /** @psalm-suppress UncaughtThrowInGlobalScope */
    $classLoader->addPsr4('', $path);

    /** @psalm-suppress UncaughtThrowInGlobalScope */
    $classLoader->addPsr4('Tests\\Fixture\\', $path);
}

return $classLoader;
