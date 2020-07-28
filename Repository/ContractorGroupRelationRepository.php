<?php

namespace LSB\ContractorBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use LSB\ContractorBundle\Entity\ContractorGroupRelation;


/**
 * @method ContractorGroupRelation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContractorGroupRelation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContractorGroupRelation[]    findAll()
 * @method ContractorGroupRelation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContractorGroupRelationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContractorGroupRelation::class);
    }


}
