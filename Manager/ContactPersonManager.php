<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Manager;

use LSB\ContractorBundle\Entity\ContactPersonInterface;
use LSB\ContractorBundle\Factory\ContactPersonFactoryInterface;
use LSB\UtilityBundle\Manager\ObjectManagerInterface;
use LSB\UtilityBundle\Manager\BaseManager;

/**
 * Class ContactPersonManager
 * @package LSB\ContractorBundle\Manager
 */
class ContactPersonManager extends BaseManager
{

    /**
     * ContractorManager constructor.
     * @param ObjectManagerInterface $objectManager
     * @param ContactPersonFactoryInterface $factory
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        ContactPersonFactoryInterface $factory
    ) {
        parent::__construct($objectManager, $factory);
    }

    /**
     * @return ContactPersonInterface
     */
    public function createNew(): ContactPersonInterface
    {
        return parent::createNew();
    }
}
