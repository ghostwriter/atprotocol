<?php

declare(strict_types=1);

use Composer\Autoload\ClassLoader;

/** @var ?ClassLoader $classLoader */
$classLoader = require \dirname(__DIR__) . \DIRECTORY_SEPARATOR . 'vendor' . \DIRECTORY_SEPARATOR . 'autoload.php';

if (! $classLoader instanceof ClassLoader) {
    throw new \RuntimeException('Class loader not found');
}

\error_reporting(\E_ALL);

\ini_set('memory_limit', '-1');

// load the Fixture files in the "Fixture" directory
$fixturePath = \implode(\DIRECTORY_SEPARATOR, [__DIR__, 'Fixture']);
if (! \is_dir($fixturePath)) {
    throw new \RuntimeException('Fixture path not found: ' . $fixturePath);
}

$classLoader->addPsr4('', $fixturePath);

// load the Fixture files in the "Autoload" directory
$autoloadPath = \implode(\DIRECTORY_SEPARATOR, [$fixturePath, 'Autoload']);
if (\is_dir($autoloadPath)) {
    $classLoader->addPsr4('', $autoloadPath);
}

// load the Fixture files in the "RequireOnce" directory
$requirePath = \implode(\DIRECTORY_SEPARATOR, [$fixturePath, 'RequireOnce']);
if (\is_dir($requirePath)) {
    $flags = \FilesystemIterator::FOLLOW_SYMLINKS | \FilesystemIterator::SKIP_DOTS;
    $recursiveDirectoryIterator = new \RecursiveDirectoryIterator($requirePath, $flags);
    /** @var \RecursiveIteratorIterator<\RecursiveDirectoryIterator> $recursiveIteratorIterator */
    $recursiveIteratorIterator = new \RecursiveIteratorIterator($recursiveDirectoryIterator);
    /** @var \RegexIterator<array-key,\SplFileInfo,\RecursiveIteratorIterator<\RecursiveDirectoryIterator>> $regexIterator */
    $regexIterator = new \RegexIterator($recursiveIteratorIterator, '#^.+\.php$#iu');

    foreach ($regexIterator as $fileInfo) {
        require_once $fileInfo->getPathname();
    }
}

return $classLoader;
