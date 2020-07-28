<?php

namespace LSB\ContractorBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use LSB\ContractorBundle\Entity\ContractorGroup;


/**
 * @method ContractorGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContractorGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContractorGroup[]    findAll()
 * @method ContractorGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContractorGroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContractorGroup::class);
    }


}
