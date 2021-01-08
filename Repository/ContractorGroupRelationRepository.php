<?php

namespace LSB\ContractorBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use LSB\ContractorBundle\Entity\ContractorGroupRelation;

/**
 * Class ContractorGroupRelationRepository
 * @package LSB\ContractorBundle\Repository
 */
class ContractorGroupRelationRepository extends ServiceEntityRepository implements ContractorGroupRelationRepositoryInterface
{
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
