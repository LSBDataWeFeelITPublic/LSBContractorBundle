<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Manager;

use LSB\ContractorBundle\Entity\GroupInterface;
use LSB\ContractorBundle\Factory\GroupFactoryInterface;
use LSB\ContractorBundle\Repository\GroupRepositoryInterface;
use LSB\UtilityBundle\Form\BaseEntityType;
use LSB\UtilityBundle\Manager\ObjectManagerInterface;
use LSB\UtilityBundle\Manager\BaseManager;

/**
 * Class GroupManager
 * @package LSB\ContractorBundle\Manager
 */
class GroupManager extends BaseManager
{

    /**
     * GroupManager constructor.
     * @param ObjectManagerInterface $objectManager
     * @param GroupFactoryInterface $factory
     * @param GroupRepositoryInterface $repository
     * @param BaseEntityType|null $form
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        GroupFactoryInterface $factory,
        GroupRepositoryInterface $repository,
        ?BaseEntityType $form
    ) {
        parent::__construct($objectManager, $factory, $repository, $form);
    }

    /**
     * @return GroupInterface|object
     */
    public function createNew(): GroupInterface
    {
        return parent::createNew();
    }
}
