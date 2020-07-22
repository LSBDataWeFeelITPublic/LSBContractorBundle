<?php
declare(strict_types=1);

namespace LSB\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CustomerGroupRelationRepository::class)
 * @ORM\Table(name="customer_group_relations")
 */
class CustomerGroupRelation
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @var Customer
     * @ORM\ManyToOne(targetEntity="LSB\CustomerBundle\Entity\Customer", inversedBy="customerGroupRelations")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected $customer;

    /**
     * @var CustomerGroup
     * @ORM\ManyToOne(targetEntity="LSB\CustomerBundle\Entity\CustomerGroup", inversedBy="customerGroupRelations")
     * @ORM\JoinColumn(name="customer_group_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected $customerGroup;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     * @return CustomerGroupRelation
     */
    public function setCustomer(Customer $customer): CustomerGroupRelation
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * @return CustomerGroup
     */
    public function getCustomerGroup(): CustomerGroup
    {
        return $this->customerGroup;
    }

    /**
     * @param CustomerGroup $customerGroup
     * @return CustomerGroupRelation
     */
    public function setCustomerGroup(CustomerGroup $customerGroup): CustomerGroupRelation
    {
        $this->customerGroup = $customerGroup;
        return $this;
    }


}
