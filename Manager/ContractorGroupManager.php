<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Manager;

use LSB\ContractorBundle\Entity\ContractorGroupInterface;
use LSB\ContractorBundle\Factory\ContractorGroupFactoryInterface;
use LSB\UtilityBundle\Manager\ObjectManagerInterface;
use LSB\UtilityBundle\Manager\BaseManager;

/**
 * Class ContractorGroupManager
 * @package LSB\ContractorBundle\Manager
 */
class ContractorGroupManager extends BaseManager
{

    /**
     * ContractorManager constructor.
     * @param ObjectManagerInterface $objectManager
     * @param ContractorGroupFactoryInterface $factory
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        ContractorGroupFactoryInterface $factory
    ) {
        parent::__construct($objectManager, $factory);
    }

    /**
     * @return ContractorGroupInterface
     */
    public function createNew(): ContractorGroupInterface
    {
        return parent::createNew();
    }
}
