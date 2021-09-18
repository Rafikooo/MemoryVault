<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210918172741 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE translation ADD language_id INT NOT NULL');
        $this->addSql('ALTER TABLE translation ADD CONSTRAINT FK_B469456F82F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id)');
        $this->addSql('CREATE INDEX IDX_B469456F82F1BAF4 ON translation (language_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE translation DROP FOREIGN KEY FK_B469456F82F1BAF4');
        $this->addSql('DROP INDEX IDX_B469456F82F1BAF4 ON translation');
        $this->addSql('ALTER TABLE translation DROP language_id');
    }
}
