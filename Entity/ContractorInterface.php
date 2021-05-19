<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Entity;

use LSB\UtilityBundle\Interfaces\UuidInterface;

/**
 * Interface ContractorInterface
 * @package LSB\ContractorBundle\Entity
 */
interface ContractorInterface extends UuidInterface
{
    const TYPE_PRIVATE = 10;
    const TYPE_COMPANY = 20;
    const TYPE_BUDGET_UNIT = 30;
}
