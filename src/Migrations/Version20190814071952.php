<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190814071952 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE auto ADD user_id INT DEFAULT NULL, ADD assembly INT DEFAULT NULL, ADD registered INT DEFAULT NULL, ADD transmission VARCHAR(255) DEFAULT NULL, ADD fuel VARCHAR(255) DEFAULT NULL, ADD gear VARCHAR(255) DEFAULT NULL, ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL, CHANGE price price NUMERIC(10, 0) DEFAULT NULL, CHANGE `desc` `desc` VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE auto DROP user_id, DROP assembly, DROP registered, DROP transmission, DROP fuel, DROP gear, DROP created_at, DROP updated_at, CHANGE price price VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE `desc` `desc` NUMERIC(10, 0) DEFAULT NULL');
    }
}
