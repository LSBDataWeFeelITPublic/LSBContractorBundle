<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use LSB\ContractorBundle\Repository\ContractorRepository;
use LSB\UtilityBundle\Traits\CreatedUpdatedTrait;
use LSB\UtilityBundle\Traits\IdTrait;

/**
 * @ORM\Entity(repositoryClass=ContractorRepository::class)
 * @ORM\Table(name="contractors")
 */
class Contractor
{
    use IdTrait;
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
     * @ORM\Embedded(class="Address", columnPrefix="contractor_")
     */
    protected $address;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $taxNumber;

    /**
     * @var Contractor|null
     * @ORM\ManyToOne(targetEntity="Contractor", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
     */
    protected $parent;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Contractor", mappedBy="parent")
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
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="LSB\ContractorBundle\Entity\ContractorGroupRelation", mappedBy="contractor", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $contractorGroupRelations;

    /**
     * @var float|null
     * @ORM\Column(type="decimal", precision=18, scale=2, nullable=true)
     */
    protected $discount;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="LSB\ContractorBundle\Entity\ContactPerson", mappedBy="contractor", cascade={"persist", "remove"}, orphanRemoval=true)
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
     * @return Contractor|null
     */
    public function getParent(): ?Contractor
    {
        return $this->parent;
    }

    /**
     * @param Contractor|null $parent
     * @return Contractor
     */
    public function setParent(?Contractor $parent): Contractor
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getChildren(): ArrayCollection
    {
        return $this->children;
    }

    /**
     * @param ArrayCollection $children
     * @return Contractor
     */
    public function setChildren(ArrayCollection $children): Contractor
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
     * @return ArrayCollection
     */
    public function getContractorGroupRelations(): ArrayCollection
    {
        return $this->contractorGroupRelations;
    }

    /**
     * @param ArrayCollection $contractorGroupRelations
     * @return Contractor
     */
    public function setContractorGroupRelations(ArrayCollection $contractorGroupRelations): Contractor
    {
        $this->contractorGroupRelations = $contractorGroupRelations;
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
     * @return ArrayCollection
     */
    public function getContactPersons(): ArrayCollection
    {
        return $this->contactPersons;
    }

    /**
     * @param ArrayCollection $contactPersons
     * @return Contractor
     */
    public function setContactPersons(ArrayCollection $contactPersons): Contractor
    {
        $this->contactPersons = $contactPersons;
        return $this;
    }

}
