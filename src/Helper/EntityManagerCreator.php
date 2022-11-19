<?php

namespace App\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class EntityManagerCreator
{
    public static function createEntityManager(): EntityManager
    {
        // Create a simple "default" Doctrine ORM configuration for Attributes
        $config = ORMSetup::createAttributeMetadataConfiguration(
            [__DIR__."/.."],
            isDevMode: true
        );
        // or if you prefer annotation or XML
        // $config = ORMSetup::createAnnotationMetadataConfiguration(
        //    paths: array(__DIR__."/src"),
        //    isDevMode: true,
        // );
        // $config = ORMSetup::createXMLMetadataConfiguration(
        //    paths: array(__DIR__."/config/xml"),
        //    isDevMode: true,
        //);

        // database configuration parameters
        $conn = [
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../../database/db.sqlite',
        ];

        // obtaining the entity manager
        return EntityManager::create($conn, $config);
    }
}