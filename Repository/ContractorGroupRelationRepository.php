<?php

namespace LSB\ContractorBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use LSB\ContractorBundle\Entity\ContractorGroupRelation;
use LSB\UtilityBundle\Repository\PaginationInterface;
use LSB\UtilityBundle\Repository\PaginationRepositoryTrait;

/**
 * Class ContractorGroupRelationRepository
 * @package LSB\ContractorBundle\Repository
 */
class ContractorGroupRelationRepository extends ServiceEntityRepository implements ContractorGroupRelationRepositoryInterface, PaginationInterface
{
    use PaginationRepositoryTrait;

    /**
     * ContractorGroupRelationRepository constructor.
     * @param ManagerRegistry $registry
     * @param string|null $stringClass
     */
    public function __construct(ManagerRegistry $registry, ?string $stringClass = null)
    {
        parent::__construct($registry, $stringClass ?? ContractorGroupRelation::class);
    }


}
