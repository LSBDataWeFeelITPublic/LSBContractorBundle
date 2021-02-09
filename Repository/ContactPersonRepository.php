<?php

namespace LSB\ContractorBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use LSB\ContractorBundle\Entity\ContactPerson;
use LSB\UtilityBundle\Repository\PaginationInterface;
use LSB\UtilityBundle\Repository\PaginationRepositoryTrait;

/**
 * Class ContactPersonRepository
 * @package LSB\ContractorBundle\Repository
 */
class ContactPersonRepository extends ServiceEntityRepository implements ContactPersonRepositoryInterface, PaginationInterface
{
    use PaginationRepositoryTrait;

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
