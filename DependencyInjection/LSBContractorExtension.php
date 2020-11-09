<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\DependencyInjection;

use LSB\UtilityBundle\DependencyInjection\BaseExtension;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class LSBContractorExtension extends BaseExtension
{
    const CONFIG_PREFIX = 'lsb_contractor';
    protected $dir = __DIR__;
}
