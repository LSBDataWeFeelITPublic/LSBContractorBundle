<?php

namespace LSB\ContractorBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use LSB\ContractorBundle\Entity\ContractorGroup;

/**
 * Class ContractorGroupRepository
 * @package LSB\ContractorBundle\Repository
 */
class ContractorGroupRepository extends ServiceEntityRepository implements ContractorGroupRepositoryInterface
{

    /**
     * ContractorGroupRepository constructor.
     * @param ManagerRegistry $registry
     * @param string|null $stringClass
     */
    public function __construct(ManagerRegistry $registry, ?string $stringClass = null)
    {
        parent::__construct($registry, $stringClass ?? ContractorGroup::class);
    }


}
