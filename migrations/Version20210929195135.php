<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210929195135 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE flashcard ADD owner_id INT NOT NULL, CHANGE hint hint TINYTEXT NOT NULL');
        $this->addSql('ALTER TABLE flashcard ADD CONSTRAINT FK_70511A097E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_70511A097E3C61F9 ON flashcard (owner_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE flashcard DROP FOREIGN KEY FK_70511A097E3C61F9');
        $this->addSql('DROP INDEX IDX_70511A097E3C61F9 ON flashcard');
        $this->addSql('ALTER TABLE flashcard DROP owner_id, CHANGE hint hint VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`');
    }
}
