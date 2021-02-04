<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\DependencyInjection;

use LSB\ContractorBundle\Entity\ContactPersonInterface;
use LSB\ContractorBundle\Entity\ContractorGroupInterface;
use LSB\ContractorBundle\Entity\ContractorGroupRelationInterface;
use LSB\ContractorBundle\Entity\ContractorInterface;
use LSB\ContractorBundle\Factory\ContactPersonFactory;
use LSB\ContractorBundle\Factory\ContractorFactory;
use LSB\ContractorBundle\Factory\ContractorGroupFactory;
use LSB\ContractorBundle\Factory\ContractorGroupRelationFactory;
use LSB\ContractorBundle\Manager\ContactPersonManager;
use LSB\ContractorBundle\Manager\ContractorGroupManager;
use LSB\ContractorBundle\Manager\ContractorGroupRelationManager;
use LSB\ContractorBundle\Manager\ContractorManager;
use LSB\ContractorBundle\Repository\ContactPersonRepository;
use LSB\ContractorBundle\Repository\ContractorGroupRelationRepository;
use LSB\ContractorBundle\Repository\ContractorGroupRepository;
use LSB\ContractorBundle\Repository\ContractorRepository;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    const CONFIG_KEY = 'lsb_contractor';

    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder(self::CONFIG_KEY);

        $treeBuilder
            ->getRootNode()
            ->children()
            ->arrayNode('resources')
            ->children()

            // Start Contractor
            ->arrayNode('contractor')
            ->addDefaultsIfNotSet()
            ->children()
            ->arrayNode('classes')
            ->children()
            ->scalarNode('entity')->cannotBeEmpty()->end()
            ->scalarNode('interface')->defaultValue(ContractorInterface::class)->end()
            ->scalarNode('factory')->defaultValue(ContractorFactory::class)->end()
            ->scalarNode('repository')->defaultValue(ContractorRepository::class)->end()
            ->scalarNode('manager')->defaultValue(ContractorManager::class)->end()
            ->end()
            ->end()
            ->end()
            ->end()
            // End Contractor


            // Start ContractorGroup
            ->arrayNode('contractor_group')
            ->addDefaultsIfNotSet()
            ->children()
            ->arrayNode('classes')
            ->children()
            ->scalarNode('entity')->cannotBeEmpty()->end()
            ->scalarNode('interface')->defaultValue(ContractorGroupInterface::class)->end()
            ->scalarNode('factory')->defaultValue(ContractorGroupFactory::class)->end()
            ->scalarNode('repository')->defaultValue(ContractorGroupRepository::class)->end()
            ->scalarNode('manager')->defaultValue(ContractorGroupManager::class)->end()
            ->end()
            ->end()
            ->end()
            ->end()
            // End ContractorGroup

            // Start ContractorGroupRelation
            ->arrayNode('contractor_group_relation')
            ->addDefaultsIfNotSet()
            ->children()
            ->arrayNode('classes')
            ->children()
            ->scalarNode('entity')->cannotBeEmpty()->end()
            ->scalarNode('interface')->defaultValue(ContractorGroupRelationInterface::class)->end()
            ->scalarNode('factory')->defaultValue(ContractorGroupRelationFactory::class)->end()
            ->scalarNode('repository')->defaultValue(ContractorGroupRelationRepository::class)->end()
            ->scalarNode('manager')->defaultValue(ContractorGroupRelationManager::class)->end()
            ->end()
            ->end()
            ->end()
            ->end()
            // End ContractorGroupRelation

            // Start ContactPerson
            ->arrayNode('contact_person')
            ->addDefaultsIfNotSet()
            ->children()
            ->arrayNode('classes')
            ->children()
            ->scalarNode('entity')->cannotBeEmpty()->end()
            ->scalarNode('interface')->defaultValue(ContactPersonInterface::class)->end()
            ->scalarNode('factory')->defaultValue(ContactPersonFactory::class)->end()
            ->scalarNode('repository')->defaultValue(ContactPersonRepository::class)->end()
            ->scalarNode('manager')->defaultValue(ContactPersonManager::class)->end()
            ->end()
            ->end()
            ->end()
            ->end()
            // End ContactPerson


            ->end()
            ->end()
            ->end();

        return $treeBuilder;
    }
}
