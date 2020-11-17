<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\MappedSuperclass;
use LSB\UtilityBundle\Traits\UuidTrait;

/**
 * Class ContractorGroup
 * @package LSB\ContractorBundle\Entity
 *
 * @MappedSuperclass
 */
class ContractorGroup implements ContractorGroupInterface
{
    use UuidTrait;

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
     * @var ArrayCollection|ContractorGroupRelationInterface[]
     * @ORM\OneToMany(targetEntity="LSB\ContractorBundle\Entity\ContractorGroupRelationInterface", mappedBy="contractorGroup", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $contractorGroupRelations;

    /**
     * ContractorGroup constructor.
     */
    public function __construct()
    {
        $this->generateUuid();

        $this->contractorGroupRelations = new ArrayCollection();
    }

    public function __clone()
    {
        if ($this->getId()) {
            $this->id = null;
        }
        $this->generateUuid($force = true);
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
     * @return ArrayCollection|ContractorGroupRelationInterface[]
     */
    public function getContractorGroupRelations()
    {
        return $this->contractorGroupRelations;
    }

    /**
     * @param ArrayCollection|ContractorGroupRelationInterface[] $contractorGroupRelations
     * @return ContractorGroup
     */
    public function setContractorGroupRelations($contractorGroupRelations)
    {
        $this->contractorGroupRelations = $contractorGroupRelations;
        return $this;
    }

}
