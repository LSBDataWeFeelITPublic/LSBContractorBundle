<?php

namespace LSB\CustomerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use LSB\CustomerBundle\Repository\CustomerRepository;
use LSB\UtilityBundle\Traits\CreatedUpdatedTrait;
use LSB\UtilityBundle\Traits\IdTrait;

/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 * @ORM\Table(name="customers")
 */
class Customer
{
    use CreatedUpdatedTrait;
    use IdTrait;

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
     * @ORM\Embedded(class="Address", columnPrefix="customer_")
     */
    protected $address;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $taxNumber;

    /**
     * @var Customer|null
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
     */
    protected $parent;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Customer", mappedBy="parent")
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
     * @ORM\OneToMany(targetEntity="LSB\CustomerBundle\Entity\CustomerGroupRelation", mappedBy="customer", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $customerGroupRelations;

    /**
     * @var float|null
     * @ORM\Column(type="decimal", precision=18, scale=2, nullable=true)
     */
    protected $discount;

    /**
     * Customer constructor.
     */
    public function __construct()
    {
        $this->generateUuid();
        $this->address = new Address();
        $this->children = new ArrayCollection();
        $this->customerGroupRelations = new ArrayCollection();
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
     * @return Customer
     */
    public function setNumber(?string $number): Customer
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
     * @return Customer
     */
    public function setName(?string $name): Customer
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
     * @return Customer
     */
    public function setShortName(?string $shortName): Customer
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
     * @return Customer
     */
    public function setAddress(Address $address): Customer
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
     * @return Customer
     */
    public function setTaxNumber(?string $taxNumber): Customer
    {
        $this->taxNumber = $taxNumber;
        return $this;
    }

    /**
     * @return Customer|null
     */
    public function getParent(): ?Customer
    {
        return $this->parent;
    }

    /**
     * @param Customer|null $parent
     * @return Customer
     */
    public function setParent(?Customer $parent): Customer
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
     * @return Customer
     */
    public function setChildren(ArrayCollection $children): Customer
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
     * @return Customer
     */
    public function setIsPayer(bool $isPayer): Customer
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
     * @return Customer
     */
    public function setIsDelivery(bool $isDelivery): Customer
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
     * @return Customer
     */
    public function setIsRecipient(bool $isRecipient): Customer
    {
        $this->isRecipient = $isRecipient;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getCustomerGroupRelations(): ArrayCollection
    {
        return $this->customerGroupRelations;
    }

    /**
     * @param ArrayCollection $customerGroupRelations
     * @return Customer
     */
    public function setCustomerGroupRelations(ArrayCollection $customerGroupRelations): Customer
    {
        $this->customerGroupRelations = $customerGroupRelations;
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
     * @return Customer
     */
    public function setDiscount(?float $discount): Customer
    {
        $this->discount = $discount;
        return $this;
    }

}
