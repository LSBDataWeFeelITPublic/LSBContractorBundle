<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use LSB\UtilityBundle\Traits\CreatedUpdatedTrait;
use Doctrine\ORM\Mapping\MappedSuperclass;
use LSB\UtilityBundle\Traits\UuidTrait;

/**
 * Class Contractor
 * @package LSB\ContractorBundle\Entity
 *
 * @MappedSuperclass
 */
class Contractor implements ContractorInterface
{
    use UuidTrait;
    use CreatedUpdatedTrait;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $number;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    protected $name;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $shortName;

    /**
     * @ORM\Embedded(class="LSB\ContractorBundle\Entity\Address", columnPrefix="contractor_")
     */
    protected $address;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $taxNumber;

    /**
     * @var ContractorInterface|null
     * @ORM\ManyToOne(targetEntity="LSB\ContractorBundle\Entity\ContractorInterface", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
     */
    protected $parent;

    /**
     * @var ArrayCollection|ContractorInterface[]
     * @ORM\OneToMany(targetEntity="LSB\ContractorBundle\Entity\ContractorInterface", mappedBy="parent")
     */
    protected $children;

    /**
     * @var bool
     * @ORM\Column(type="boolean", nullable=false, options={"default" : true})
     */
    protected $isPayer = true;

    /**
     * @var bool
     * @ORM\Column(type="boolean", nullable=false, options={"default" : false})
     */
    protected $isDelivery = false;

    /**
     * @var bool
     * @ORM\Column(type="boolean", nullable=false, options={"default" : false})
     */
    protected $isRecipient = false;

    /**
     * @var ArrayCollection|ContractorGroupRelationInterface[]
     * @ORM\OneToMany(targetEntity="LSB\ContractorBundle\Entity\ContractorGroupRelationInterface", mappedBy="contractor", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $contractorGroupRelations;

    /**
     * @var float|null
     * @ORM\Column(type="decimal", precision=18, scale=2, nullable=true)
     */
    protected $discount;

    /**
     * @var ArrayCollection|ContactPersonInterface[]
     * @ORM\OneToMany(targetEntity="LSB\ContractorBundle\Entity\ContactPersonInterface", mappedBy="contractor", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $contactPersons;

    /**
     * Contractor constructor.
     */
    public function __construct()
    {
        $this->generateUuid();

        $this->address = new Address();
        $this->children = new ArrayCollection();
        $this->contractorGroupRelations = new ArrayCollection();
        $this->contactPersons = new ArrayCollection();
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
    public function __toString(): ?string
    {
        return $this->number;
    }

    /**
     * @return string|null
     */
    public function getNumber(): ?string
    {
        return $this->number;
    }

    /**
     * @param string|null $number
     * @return Contractor
     */
    public function setNumber(?string $number): Contractor
    {
        $this->number = $number;
        return $this;
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
     * @return Contractor
     */
    public function setName(?string $name): Contractor
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getShortName(): ?string
    {
        return $this->shortName;
    }

    /**
     * @param string|null $shortName
     * @return Contractor
     */
    public function setShortName(?string $shortName): Contractor
    {
        $this->shortName = $shortName;
        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return Contractor
     */
    public function setAddress(Address $address): Contractor
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTaxNumber(): ?string
    {
        return $this->taxNumber;
    }

    /**
     * @param string|null $taxNumber
     * @return Contractor
     */
    public function setTaxNumber(?string $taxNumber): Contractor
    {
        $this->taxNumber = $taxNumber;
        return $this;
    }

    /**
     * @return ContractorInterface|null
     */
    public function getParent(): ?ContractorInterface
    {
        return $this->parent;
    }

    /**
     * @param ContractorInterface|null $parent
     * @return Contractor
     */
    public function setParent(?ContractorInterface $parent): Contractor
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return ArrayCollection|ContractorInterface[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param ArrayCollection|ContractorInterface[] $children
     * @return Contractor
     */
    public function setChildren($children)
    {
        $this->children = $children;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPayer(): bool
    {
        return $this->isPayer;
    }

    /**
     * @param bool $isPayer
     * @return Contractor
     */
    public function setIsPayer(bool $isPayer): Contractor
    {
        $this->isPayer = $isPayer;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDelivery(): bool
    {
        return $this->isDelivery;
    }

    /**
     * @param bool $isDelivery
     * @return Contractor
     */
    public function setIsDelivery(bool $isDelivery): Contractor
    {
        $this->isDelivery = $isDelivery;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRecipient(): bool
    {
        return $this->isRecipient;
    }

    /**
     * @param bool $isRecipient
     * @return Contractor
     */
    public function setIsRecipient(bool $isRecipient): Contractor
    {
        $this->isRecipient = $isRecipient;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    /**
     * @param float|null $discount
     * @return Contractor
     */
    public function setDiscount(?float $discount): Contractor
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @return ArrayCollection|ContactPersonInterface[]
     */
    public function getContactPersons()
    {
        return $this->contactPersons;
    }

    /**
     * @param ArrayCollection|ContactPersonInterface[] $contactPersons
     * @return Contractor
     */
    public function setContactPersons($contactPersons)
    {
        $this->contactPersons = $contactPersons;
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
     * @param ContractorGroupRelationInterface $contractorGroupRelation
     *
     * @return Contractor
     */
    public function addContractorGroupRelation(ContractorGroupRelationInterface $contractorGroupRelation)
    {
        $contractorGroupRelation->setContractor($this);

        if (false === $this->contractorGroupRelations->contains($contractorGroupRelation)) {
            $this->contractorGroupRelations->add($contractorGroupRelation);
        }
        return $this;
    }

    /**
     * @param ContractorGroupRelationInterface $contractorGroupRelation
     *
     * @return Contractor
     */
    public function removeContractorGroupRelation(ContractorGroupRelationInterface $contractorGroupRelation)
    {
        if (true === $this->contractorGroupRelations->contains($contractorGroupRelation)) {
            $this->contractorGroupRelations->removeElement($contractorGroupRelation);
        }
        return $this;
    }

    /**
     * @param ArrayCollection|ContractorGroupRelationInterface[] $contractorGroupRelations
     * @return Contractor
     */
    public function setContractorGroupRelations($contractorGroupRelations)
    {
        $this->contractorGroupRelations = $contractorGroupRelations;
        return $this;
    }



}
