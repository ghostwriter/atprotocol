<?php

declare(strict_types=1);

namespace Ghostwriter\AtProtocol\Container;

use Ghostwriter\Config\Configuration;
use Ghostwriter\Config\Interface\ConfigurationInterface;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Interface\Service\DefinitionInterface;
use Ghostwriter\Container\Interface\Service\ExtensionInterface;
use Ghostwriter\Container\Interface\Service\FactoryInterface;
use Override;
use Throwable;

/**
 * @see AtProtocolTest
 */
final readonly class AtProtocolDefinition implements DefinitionInterface
{
    /**
     * @throws Throwable
     */
    #[Override]
    public function __invoke(ContainerInterface $container): void
    {
        $configuration = Configuration::new();
        $configuration->mergeDirectory(implode(DIRECTORY_SEPARATOR, [
            dirname(__DIR__, 2),
            'config'
        ]));

        $container->set(Configuration::class, $configuration);

        $containerConfiguration = $configuration->wrap('ghostwriter.container');

        foreach ($containerConfiguration->get('alias', []) as $alias => $service) {
            $container->alias($service, $alias);
        }

        foreach ($containerConfiguration->get('define', []) as $definition) {
            $container->define($definition);
        }

        foreach ($containerConfiguration->get('extend', []) as $service => $extensions) {
            foreach ($extensions as $extension) {
                $container->extend($service, $extension);
            }
        }

        foreach ($containerConfiguration->get('factory', []) as $service => $factory) {
            $container->factory($service, $factory);
        }
    }
}
