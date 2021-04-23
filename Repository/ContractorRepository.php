<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Repository;

use Doctrine\Persistence\ManagerRegistry;
use LSB\ContractorBundle\Entity\Contractor;
use LSB\UtilityBundle\Repository\BaseRepository;
use LSB\UtilityBundle\Repository\PaginationInterface;
use LSB\UtilityBundle\Repository\PaginationRepositoryTrait;

/**
 * Class ContractorRepository
 * @package LSB\ContractorBundle\Repository
 */
class ContractorRepository extends BaseRepository implements ContractorRepositoryInterface, PaginationInterface
{
    use PaginationRepositoryTrait;

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
