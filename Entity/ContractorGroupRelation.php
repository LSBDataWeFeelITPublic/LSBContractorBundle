<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use LSB\ContractorBundle\Repository\ContractorGroupRelationRepository;

/**
 * @ORM\Entity(repositoryClass=ContractorGroupRelationRepository::class)
 * @ORM\Table(name="contractor_group_relations")
 */
class ContractorGroupRelation
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var Contractor
     * @ORM\ManyToOne(targetEntity="LSB\ContractorBundle\Entity\Contractor", inversedBy="contractorGroupRelations")
     * @ORM\JoinColumn(name="contractor_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected $contractor;

    /**
     * @var ContractorGroup
     * @ORM\ManyToOne(targetEntity="LSB\ContractorBundle\Entity\ContractorGroup", inversedBy="contractorGroupRelations")
     * @ORM\JoinColumn(name="contractor_group_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected $contractorGroup;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Contractor
     */
    public function getContractor(): Contractor
    {
        return $this->contractor;
    }

    /**
     * @param Contractor $contractor
     * @return ContractorGroupRelation
     */
    public function setContractor(Contractor $contractor): ContractorGroupRelation
    {
        $this->contractor = $contractor;
        return $this;
    }

    /**
     * @return ContractorGroup
     */
    public function getContractorGroup(): ContractorGroup
    {
        return $this->contractorGroup;
    }

    /**
     * @param ContractorGroup $contractorGroup
     * @return ContractorGroupRelation
     */
    public function setContractorGroup(ContractorGroup $contractorGroup): ContractorGroupRelation
    {
        $this->contractorGroup = $contractorGroup;
        return $this;
    }


}
