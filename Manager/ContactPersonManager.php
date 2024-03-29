<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Manager;

use LSB\ContractorBundle\Entity\ContactPersonInterface;
use LSB\ContractorBundle\Factory\ContactPersonFactoryInterface;
use LSB\ContractorBundle\Repository\ContactPersonRepositoryInterface;
use LSB\UtilityBundle\Manager\ObjectManagerInterface;
use LSB\UtilityBundle\Manager\BaseManager;
use LSB\UtilityBundle\Form\BaseEntityType;

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
     * @param BaseEntityType|null $form
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        ContactPersonFactoryInterface $factory,
        ContactPersonRepositoryInterface $repository,
        ?BaseEntityType $form
    ) {
        parent::__construct($objectManager, $factory, $repository, $form);
    }

    /**
     * @return ContactPersonInterface|object
     */
    public function createNew(): ContactPersonInterface
    {
        return parent::createNew();
    }
}
