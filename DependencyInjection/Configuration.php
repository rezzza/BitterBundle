<?php

namespace Rezzza\Bundle\BitterBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Jérémy Romey <jeremy@free-agent.fr>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('rezzza_bitter');

        $rootNode
            ->children()
                ->scalarNode('redis_client')
                    ->validate()
                        ->ifTrue(function($v) { return empty($v); })
                        ->thenInvalid('The "redis_client" option must be set')
                    ->end()
                    ->defaultValue('snc_redis.default_client')
                ->end()
            ->end()
        ;
    }
}
