<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180321160649 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE adw_geoip_ipgeobase_location (id INT AUTO_INCREMENT NOT NULL, country VARCHAR(255) DEFAULT NULL, country_fullname VARCHAR(255) DEFAULT NULL, code VARCHAR(255) NOT NULL, region VARCHAR(255) DEFAULT NULL, district VARCHAR(255) DEFAULT NULL, city VARCHAR(255) DEFAULT NULL, longitude DOUBLE PRECISION DEFAULT NULL, latitude DOUBLE PRECISION DEFAULT NULL, ip_min BIGINT NOT NULL, ip_max BIGINT NOT NULL, INDEX search_geoip_range (ip_min, ip_max), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE adw_geoip_ipgeobase_location');
    }
}
