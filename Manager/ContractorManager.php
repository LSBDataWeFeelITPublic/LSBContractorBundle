<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Manager;

use LSB\ContractorBundle\Entity\ContractorInterface;
use LSB\ContractorBundle\Factory\ContractorFactoryInterface;
use LSB\UtilityBundle\Manager\ObjectManagerInterface;
use LSB\UtilityBundle\Manager\BaseManager;

/**
 * Class ContractorManager
 * @package LSB\ContractorBundle\Manager
 */
class ContractorManager extends BaseManager
{

    /**
     * ContractorManager constructor.
     * @param ObjectManagerInterface $objectManager
     * @param ContractorFactoryInterface $factory
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        ContractorFactoryInterface $factory
    ) {
        parent::__construct($objectManager, $factory);
    }

    /**
     * @return ContractorInterface
     */
    public function createNew(): ContractorInterface
    {
        return parent::createNew();
    }
}
