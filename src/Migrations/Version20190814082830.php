<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190814082830 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE auto ADD user_id_id INT NOT NULL, ADD registered_id INT NOT NULL, ADD assembly_id INT NOT NULL, DROP user_id, DROP assembly, DROP registered, CHANGE created_at created_at DATETIME NOT NULL, CHANGE updated_at updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE auto ADD CONSTRAINT FK_66BA25FA9D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE auto ADD CONSTRAINT FK_66BA25FA33F613ED FOREIGN KEY (registered_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE auto ADD CONSTRAINT FK_66BA25FACA2E7D4C FOREIGN KEY (assembly_id) REFERENCES city (id)');
        $this->addSql('CREATE INDEX IDX_66BA25FA9D86650F ON auto (user_id_id)');
        $this->addSql('CREATE INDEX IDX_66BA25FA33F613ED ON auto (registered_id)');
        $this->addSql('CREATE INDEX IDX_66BA25FACA2E7D4C ON auto (assembly_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE auto DROP FOREIGN KEY FK_66BA25FA9D86650F');
        $this->addSql('ALTER TABLE auto DROP FOREIGN KEY FK_66BA25FA33F613ED');
        $this->addSql('ALTER TABLE auto DROP FOREIGN KEY FK_66BA25FACA2E7D4C');
        $this->addSql('DROP INDEX IDX_66BA25FA9D86650F ON auto');
        $this->addSql('DROP INDEX IDX_66BA25FA33F613ED ON auto');
        $this->addSql('DROP INDEX IDX_66BA25FACA2E7D4C ON auto');
        $this->addSql('ALTER TABLE auto ADD user_id INT DEFAULT NULL, ADD assembly INT DEFAULT NULL, ADD registered INT DEFAULT NULL, DROP user_id_id, DROP registered_id, DROP assembly_id, CHANGE created_at created_at DATETIME NOT NULL, CHANGE updated_at updated_at DATETIME NOT NULL');
    }
}
