<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231111113029 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE country CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE course DROP is_published, DROP extra_details, DROP training_programs, DROP learning_outcomes, DROP info, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE course_language ADD is_published TINYINT(1) NOT NULL, ADD info VARCHAR(255) DEFAULT NULL, ADD learning_outcomes JSON DEFAULT NULL, ADD training_programs JSON DEFAULT NULL, ADD extra_details JSON DEFAULT NULL, CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE currency CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE language CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE tag CHANGE created_at created_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE vich_file CHANGE created_at created_at DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE vich_file CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE tag CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE language CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE currency CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE course_language DROP is_published, DROP info, DROP learning_outcomes, DROP training_programs, DROP extra_details, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE course ADD is_published TINYINT(1) NOT NULL, ADD extra_details JSON NOT NULL, ADD training_programs JSON NOT NULL, ADD learning_outcomes JSON NOT NULL, ADD info VARCHAR(255) DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE country CHANGE created_at created_at DATETIME DEFAULT NULL');
    }
}
