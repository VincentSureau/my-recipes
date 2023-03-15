<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230315083043 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE season CHANGE start_at start_at DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', CHANGE end_at end_at DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\'');
        $this->addSql('ALTER TABLE liked_recipes RENAME INDEX idx_bfdaaa0aa76ed395 TO IDX_D971A1FFA76ED395');
        $this->addSql('ALTER TABLE liked_recipes RENAME INDEX idx_bfdaaa0a59d8a214 TO IDX_D971A1FF59D8A214');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE season CHANGE start_at start_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE end_at end_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE liked_recipes RENAME INDEX idx_d971a1ff59d8a214 TO IDX_BFDAAA0A59D8A214');
        $this->addSql('ALTER TABLE liked_recipes RENAME INDEX idx_d971a1ffa76ed395 TO IDX_BFDAAA0AA76ED395');
    }
}