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
use LSB\ContractorBundle\Form\ContactPersonType;
use LSB\ContractorBundle\Form\ContractorGroupRelationType;
use LSB\ContractorBundle\Form\ContractorGroupType;
use LSB\ContractorBundle\Form\ContractorType;
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
use LSB\UtilityBundle\DependencyInjection\BaseExtension as BE;

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
            ->arrayNode(BE::CONFIG_KEY_RESOURCES)->canBeUnset()
            ->children()

            // Start Contractor
            ->arrayNode('contractor')
            ->addDefaultsIfNotSet()
            ->children()
            ->arrayNode(BE::CONFIG_KEY_CLASSES)
            ->children()
            ->scalarNode(BE::CONFIG_KEY_ENTITY)->end()
            ->scalarNode(BE::CONFIG_KEY_INTERFACE)->defaultValue(ContractorInterface::class)->end()
            ->scalarNode(BE::CONFIG_KEY_FACTORY)->defaultValue(ContractorFactory::class)->end()
            ->scalarNode(BE::CONFIG_KEY_REPOSITORY)->defaultValue(ContractorRepository::class)->end()
            ->scalarNode(BE::CONFIG_KEY_MANAGER)->defaultValue(ContractorManager::class)->end()
            ->scalarNode(BE::CONFIG_KEY_FORM)->defaultValue(ContractorType::class)->end()
            ->end()
            ->end()
            ->end()
            ->end()
            // End Contractor


            // Start ContractorGroup
            ->arrayNode('contractor_group')
            ->addDefaultsIfNotSet()
            ->children()
            ->arrayNode(BE::CONFIG_KEY_CLASSES)
            ->children()
            ->scalarNode(BE::CONFIG_KEY_ENTITY)->end()
            ->scalarNode(BE::CONFIG_KEY_INTERFACE)->defaultValue(ContractorGroupInterface::class)->end()
            ->scalarNode(BE::CONFIG_KEY_FACTORY)->defaultValue(ContractorGroupFactory::class)->end()
            ->scalarNode(BE::CONFIG_KEY_REPOSITORY)->defaultValue(ContractorGroupRepository::class)->end()
            ->scalarNode(BE::CONFIG_KEY_MANAGER)->defaultValue(ContractorGroupManager::class)->end()
            ->scalarNode(BE::CONFIG_KEY_FORM)->defaultValue(ContractorGroupType::class)->end()
            ->end()
            ->end()
            ->end()
            ->end()
            // End ContractorGroup

            // Start ContractorGroupRelation
            ->arrayNode('contractor_group_relation')
            ->addDefaultsIfNotSet()
            ->children()
            ->arrayNode(BE::CONFIG_KEY_CLASSES)
            ->children()
            ->scalarNode(BE::CONFIG_KEY_ENTITY)->end()
            ->scalarNode(BE::CONFIG_KEY_INTERFACE)->defaultValue(ContractorGroupRelationInterface::class)->end()
            ->scalarNode(BE::CONFIG_KEY_FACTORY)->defaultValue(ContractorGroupRelationFactory::class)->end()
            ->scalarNode(BE::CONFIG_KEY_REPOSITORY)->defaultValue(ContractorGroupRelationRepository::class)->end()
            ->scalarNode(BE::CONFIG_KEY_MANAGER)->defaultValue(ContractorGroupRelationManager::class)->end()
            ->scalarNode(BE::CONFIG_KEY_FORM)->defaultValue(ContractorGroupRelationType::class)->end()
            ->end()
            ->end()
            ->end()
            ->end()
            // End ContractorGroupRelation

            // Start ContactPerson
            ->arrayNode('contact_person')
            ->addDefaultsIfNotSet()
            ->children()
            ->arrayNode(BE::CONFIG_KEY_CLASSES)
            ->children()
            ->scalarNode(BE::CONFIG_KEY_ENTITY)->end()
            ->scalarNode(BE::CONFIG_KEY_INTERFACE)->defaultValue(ContactPersonInterface::class)->end()
            ->scalarNode(BE::CONFIG_KEY_FACTORY)->defaultValue(ContactPersonFactory::class)->end()
            ->scalarNode(BE::CONFIG_KEY_REPOSITORY)->defaultValue(ContactPersonRepository::class)->end()
            ->scalarNode(BE::CONFIG_KEY_MANAGER)->defaultValue(ContactPersonManager::class)->end()
            ->scalarNode(BE::CONFIG_KEY_FORM)->defaultValue(ContactPersonType::class)->end()
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
