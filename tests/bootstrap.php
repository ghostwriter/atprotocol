<?php

declare(strict_types=1);

use Composer\Autoload\ClassLoader;

/** @var ClassLoader $classLoader */
$classLoader = require \dirname(__DIR__) . \DIRECTORY_SEPARATOR . 'vendor' . \DIRECTORY_SEPARATOR . 'autoload.php';

if (! $classLoader instanceof ClassLoader) {
    throw new \RuntimeException('Class loader not found');
}

if (! \function_exists('ghostwriterRecursiveDirectoryRegexIterator')) {
    function ghostwriterRecursiveDirectoryRegexIterator(string $path, string $regex): \Generator
    {
        $flags = \FilesystemIterator::FOLLOW_SYMLINKS | \FilesystemIterator::SKIP_DOTS;
        $recursiveDirectoryIterator = new \RecursiveDirectoryIterator($path, $flags);
        $recursiveIteratorIterator = new \RecursiveIteratorIterator($recursiveDirectoryIterator);
        yield from new \RegexIterator($recursiveIteratorIterator, $regex);
    }
}

if (! \function_exists('ghostwriterSupportedPHPVersion')) {
    function ghostwriterSupportedPHPVersion(): array
    {
        static $supportedPHPVersions = null;
        if (\is_array($supportedPHPVersions)) {
            return $supportedPHPVersions;
        }

        $supportedPHPVersions = [];
        $currentPHPVersion = (\PHP_MAJOR_VERSION * 10) + \PHP_MINOR_VERSION;
        foreach ([54, 55, 56, 70, 71, 72, 73, 74, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90] as $versionChecked) {
            if ($currentPHPVersion < $versionChecked) {
                continue;
            }
            $supportedPHPVersions[] = \sprintf('PHP%d', $versionChecked);
            if ($versionChecked !== $currentPHPVersion) {
                continue;
            }
            $supportedPHPVersions[] = \sprintf('PHP%dOnly', $versionChecked);
        }

        return $supportedPHPVersions;
    }
}

\error_reporting(\E_ALL);

\ini_set('memory_limit', '-1');

// load the Fixture files in the "Fixture" directory
$fixturePath = \implode(\DIRECTORY_SEPARATOR, [__DIR__, 'Fixture']);
if (\is_dir($fixturePath)) {
    $classLoader->addPsr4('Tests\\Fixture\\', $fixturePath);
    $classLoader->add('\\', $fixturePath);
}

// load the Fixture files in the "Autoload" directory
$autoloadPath = \implode(\DIRECTORY_SEPARATOR, [$fixturePath, 'Autoload']);
if (\is_dir($autoloadPath)) {
    $classLoader->addPsr4('Tests\\Fixture\\Autoload\\', $autoloadPath);
    $classLoader->addPsr4('Tests\\Fixture\\', $autoloadPath);
    $classLoader->add('\\', $autoloadPath);
}

// load the Fixture files in the "RequireOnce" directory
$requirePath = \implode(\DIRECTORY_SEPARATOR, [$fixturePath, 'RequireOnce']);
if (\is_dir($requirePath)) {
    foreach (\ghostwriterRecursiveDirectoryRegexIterator($requirePath, '#^.+\.php$#iu') as $file) {
        require_once $file->getPathname();
    }
}

// load the Fixture files in the "PHP{version}" and "PHP{version}Only" directory
foreach (\ghostwriterSupportedPHPVersion() as $phpVersionName) {
    $phpVersionPath = \implode(\DIRECTORY_SEPARATOR, [$autoloadPath, $phpVersionName]);
    if (! \is_dir($phpVersionPath)) {
        continue;
    }
    $classLoader->addPsr4(\sprintf('Tests\\Fixture\\Autoload\\%s\\', $phpVersionName), $phpVersionPath);
    $classLoader->addPsr4(\sprintf('Tests\\Fixture\\%s\\', $phpVersionName), $phpVersionPath);
    $classLoader->addPsr4(\sprintf('%s\\', $phpVersionName), $phpVersionPath);
    $classLoader->add('\\', $phpVersionPath);
}

return $classLoader;
