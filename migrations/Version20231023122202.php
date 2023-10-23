<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231023122202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course ADD currency_id INT DEFAULT NULL, ADD country_id INT DEFAULT NULL, ADD training_programs JSON NOT NULL, ADD learning_outcomes JSON NOT NULL, ADD info VARCHAR(255) DEFAULT NULL, DROP content');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB938248176 FOREIGN KEY (currency_id) REFERENCES currency (id)');
        $this->addSql('ALTER TABLE course ADD CONSTRAINT FK_169E6FB9F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_169E6FB938248176 ON course (currency_id)');
        $this->addSql('CREATE INDEX IDX_169E6FB9F92F3E70 ON course (country_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB938248176');
        $this->addSql('ALTER TABLE course DROP FOREIGN KEY FK_169E6FB9F92F3E70');
        $this->addSql('DROP INDEX IDX_169E6FB938248176 ON course');
        $this->addSql('DROP INDEX IDX_169E6FB9F92F3E70 ON course');
        $this->addSql('ALTER TABLE course ADD content LONGTEXT DEFAULT NULL, DROP currency_id, DROP country_id, DROP training_programs, DROP learning_outcomes, DROP info');
    }
}
