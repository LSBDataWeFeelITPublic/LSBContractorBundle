<?php

namespace LSB\ContractorBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use LSB\ContractorBundle\Entity\ContractorGroup;
use LSB\UtilityBundle\Repository\PaginationInterface;
use LSB\UtilityBundle\Repository\PaginationRepositoryTrait;

/**
 * Class ContractorGroupRepository
 * @package LSB\ContractorBundle\Repository
 */
class ContractorGroupRepository extends ServiceEntityRepository implements ContractorGroupRepositoryInterface, PaginationInterface
{
    use PaginationRepositoryTrait;

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
