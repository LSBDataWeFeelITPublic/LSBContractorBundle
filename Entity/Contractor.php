<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @var integer|null
     * @ORM\Column(type="integer", nullable=true, options={"default": 20})
     */
    protected ?int $type = self::TYPE_COMPANY;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected ?string $number = null;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=500, nullable=true)
     */
    protected ?string $name = null;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected ?string $shortName = null;

    /**
     * @ORM\Embedded(class="LSB\ContractorBundle\Entity\Address", columnPrefix="contractor_")
     */
    protected ?Address $address = null;

    // TODO create property for Country (probably from LocaleBundle?)

    /**
     * @var string|null
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected ?string $taxNumber = null;

    /**
     * @var ContractorInterface|null
     * @ORM\ManyToOne(targetEntity="LSB\ContractorBundle\Entity\ContractorInterface", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", nullable=true)
     */
    protected ?ContractorInterface $parent = null;

    /**
     * @var Collection|ContractorInterface[]
     * @ORM\OneToMany(targetEntity="LSB\ContractorBundle\Entity\ContractorInterface", mappedBy="parent")
     */
    protected Collection $children;

    /**
     * @var bool
     * @ORM\Column(type="boolean", nullable=false, options={"default" : true})
     */
    protected bool $isPayer = true;

    /**
     * @var bool
     * @ORM\Column(type="boolean", nullable=false, options={"default" : false})
     */
    protected bool $isDelivery = false;

    /**
     * @var bool
     * @ORM\Column(type="boolean", nullable=false, options={"default" : false})
     */
    protected bool $isRecipient = false;

    /**
     * @var Collection|ContractorGroupInterface[]
     * @ORM\OneToMany(targetEntity="LSB\ContractorBundle\Entity\ContractorGroupInterface", mappedBy="contractor", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected Collection $contractorGroups;

    /**
     * @var float|null
     * @ORM\Column(type="decimal", precision=18, scale=2, nullable=true)
     */
    protected ?float $discount = null;

    /**
     * @var Collection|ContactPersonInterface[]
     * @ORM\OneToMany(targetEntity="LSB\ContractorBundle\Entity\ContactPersonInterface", mappedBy="contractor", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected Collection $contactPersons;

    /**
     * Contractor constructor.
     */
    public function __construct()
    {
        $this->generateUuid();

        $this->address = new Address();
        $this->children = new ArrayCollection();
        $this->contractorGroups = new ArrayCollection();
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
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->number;
    }

    /**
     * @return int|null
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @param int|null $type
     * @return Contractor
     */
    public function setType(?int $type): Contractor
    {
        $this->type = $type;
        return $this;
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
     * @return Address|null
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * @param Address|null $address
     * @return Contractor
     */
    public function setAddress(?Address $address): Contractor
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
     * @return Collection|ContractorInterface[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param Collection|ContractorInterface[] $children
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
     * @return Collection|ContractorGroupInterface[]
     */
    public function getContractorGroups()
    {
        return $this->contractorGroups;
    }

    /**
     * @param Collection|ContractorGroupInterface[] $contractorGroups
     * @return Contractor
     */
    public function setContractorGroups($contractorGroups)
    {
        $this->contractorGroups = $contractorGroups;
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
     * @return Collection|ContactPersonInterface[]
     */
    public function getContactPersons()
    {
        return $this->contactPersons;
    }

    /**
     * @param Collection|ContactPersonInterface[] $contactPersons
     * @return Contractor
     */
    public function setContactPersons($contactPersons)
    {
        $this->contactPersons = $contactPersons;
        return $this;
    }

}
