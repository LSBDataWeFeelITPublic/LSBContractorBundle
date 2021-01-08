<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use LSB\ContractorBundle\Entity\Contractor;

/**
 * Class ContractorRepository
 * @package LSB\ContractorBundle\Repository
 */
class ContractorRepository extends ServiceEntityRepository implements ContractorRepositoryInterface
{

    /**
     * ContractorRepository constructor.
     * @param ManagerRegistry $registry
     * @param string|null $stringClass
     */
    public function __construct(ManagerRegistry $registry, ?string $stringClass = null)
    {
        parent::__construct($registry, $stringClass ?? Contractor::class);
    }

}
