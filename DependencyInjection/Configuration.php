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
use LSB\ContractorBundle\LSBContractorBundle;
use LSB\ContractorBundle\Manager\ContactPersonManager;
use LSB\ContractorBundle\Manager\ContractorGroupManager;
use LSB\ContractorBundle\Manager\ContractorGroupRelationManager;
use LSB\ContractorBundle\Manager\ContractorManager;
use LSB\ContractorBundle\Repository\ContactPersonRepository;
use LSB\ContractorBundle\Repository\ContractorGroupRelationRepository;
use LSB\ContractorBundle\Repository\ContractorGroupRepository;
use LSB\ContractorBundle\Repository\ContractorRepository;
use LSB\UtilityBundle\Config\Definition\Builder\TreeBuilder;
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
            ->bundleTranslationDomainScalar(LSBContractorBundle::class)->end()
            ->resourcesNode()
            ->children()
            ->resourceNode(
                'contractor',
                ContractorInterface::class,
                ContractorFactory::class,
                ContractorRepository::class,
                ContractorManager::class,
                ContractorType::class
            )
            ->end()
            ->resourceNode(
                'contractor_group',
                ContractorGroupInterface::class,
                ContractorGroupFactory::class,
                ContractorGroupRepository::class,
                ContractorGroupManager::class,
                ContractorGroupType::class
            )
            ->end()
            ->resourceNode(
                'contractor_group_relation',
                ContractorGroupRelationInterface::class,
                ContractorGroupRelationFactory::class,
                ContractorGroupRelationRepository::class,
                ContractorGroupRelationManager::class,
                ContractorGroupRelationType::class
            )
            ->end()
            ->resourceNode(
                'contact_person',
                ContactPersonInterface::class,
                ContactPersonFactory::class,
                ContactPersonRepository::class,
                ContactPersonManager::class,
                ContactPersonType::class
            )
            ->end()
            ->end()
            ->end()
            ->end();

        return $treeBuilder;
    }
}
