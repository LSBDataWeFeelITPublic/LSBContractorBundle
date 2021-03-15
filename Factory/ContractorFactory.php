<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Factory;

use LSB\ContractorBundle\Entity\ContractorInterface;
use LSB\UtilityBundle\Factory\BaseFactory;

/**
 * Class ContractorFactory
 * @package LSB\ContractorBundle\Factory
 */
class ContractorFactory extends BaseFactory implements ContractorFactoryInterface
{

    /**
     * @return ContractorInterface
     */
    public function createNew(): ContractorInterface
    {
        return new $this->className();
    }

}
