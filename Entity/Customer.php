<?php

namespace LSB\CustomerBundle\Entity;

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
     * @ORM\Embedded(class="Address", columnPrefix="customer_")
     */
    protected $address;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $taxNumber;

    public function __construct()
    {
        $this->generateUuid();
        $this->address = new Address();
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
    

}
