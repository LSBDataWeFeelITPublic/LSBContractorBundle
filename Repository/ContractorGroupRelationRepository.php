<?php

namespace LSB\ContractorBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use LSB\ContractorBundle\Entity\ContractorGroupRelation;

/**
 * Class ContractorGroupRelationRepository
 * @package LSB\ContractorBundle\Repository
 */
class ContractorGroupRelationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContractorGroupRelation::class);
    }


}
