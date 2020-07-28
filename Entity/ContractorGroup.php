<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use LSB\ContractorBundle\Repository\ContractorGroupRepository;

/**
 * @ORM\Entity(repositoryClass=ContractorGroupRepository::class)
 * @ORM\Table(name="contractor_groups")
 */
class ContractorGroup
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $name;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $code;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="LSB\ContractorBundle\Entity\ContractorGroupRelation", mappedBy="contractorGroup", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $contractorGroupRelations;

    /**
     * ContractorGroup constructor.
     */
    public function __construct()
    {
        $this->contractorGroupRelations = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return ContractorGroup
     */
    public function setName(?string $name): ContractorGroup
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param string|null $code
     * @return ContractorGroup
     */
    public function setCode(?string $code): ContractorGroup
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getContractorGroupRelations(): ArrayCollection
    {
        return $this->contractorGroupRelations;
    }

    /**
     * @param ArrayCollection $contractorGroupRelations
     * @return ContractorGroup
     */
    public function setContractorGroupRelations(ArrayCollection $contractorGroupRelations): ContractorGroup
    {
        $this->contractorGroupRelations = $contractorGroupRelations;
        return $this;
    }

}
