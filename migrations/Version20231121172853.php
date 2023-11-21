<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231121172853 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_language (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, language_id INT DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_63A1F5CE12469DE2 (category_id), INDEX IDX_63A1F5CE82F1BAF4 (language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_language ADD CONSTRAINT FK_63A1F5CE12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE category_language ADD CONSTRAINT FK_63A1F5CE82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE category DROP slug, DROP name');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_language DROP FOREIGN KEY FK_63A1F5CE12469DE2');
        $this->addSql('ALTER TABLE category_language DROP FOREIGN KEY FK_63A1F5CE82F1BAF4');
        $this->addSql('DROP TABLE category_language');
        $this->addSql('ALTER TABLE category ADD slug VARCHAR(255) DEFAULT NULL, ADD name VARCHAR(255) NOT NULL');
    }
}
