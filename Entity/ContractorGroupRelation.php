<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\MappedSuperclass;
use LSB\UtilityBundle\Traits\IdTrait;

/**
 * Class ContractorGroupRelation
 * @package LSB\ContractorBundle\Entity
 *
 * @MappedSuperclass
 */
class ContractorGroupRelation implements ContractorGroupRelationInterface
{
    use IdTrait;

    /**
     * @var ContractorInterface
     * @ORM\ManyToOne(targetEntity="LSB\ContractorBundle\Entity\ContractorInterface", inversedBy="contractorGroupRelations")
     * @ORM\JoinColumn(name="contractor_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected $contractor;

    /**
     * @var ContractorGroupInterface
     * @ORM\ManyToOne(targetEntity="LSB\ContractorBundle\Entity\ContractorGroupInterface", inversedBy="contractorGroupRelations")
     * @ORM\JoinColumn(name="contractor_group_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected $contractorGroup;

    /**
     * ContractorGroupRelation constructor.
     */
    public function __construct()
    {
        $this->generateUuid();
    }

    public function __clone()
    {
        if ($this->getId()) {
            $this->id = null;
        }
        $this->generateUuid($force = true);
    }

    /**
     * @return ContractorInterface
     */
    public function getContractor(): ContractorInterface
    {
        return $this->contractor;
    }

    /**
     * @param ContractorInterface $contractor
     * @return ContractorGroupRelation
     */
    public function setContractor(ContractorInterface $contractor): ContractorGroupRelation
    {
        $this->contractor = $contractor;
        return $this;
    }

    /**
     * @return ContractorGroupInterface
     */
    public function getContractorGroup(): ContractorGroupInterface
    {
        return $this->contractorGroup;
    }

    /**
     * @param ContractorGroupInterface $contractorGroup
     * @return ContractorGroupRelation
     */
    public function setContractorGroup(ContractorGroupInterface $contractorGroup): ContractorGroupRelation
    {
        $this->contractorGroup = $contractorGroup;
        return $this;
    }

}
