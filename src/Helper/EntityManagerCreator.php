<?php

namespace App\Helper;

use Doctrine\DBAL\Logging\Middleware;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\ConsoleOutput;

class EntityManagerCreator
{
    public static function createEntityManager(): EntityManager
    {
        // Create a simple "default" Doctrine ORM configuration for Attributes
        $config = ORMSetup::createAttributeMetadataConfiguration(
            [__DIR__."/.."],
            isDevMode: true
        );
        $consoleOutput = new ConsoleOutput(ConsoleOutput::VERBOSITY_DEBUG);
        $consoleLogger = new ConsoleLogger($consoleOutput);
        $config->setMiddlewares([
            new Middleware($consoleLogger)
        ]);

        // database configuration parameters
        $conn = [
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../../database/db.sqlite',
        ];

        return EntityManager::create($conn, $config);
    }
}