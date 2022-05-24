<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211223011503 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE project_techno (project_id INT NOT NULL, techno_id INT NOT NULL, INDEX IDX_2E230596166D1F9C (project_id), INDEX IDX_2E23059651F3C1BC (techno_id), PRIMARY KEY(project_id, techno_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE project_techno ADD CONSTRAINT FK_2E230596166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_techno ADD CONSTRAINT FK_2E23059651F3C1BC FOREIGN KEY (techno_id) REFERENCES techno (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contact ADD subject VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE gallery ADD project_id INT NOT NULL');
        $this->addSql('ALTER TABLE gallery ADD CONSTRAINT FK_472B783A166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('CREATE INDEX IDX_472B783A166D1F9C ON gallery (project_id)');
        $this->addSql('ALTER TABLE project ADD updated_at DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE project_techno');
        $this->addSql('ALTER TABLE contact DROP subject');
        $this->addSql('ALTER TABLE gallery DROP FOREIGN KEY FK_472B783A166D1F9C');
        $this->addSql('DROP INDEX IDX_472B783A166D1F9C ON gallery');
        $this->addSql('ALTER TABLE gallery DROP project_id');
        $this->addSql('ALTER TABLE project DROP updated_at');
    }
}
