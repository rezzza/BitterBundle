<?php

namespace Rezzza\BitterBundle\Tests\Units\DependencyInjection;

require_once __DIR__ . '/../../../vendor/autoload.php';

use atoum\AtoumBundle\Test\Units\Test;
use Rezzza\BitterBundle\DependencyInjection\RezzzaBitterExtension as Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class RezzzaBitterExtension extends Test
{
    public function testDefault()
    {
        $this->if($loader = new Extension())
            ->and($config = array())
            ->exception(function() use ($loader, $config) {
                $loader->load(array($config), new ContainerBuilder());
            })
            ->isInstanceOf('\Symfony\Component\Config\Definition\Exception\InvalidConfigurationException')
            ->hasMessage('The child node "redis_client" at path "rezzza_bitter" must be configured.');
    }

    public function testEmptyClient()
    {
        $this->if($loader = new Extension())
            ->and($config = array(
                'redis_client' => '',
            ))
            ->exception(function() use ($loader, $config) {
                $loader->load(array($config), new ContainerBuilder());
            })
            ->isInstanceOf('\Symfony\Component\Config\Definition\Exception\InvalidConfigurationException')
            ->hasMessage('The path "rezzza_bitter.redis_client" cannot contain an empty value, but got "".');
    }

    public function testClient()
    {
        $this->if($loader    = new Extension())
            ->and($container = new ContainerBuilder())
            ->and($config    = array(
                'redis_client' => 'redis.client',
            ))
            ->then($loader->load(array($config), $container))
            ->object($alias = $container->getAlias('rezzza_bitter.redis_client'))
                ->toString()
                ->isEqualTo('redis.client')
            ;
    }

}
