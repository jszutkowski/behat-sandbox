<?php
declare(strict_types=1);

namespace App\Behat\Context;


use Behat\Behat\Context\Context;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\SchemaTool;
use Symfony\Bridge\Doctrine\DataFixtures\ContainerAwareLoader;
use Symfony\Component\DependencyInjection\ContainerInterface;

class FeatureContext implements Context
{
    public function __construct(
        private ContainerInterface $container,
        private EntityManagerInterface $entityManager
    ) {}

    /**
     * @BeforeScenario @fixtures
     */
    public function setupDatabase(): void
    {
        $metaData = $this->entityManager->getMetadataFactory()->getAllMetadata();
        $schemaTool = new SchemaTool($this->entityManager);
        $schemaTool->dropDatabase();
        if (!empty($metaData)) {
            $schemaTool->createSchema($metaData);
        }
    }

    /**
     * @BeforeScenario @fixtures
     */
    public function loadFixtures(): void
    {
        $loader = new ContainerAwareLoader($this->container);
        $loader->loadFromDirectory(__DIR__.'/../../DataFixtures');
        $executor = new ORMExecutor($this->entityManager);
        $executor->execute($loader->getFixtures(), true);
    }
}
