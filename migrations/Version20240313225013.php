<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313225013 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE country CHANGE tld tld VARCHAR(255) DEFAULT NULL, CHANGE cca2 cca2 VARCHAR(255) NOT NULL, CHANGE cca3 cca3 VARCHAR(255) NOT NULL, CHANGE cioc cioc VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE country CHANGE tld tld VARCHAR(5) DEFAULT NULL, CHANGE cca2 cca2 VARCHAR(3) NOT NULL, CHANGE cca3 cca3 VARCHAR(3) NOT NULL, CHANGE cioc cioc VARCHAR(5) NOT NULL');
    }
}
