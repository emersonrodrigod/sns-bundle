<?php

namespace Solpac\SNSBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        // Most recent versions of TreeBuilder have a constructor
        if (\method_exists(TreeBuilder::class, '__construct')) {
            $treeBuilder = new TreeBuilder('solpac_sns');
        } else { // which is not the case for older versions
            $treeBuilder = new TreeBuilder;
            $treeBuilder->root('solpac_sns');
        }

        if (method_exists($treeBuilder, 'root')) {
            $rootNode = $treeBuilder->root('aws');
        } else {
            $rootNode = $treeBuilder->getRootNode();
        }

        $rootNode
            ->children()
                ->arrayNode('amazon_sns')
                    ->children()
                        ->scalarNode('amazon_sns_key')
                            ->defaultValue(null)
                        ->end()
                        ->scalarNode('amazon_sns_secret')
                            ->defaultValue(null)
                        ->end()
                        ->scalarNode('amazon_sns_region')
                            ->defaultValue(null)
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
