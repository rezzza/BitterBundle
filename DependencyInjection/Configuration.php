<?php

namespace Rezzza\BitterBundle\DependencyInjection;

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

        $treeBuilder->root('rezzza_bitter')
            ->children()
                ->scalarNode('redis_client')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->scalarNode('prefix_key')
                    ->defaultValue('bitter')
                ->end()
                ->scalarNode('expire_timeout')
                    ->defaultValue(60)
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
