<?php

namespace LSB\ContractorBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use LSB\ContractorBundle\Entity\ContactPerson;

/**
 * Class ContactPersonRepository
 * @package LSB\ContractorBundle\Repository
 */
class ContactPersonRepository extends ServiceEntityRepository implements ContactPersonRepositoryInterface
{

    /**
     * ContactPersonRepository constructor.
     * @param ManagerRegistry $registry
     * @param string|null $stringClass
     */
    public function __construct(ManagerRegistry $registry, ?string $stringClass = null)
    {
        parent::__construct($registry, $stringClass ?? ContactPerson::class);
    }


}
