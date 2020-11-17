<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Manager;

use LSB\ContractorBundle\Entity\ContractorGroupRelationInterface;
use LSB\ContractorBundle\Factory\ContractorGroupRelationFactoryInterface;
use LSB\UtilityBundle\Manager\ObjectManagerInterface;
use LSB\UtilityBundle\Manager\BaseManager;

/**
 * Class ContractorGroupRelationManager
 * @package LSB\ContractorBundle\Manager
 */
class ContractorGroupRelationManager extends BaseManager
{

    /**
     * ContractorManager constructor.
     * @param ObjectManagerInterface $objectManager
     * @param ContractorGroupRelationFactoryInterface $factory
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        ContractorGroupRelationFactoryInterface $factory
    ) {
        parent::__construct($objectManager, $factory);
    }

    /**
     * @return ContractorGroupRelationInterface
     */
    public function createNew(): ContractorGroupRelationInterface
    {
        return parent::createNew();
    }
}