<?php

namespace Rezzza\BitterBundle\DependencyInjection;

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
        $config        = $this->processConfiguration($configuration, $configs);

        $container->setAlias('rezzza_bitter.redis_client', $config['redis_client']);
        $container->setParameter('rezzza_bitter.prefix_key', $config['prefix_key']);
        $container->setParameter('rezzza_bitter.expire_timeout', $config['expire_timeout']);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('bitter.xml');
    }
}
