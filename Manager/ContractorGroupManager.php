<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Manager;

use LSB\ContractorBundle\Entity\ContractorGroupInterface;
use LSB\ContractorBundle\Factory\ContractorGroupFactoryInterface;
use LSB\ContractorBundle\Repository\ContractorGroupRepositoryInterface;
use LSB\UtilityBundle\Form\BaseEntityType;
use LSB\UtilityBundle\Manager\ObjectManagerInterface;
use LSB\UtilityBundle\Manager\BaseManager;

/**
 * Class ContractorGroupManager
 * @package LSB\ContractorBundle\Manager
 */
class ContractorGroupManager extends BaseManager
{

    /**
     * ContractorGroupManager constructor.
     * @param ObjectManagerInterface $objectManager
     * @param ContractorGroupFactoryInterface $factory
     * @param ContractorGroupRepositoryInterface $repository
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        ContractorGroupFactoryInterface $factory,
        ContractorGroupRepositoryInterface $repository,
        ?BaseEntityType $form
    ) {
        parent::__construct($objectManager, $factory, $repository, $form);
    }

    /**
     * @return ContractorGroupInterface
     */
    public function createNew(): ContractorGroupInterface
    {
        return parent::createNew();
    }
}
