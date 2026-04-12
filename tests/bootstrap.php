<?php

declare(strict_types=1);

use Composer\Autoload\ClassLoader;

/** @var ClassLoader $classLoader */
$classLoader = require \dirname(__DIR__) . \DIRECTORY_SEPARATOR . 'vendor' . \DIRECTORY_SEPARATOR . 'autoload.php';

if (! $classLoader instanceof ClassLoader) {
    throw new \RuntimeException('Class loader not found');
}

if (! \function_exists('recursiveDirectoryRegexIterator')) {
    function recursiveDirectoryRegexIterator(string $path, string $regex): \Generator
    {
        $flags = \FilesystemIterator::FOLLOW_SYMLINKS | \FilesystemIterator::SKIP_DOTS;

        $recursiveDirectoryIterator = new \RecursiveDirectoryIterator($path, $flags);

        $recursiveIteratorIterator = new \RecursiveIteratorIterator($recursiveDirectoryIterator);

        yield from new \RegexIterator($recursiveIteratorIterator, $regex);
    }
}

\error_reporting(\E_ALL);

\ini_set('memory_limit', '-1');

$autoloadPath = \implode(\DIRECTORY_SEPARATOR, [__DIR__, 'Fixture', 'Autoload']);
if (\is_dir($autoloadPath)) {
    // load the Fixture files in the "Autoload" directory
    foreach (\recursiveDirectoryRegexIterator($autoloadPath, '#^.+\.php$#iu') as $file) {
        require_once $file->getPathname();
    }
}

$currentPHPVersion = (\PHP_MAJOR_VERSION * 10) + \PHP_MINOR_VERSION;
$phpVersions = [54, 55, 56, 70, 71, 72, 73, 74, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90];

foreach ($phpVersions as $versionChecked) {
    if ($currentPHPVersion < $versionChecked) {
        // if the current PHP version is less than the version being checked, skip it
        continue;
    }

    if ($currentPHPVersion === $versionChecked) {
        $phpVersionOnlyPath = \implode(\DIRECTORY_SEPARATOR, [
            __DIR__,
            'Fixture',
            \sprintf('PHP%dOnly', $versionChecked)
        ]);
        if (\is_dir($phpVersionOnlyPath)) {
            // load the Fixture files in the "PHP{version}Only" directory
            foreach (\recursiveDirectoryRegexIterator($phpVersionOnlyPath, '#^.+\.php$#iu') as $file) {
                require_once $file->getPathname();
            }
        }
    }

    $phpVersionPath = \implode(\DIRECTORY_SEPARATOR, [
        __DIR__,
        'Fixture',
        \sprintf('PHP%d', $versionChecked)
    ]);
    if (\is_dir($phpVersionPath)) {
        // load the Fixture files in the "PHP{version}" directory
        foreach (\recursiveDirectoryRegexIterator($phpVersionPath, '#^.+\.php$#iu') as $file) {
            require_once $file->getPathname();
        }
    }
}

return $classLoader;
