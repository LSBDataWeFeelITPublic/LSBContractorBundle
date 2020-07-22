<?php
declare(strict_types=1);

namespace LSB\CustomerBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerGroupRepository::class)
 * @ORM\Table(name="customer_groups")
 */
class CustomerGroup
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
     * @ORM\OneToMany(targetEntity="LSB\CustomerBundle\Entity\CustomerGroupRelation", mappedBy="customerGroup", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected $customerGroupRelations;

    /**
     * CustomerGroup constructor.
     */
    public function __construct()
    {
        $this->customerGroupRelations = new ArrayCollection();
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
     * @return CustomerGroup
     */
    public function setName(?string $name): CustomerGroup
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
     * @return CustomerGroup
     */
    public function setCode(?string $code): CustomerGroup
    {
        $this->code = $code;
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
     * @return CustomerGroup
     */
    public function setCustomerGroupRelations(ArrayCollection $customerGroupRelations): CustomerGroup
    {
        $this->customerGroupRelations = $customerGroupRelations;
        return $this;
    }

}
