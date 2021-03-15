<?php
declare(strict_types=1);

namespace LSB\ContractorBundle\Tests;

use LSB\ContractorBundle\Entity\ContractorInterface;
use LSB\ContractorBundle\Factory\ContractorFactory;
use LSB\ContractorBundle\Factory\ContractorFactoryInterface;
use LSB\ContractorBundle\Manager\ContractorManager;
use LSB\ContractorBundle\Repository\ContractorRepository;
use LSB\ContractorBundle\Repository\ContractorRepositoryInterface;
use LSB\UtilityBundle\Manager\ObjectManager;
use PHPUnit\Framework\TestCase;

/**
 * Class ContractorManagerTest
 * @package LSB\ContractorBundle\Tests
 */
class ContractorManagerTest extends TestCase
{

    /**
     * Assert returned interfaces
     * @throws \Exception
     */
    public function testReturnedInterfaces()
    {
        $objectManagerMock = $this->createMock(ObjectManager::class);
        $contractorFactoryMock = $this->createMock(ContractorFactory::class);
        $contractorRepositoryMock = $this->createMock(ContractorRepository::class);

        $contractorManager = new ContractorManager($objectManagerMock, $contractorFactoryMock, $contractorRepositoryMock, null);

        $this->assertInstanceOf(ContractorInterface::class, $contractorManager->createNew());
        $this->assertInstanceOf(ContractorFactoryInterface::class, $contractorManager->getFactory());
        $this->assertInstanceOf(ContractorRepositoryInterface::class, $contractorManager->getRepository());
    }

}
