<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\MappedSuperclass;
use LSB\UtilityBundle\Traits\UuidTrait;

/**
 * Class Group
 * @package LSB\ContractorBundle\Entity
 *
 * @MappedSuperclass
 */
class Group implements GroupInterface
{
    use UuidTrait;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected ?string $name;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected ?string $code;

    /**
     * @var Collection|ContractorGroupInterface[]
     * @ORM\OneToMany(targetEntity="LSB\ContractorBundle\Entity\ContractorGroupInterface", mappedBy="group", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    protected Collection $contractorGroups;

    /**
     * Group constructor.
     */
    public function __construct()
    {
        $this->generateUuid();

        $this->contractorGroups = new ArrayCollection();
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
    public function __toString(): ?string
    {
        return $this->name;
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
     * @return Group
     */
    public function setName(?string $name): Group
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
     * @return Group
     */
    public function setCode(?string $code): Group
    {
        $this->code = $code;
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
     * @return Group
     */
    public function setContractorGroups($contractorGroups)
    {
        $this->contractorGroups = $contractorGroups;
        return $this;
    }


}
