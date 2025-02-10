<?php

declare(strict_types=1);

use Composer\Autoload\ClassLoader;

/** @var ClassLoader $classLoader */
$classLoader = require \dirname(__DIR__) . \DIRECTORY_SEPARATOR . 'vendor' . \DIRECTORY_SEPARATOR . 'autoload.php';

if (! $classLoader instanceof ClassLoader) {
    /** @psalm-suppress UncaughtThrowInGlobalScope */
    throw new \RuntimeException('Class loader not found');
}

$fixturePath = __DIR__ . \DIRECTORY_SEPARATOR . 'fixture';

if (\is_dir($fixturePath)) {
    /** @psalm-suppress UncaughtThrowInGlobalScope */
    $classLoader->addPsr4('Tests\\Fixture\\', $fixturePath);
}

return $classLoader;
