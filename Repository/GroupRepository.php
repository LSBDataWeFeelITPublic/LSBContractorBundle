<?php

namespace LSB\ContractorBundle\Repository;

use Doctrine\Persistence\ManagerRegistry;
use LSB\ContractorBundle\Entity\Group;
use LSB\UtilityBundle\Repository\BaseRepository;
use LSB\UtilityBundle\Repository\PaginationInterface;
use LSB\UtilityBundle\Repository\PaginationRepositoryTrait;

/**
 * Class GroupRepository
 * @package LSB\ContractorBundle\Repository
 */
class GroupRepository extends BaseRepository implements GroupRepositoryInterface, PaginationInterface
{
    use PaginationRepositoryTrait;

    /**
     * GroupRepository constructor.
     * @param ManagerRegistry $registry
     * @param string|null $stringClass
     */
    public function __construct(ManagerRegistry $registry, ?string $stringClass = null)
    {
        parent::__construct($registry, $stringClass ?? Group::class);
    }


}
