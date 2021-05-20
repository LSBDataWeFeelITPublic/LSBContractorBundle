<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\MappedSuperclass;
use LSB\UtilityBundle\Traits\IdTrait;

/**
 * Class ContractorGroup
 * @package LSB\ContractorBundle\Entity
 *
 * @MappedSuperclass
 */
class ContractorGroup implements ContractorGroupInterface
{
    use IdTrait;

    /**
     * @var ContractorInterface|null
     * @ORM\ManyToOne(targetEntity="LSB\ContractorBundle\Entity\ContractorInterface", inversedBy="contractorGroups")
     * @ORM\JoinColumn(name="contractor_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected ?ContractorInterface $contractor;

    /**
     * @var GroupInterface|null
     * @ORM\ManyToOne(targetEntity="LSB\ContractorBundle\Entity\GroupInterface", inversedBy="contractorGroups")
     * @ORM\JoinColumn(name="group_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected ?GroupInterface $group;

    /**
     * ContractorGroup constructor.
     */
    public function __construct()
    {

    }

    public function __clone()
    {
        if ($this->getId()) {
            $this->id = null;
        }
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
     * @return ContractorGroup
     */
    public function setContractor(?ContractorInterface $contractor): ContractorGroup
    {
        $this->contractor = $contractor;
        return $this;
    }

    /**
     * @return GroupInterface|null
     */
    public function getGroup(): ?GroupInterface
    {
        return $this->group;
    }

    /**
     * @param GroupInterface|null $group
     * @return ContractorGroup
     */
    public function setGroup(?GroupInterface $group): ContractorGroup
    {
        $this->group = $group;
        return $this;
    }


}
