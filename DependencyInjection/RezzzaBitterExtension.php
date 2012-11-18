<?php

namespace Rezzza\Bundle\BitterBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * @author Jérémy Romey <jeremy@free-agent.fr>
 */
class RezzzaBitterExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        if (!isset($config['redis_client'])) {
            throw new \InvalidArgumentException('The "redis_client" option must be set');
        }

        $container->setParameter('rezzza_bitter.redis_client', $config['redis_client']);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('bitter.xml');
    }
}
