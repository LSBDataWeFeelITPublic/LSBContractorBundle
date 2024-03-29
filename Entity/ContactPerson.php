<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use LSB\UtilityBundle\Traits\CreatedUpdatedTrait;
use Doctrine\ORM\Mapping\MappedSuperclass;
use LSB\UtilityBundle\Traits\UuidTrait;

/**
 * Class ContactPerson
 * @package LSB\ContractorBundle\Entity
 *
 * @MappedSuperclass
 */
class ContactPerson implements ContactPersonInterface
{
    use UuidTrait;
    use CreatedUpdatedTrait;

    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected ?string $firstName;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected ?string $lastName;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    protected ?string $gender;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected ?string $email;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected ?string $phone;

    /**
     * @var ContractorInterface|null
     * @ORM\ManyToOne(targetEntity="LSB\ContractorBundle\Entity\ContractorInterface", inversedBy="contactPersons")
     * @ORM\JoinColumn(name="contractor_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected ?ContractorInterface $contractor;

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
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->email;
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
     * @return ContractorInterface|null
     */
    public function getContractor(): ?ContractorInterface
    {
        return $this->contractor;
    }

    /**
     * @param ContractorInterface|null $contractor
     * @return ContactPerson
     */
    public function setContractor(?ContractorInterface $contractor): ContactPerson
    {
        $this->contractor = $contractor;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getGender(): ?string
    {
        return $this->gender;
    }

    /**
     * @param string|null $gender
     * @return ContactPerson
     */
    public function setGender(?string $gender): ContactPerson
    {
        $this->gender = $gender;
        return $this;
    }

}
