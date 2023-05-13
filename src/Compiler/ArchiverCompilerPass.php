<?php

namespace App\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use App\Service\ArchiverService;
use Symfony\Component\DependencyInjection\Reference;

class ArchiverCompilerPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $containerBuilder
     */
    public function process(ContainerBuilder $containerBuilder): void
    {
        if (!$containerBuilder->hasDefinition(ArchiverService::class)) {
            return;
        }

        /**
         * @todo Implement it
         */

        //  $definition = $containerBuilder->getDefinition(ArchiverService::class);
        //  $definition->addMethodCall('addArchiver', [new Reference(RarArchiver::class)]);
        //  $definition->addMethodCall('addArchiver', [new Reference(ZipArchiver::class)]);

    }
}