<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313211759 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, commonname VARCHAR(255) NOT NULL, officialname VARCHAR(255) NOT NULL, nativeofficialname VARCHAR(255) NOT NULL, nativecommonname VARCHAR(255) NOT NULL, tld VARCHAR(5) DEFAULT NULL, cca2 VARCHAR(3) NOT NULL, ccn3 INT NOT NULL, cca3 VARCHAR(3) NOT NULL, cioc VARCHAR(5) NOT NULL, independent TINYINT(1) NOT NULL, status VARCHAR(255) NOT NULL, unmember TINYINT(1) NOT NULL, currencies VARCHAR(255) NOT NULL, callingcode VARCHAR(255) NOT NULL, capital VARCHAR(255) NOT NULL, altspellings VARCHAR(255) NOT NULL, region VARCHAR(255) NOT NULL, subregion VARCHAR(255) NOT NULL, lenguages LONGTEXT NOT NULL, translations LONGTEXT DEFAULT NULL, geographiccoords VARCHAR(255) NOT NULL, land_locked TINYINT(1) NOT NULL, borders VARCHAR(255) DEFAULT NULL, area DOUBLE PRECISION NOT NULL, demonyms VARCHAR(255) NOT NULL, flag VARCHAR(255) NOT NULL, maps VARCHAR(255) NOT NULL, population BIGINT NOT NULL, gini VARCHAR(255) DEFAULT NULL, fifa VARCHAR(255) NOT NULL, car VARCHAR(255) NOT NULL, timezones VARCHAR(255) NOT NULL, continents VARCHAR(255) NOT NULL, flags VARCHAR(255) NOT NULL, coat_of_arms VARCHAR(255) DEFAULT NULL, start_of_week VARCHAR(255) NOT NULL, capital_coords VARCHAR(255) NOT NULL, postal_code_format VARCHAR(255) NOT NULL, postal_code_regex VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE country');
    }
}
