<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Manager;

use LSB\ContractorBundle\Entity\ContactPersonInterface;
use LSB\ContractorBundle\Factory\ContactPersonFactoryInterface;
use LSB\ContractorBundle\Repository\ContactPersonRepositoryInterface;
use LSB\UtilityBundle\Manager\ObjectManagerInterface;
use LSB\UtilityBundle\Manager\BaseManager;

/**
 * Class ContactPersonManager
 * @package LSB\ContractorBundle\Manager
 */
class ContactPersonManager extends BaseManager
{

    /**
     * ContactPersonManager constructor.
     * @param ObjectManagerInterface $objectManager
     * @param ContactPersonFactoryInterface $factory
     * @param ContactPersonRepositoryInterface $repository
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        ContactPersonFactoryInterface $factory,
        ContactPersonRepositoryInterface $repository
    ) {
        parent::__construct($objectManager, $factory, $repository);
    }

    /**
     * @return ContactPersonInterface
     */
    public function createNew(): ContactPersonInterface
    {
        return parent::createNew();
    }
}
