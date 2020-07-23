<?php
declare(strict_types=1);

namespace LSB\CustomerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use LSB\UtilityBundle\Traits\CreatedUpdatedTrait;
use LSB\UtilityBundle\Traits\IdTrait;
use LSB\CustomerBundle\Repository\ContactPersonRepository;

/**
 * @ORM\Entity(repositoryClass=ContactPersonRepository::class)
 * @ORM\Table(name="contact_persons")
 */
class ContactPerson
{
    use IdTrait;
    use CreatedUpdatedTrait;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $firstName;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $lastName;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $email;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $phone;

    /**
     * @var Customer
     * @ORM\ManyToOne(targetEntity="LSB\CustomerBundle\Entity\Customer", inversedBy="contactPersons")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected $customer;

    /**
     * ContactPerson constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->generateUuid();
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
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     * @return ContactPerson
     */
    public function setFirstName(?string $firstName): ContactPerson
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     * @return ContactPerson
     */
    public function setLastName(?string $lastName): ContactPerson
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     * @return ContactPerson
     */
    public function setEmail(?string $email): ContactPerson
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     * @return ContactPerson
     */
    public function setPhone(?string $phone): ContactPerson
    {
        $this->phone = $phone;
        return $this;
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
     * @return ContactPerson
     */
    public function setCustomer(Customer $customer): ContactPerson
    {
        $this->customer = $customer;
        return $this;
    }


}
