<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Manager;

use LSB\ContractorBundle\Entity\ContractorInterface;
use LSB\ContractorBundle\Factory\ContractorFactoryInterface;
use LSB\ContractorBundle\Repository\ContractorRepositoryInterface;
use LSB\UtilityBundle\Factory\FactoryInterface;
use LSB\UtilityBundle\Form\BaseEntityType;
use LSB\UtilityBundle\Manager\ObjectManagerInterface;
use LSB\UtilityBundle\Manager\BaseManager;
use LSB\UtilityBundle\Repository\RepositoryInterface;

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
     * @param ContractorRepositoryInterface $repository
     * @param BaseEntityType|null $form
     */
    public function __construct(
        ObjectManagerInterface $objectManager,
        ContractorFactoryInterface $factory,
        ContractorRepositoryInterface $repository,
        ?BaseEntityType $form
    ) {
        parent::__construct($objectManager, $factory, $repository, $form);
    }

    /**
     * @return ContractorInterface|object
     */
    public function createNew(): ContractorInterface
    {
        return parent::createNew();
    }

    /**
     * @return ContractorFactoryInterface|FactoryInterface
     */
    public function getFactory(): ContractorFactoryInterface
    {
        return $this->factory;
    }

    /**
     * @return ContractorRepositoryInterface|RepositoryInterface
     */
    public function getRepository(): ContractorRepositoryInterface
    {
        if (!$this->repository instanceof ContractorRepositoryInterface) {
            throw new \Exception('Missing repository service');
        }

        return $this->repository;
    }
}
