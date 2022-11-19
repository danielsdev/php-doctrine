<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221119191718 extends AbstractMigration
{
    public const TABLE_NAME = 'test';

    public function getDescription(): string
    {
        return 'Create test table';
    }

    public function up(Schema $schema): void
    {
        $testTable = $schema->createTable(self::TABLE_NAME);
        $testTable->addColumn('id', Types::INTEGER)
            ->setAutoincrement(true);
        $testTable->addColumn('test', Types::STRING);
        $testTable->setPrimaryKey(['id']);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable(self::TABLE_NAME);
    }
}
