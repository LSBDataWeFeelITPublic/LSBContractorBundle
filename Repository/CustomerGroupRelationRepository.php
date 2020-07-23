<?php

namespace LSB\CustomerBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use LSB\CustomerBundle\Entity\CustomerGroupRelation;


/**
 * @method CustomerGroupRelation|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomerGroupRelation|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomerGroupRelation[]    findAll()
 * @method CustomerGroupRelation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerGroupRelationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CustomerGroupRelation::class);
    }


}
