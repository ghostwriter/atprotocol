<?php

declare(strict_types=1);

use Composer\Autoload\ClassLoader;

/** @var ClassLoader $classLoader */
$classLoader = require \dirname(__DIR__) . \DIRECTORY_SEPARATOR . 'vendor' . \DIRECTORY_SEPARATOR . 'autoload.php';

if (! $classLoader instanceof ClassLoader) {
    throw new \RuntimeException('Class loader not found');
}

\ini_set('memory_limit', '-1');

$path = __DIR__ . \DIRECTORY_SEPARATOR . 'Fixture';
if (! \is_dir($path)) {
    return $classLoader;
}

$iterator = new \RegexIterator(
    new \RecursiveIteratorIterator(
        new \RecursiveDirectoryIterator(
            $path,
            \FilesystemIterator::FOLLOW_SYMLINKS | \FilesystemIterator::SKIP_DOTS
        )
    ),
    '#^.+\.php$#iu'
);

foreach ($iterator as $file) {
    require_once $file->getPathname();
}

return $classLoader;
