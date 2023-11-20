<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231030162017 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE course_language (id INT AUTO_INCREMENT NOT NULL, course_id INT DEFAULT NULL, language_id INT DEFAULT NULL, short_description LONGTEXT DEFAULT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME NOT NULL, INDEX IDX_7D6F1CE3591CC992 (course_id), INDEX IDX_7D6F1CE382F1BAF4 (language_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE course_language ADD CONSTRAINT FK_7D6F1CE3591CC992 FOREIGN KEY (course_id) REFERENCES course (id)');
        $this->addSql('ALTER TABLE course_language ADD CONSTRAINT FK_7D6F1CE382F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('ALTER TABLE course DROP short_description');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE course_language DROP FOREIGN KEY FK_7D6F1CE3591CC992');
        $this->addSql('ALTER TABLE course_language DROP FOREIGN KEY FK_7D6F1CE382F1BAF4');
        $this->addSql('DROP TABLE course_language');
        $this->addSql('ALTER TABLE course ADD short_description LONGTEXT DEFAULT NULL');
    }
}
