<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use LSB\UtilityBundle\Traits\CreatedUpdatedTrait;
use LSB\UtilityBundle\Traits\IdTrait;
use LSB\ContractorBundle\Repository\ContactPersonRepository;

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
     * @var Contractor
     * @ORM\ManyToOne(targetEntity="LSB\ContractorBundle\Entity\Contractor", inversedBy="contactPersons")
     * @ORM\JoinColumn(name="contractor_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected $contractor;

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
     * @return Contractor
     */
    public function getContractor(): Contractor
    {
        return $this->contractor;
    }

    /**
     * @param Contractor $contractor
     * @return ContactPerson
     */
    public function setContractor(Contractor $contractor): ContactPerson
    {
        $this->contractor = $contractor;
        return $this;
    }


}
