<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250222104744 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE confirmation (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(50) NOT NULL, firstname VARCHAR(50) NOT NULL, email VARCHAR(100) NOT NULL, adults_count INTEGER NOT NULL, children_count INTEGER NOT NULL, additional_info CLOB DEFAULT NULL, sleep_on_site BOOLEAN NOT NULL, brunch_on_sunday BOOLEAN DEFAULT NULL, accommodation_type VARCHAR(50) NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE confirmation');
    }
}
