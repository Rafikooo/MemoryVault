<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210929164443 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE flashcard ADD category_id INT NOT NULL, ADD answer LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE flashcard ADD CONSTRAINT FK_70511A0912469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_70511A0912469DE2 ON flashcard (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE flashcard DROP FOREIGN KEY FK_70511A0912469DE2');
        $this->addSql('DROP INDEX IDX_70511A0912469DE2 ON flashcard');
        $this->addSql('ALTER TABLE flashcard DROP category_id, DROP answer');
    }
}
