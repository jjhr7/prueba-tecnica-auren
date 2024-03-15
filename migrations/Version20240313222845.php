<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313222845 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE country ADD common_name VARCHAR(255) NOT NULL, ADD official_name VARCHAR(255) NOT NULL, ADD native_data LONGTEXT NOT NULL, ADD calling_code VARCHAR(255) NOT NULL, ADD alt_spellings VARCHAR(255) NOT NULL, ADD geographic_coords VARCHAR(255) NOT NULL, ADD time_zones VARCHAR(255) NOT NULL, ADD postal_code_data VARCHAR(255) NOT NULL, DROP commonname, DROP officialname, DROP nativeofficialname, DROP nativecommonname, DROP callingcode, DROP altspellings, DROP geographiccoords, DROP timezones, DROP postal_code_format, DROP postal_code_regex, CHANGE unmember un_member TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE country ADD commonname VARCHAR(255) NOT NULL, ADD officialname VARCHAR(255) NOT NULL, ADD nativeofficialname VARCHAR(255) NOT NULL, ADD nativecommonname VARCHAR(255) NOT NULL, ADD callingcode VARCHAR(255) NOT NULL, ADD altspellings VARCHAR(255) NOT NULL, ADD geographiccoords VARCHAR(255) NOT NULL, ADD timezones VARCHAR(255) NOT NULL, ADD postal_code_format VARCHAR(255) NOT NULL, ADD postal_code_regex VARCHAR(255) NOT NULL, DROP common_name, DROP official_name, DROP native_data, DROP calling_code, DROP alt_spellings, DROP geographic_coords, DROP time_zones, DROP postal_code_data, CHANGE un_member unmember TINYINT(1) NOT NULL');
    }
}
