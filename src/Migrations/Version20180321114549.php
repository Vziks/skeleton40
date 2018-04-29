<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180321114549 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE seo_redirect_rules (id VARCHAR(255) NOT NULL, source_template VARCHAR(255) NOT NULL, destination VARCHAR(255) NOT NULL, code INT NOT NULL, priority INT NOT NULL, stopped TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seo_rules (id VARCHAR(255) NOT NULL, pattern VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, meta_tags LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', extra LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', priority INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('mysql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE seo_redirect_rules');
        $this->addSql('DROP TABLE seo_rules');
    }
}
