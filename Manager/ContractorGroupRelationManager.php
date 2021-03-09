<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Manager;

use LSB\ContractorBundle\Entity\ContractorGroupRelationInterface;
use LSB\ContractorBundle\Factory\ContractorGroupRelationFactoryInterface;
use LSB\ContractorBundle\Repository\ContractorGroupRelationRepositoryInterface;
use LSB\UtilityBundle\Form\BaseEntityType;
use LSB\UtilityBundle\Manager\ObjectManagerInterface;
use LSB\UtilityBundle\Manager\BaseManager;

/**
 * Class ContractorGroupRelationManager
 * @package LSB\ContractorBundle\Manager
 */
class ContractorGroupRelationManager extends BaseManager
{

    /**
     * ContractorGroupRelationManager constructor.
     * @param ObjectManagerInterface $objectManager
     * @param ContractorGroupRelationFactoryInterface $factory
     * @param ContractorGroupRelationRepositoryInterface $repository
     * @param BaseEntityType|null $form
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        ContractorGroupRelationFactoryInterface $factory,
        ContractorGroupRelationRepositoryInterface $repository,
        ?BaseEntityType $form
    ) {
        parent::__construct($objectManager, $factory, $repository, $form);
    }

    /**
     * @return ContractorGroupRelationInterface|object
     */
    public function createNew(): ContractorGroupRelationInterface
    {
        return parent::createNew();
    }
}
