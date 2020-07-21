<?php

namespace LSB\CustomerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use LSB\UtilityBundle\Traits\CreatedUpdatedTrait;
use LSB\UtilityBundle\Traits\IdTrait;
use LSB\CustomerBundle\Repository\CustomerRepository;

/**
 * @ORM\Entity(repositoryClass=CustomerRepository::class)
 * @ORM\Table(name="customers")
 */
class Customer
{
    use IdTrait;
    use CreatedUpdatedTrait;

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
     * @var boolean
     * @ORM\Column(type="boolean", nullable=false, options={"default" : true})
     */
    protected $isPayer = true;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=false, options={"default" : false})
     */
    protected $isDelivery = false;

    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=false, options={"default" : false})
     */
    protected $isRecipient = false;

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
     * Customer constructor.
     */
    public function __construct()
    {
        $this->generateUuid();
        $this->address = new Address();
        $this->children = new ArrayCollection();
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

}
