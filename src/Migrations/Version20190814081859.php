<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190814081859 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE auto_feature (auto_id INT NOT NULL, feature_id INT NOT NULL, INDEX IDX_3592385C1D55B925 (auto_id), INDEX IDX_3592385C60E4B879 (feature_id), PRIMARY KEY(auto_id, feature_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE auto_feature ADD CONSTRAINT FK_3592385C1D55B925 FOREIGN KEY (auto_id) REFERENCES auto (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE auto_feature ADD CONSTRAINT FK_3592385C60E4B879 FOREIGN KEY (feature_id) REFERENCES feature (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE auto ADD type_id INT NOT NULL, DROP type, DROP features, CHANGE created_at created_at DATETIME NOT NULL, CHANGE updated_at updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE auto ADD CONSTRAINT FK_66BA25FAC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('CREATE INDEX IDX_66BA25FAC54C8C93 ON auto (type_id)');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B023498260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE city ADD CONSTRAINT FK_2D5B0234F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_2D5B023498260155 ON city (region_id)');
        $this->addSql('CREATE INDEX IDX_2D5B0234F92F3E70 ON city (country_id)');
        $this->addSql('ALTER TABLE region ADD CONSTRAINT FK_F62F176F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_F62F176F92F3E70 ON region (country_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE auto_feature');
        $this->addSql('ALTER TABLE auto DROP FOREIGN KEY FK_66BA25FAC54C8C93');
        $this->addSql('DROP INDEX IDX_66BA25FAC54C8C93 ON auto');
        $this->addSql('ALTER TABLE auto ADD type INT DEFAULT NULL, ADD features VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, DROP type_id, CHANGE created_at created_at DATETIME NOT NULL, CHANGE updated_at updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B023498260155');
        $this->addSql('ALTER TABLE city DROP FOREIGN KEY FK_2D5B0234F92F3E70');
        $this->addSql('DROP INDEX IDX_2D5B023498260155 ON city');
        $this->addSql('DROP INDEX IDX_2D5B0234F92F3E70 ON city');
        $this->addSql('ALTER TABLE region DROP FOREIGN KEY FK_F62F176F92F3E70');
        $this->addSql('DROP INDEX IDX_F62F176F92F3E70 ON region');
    }
}
