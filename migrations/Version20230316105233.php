<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230316105233 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ingredient ADD updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE user ADD is_verified TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE liked_recipes RENAME INDEX idx_bfdaaa0aa76ed395 TO IDX_D971A1FFA76ED395');
        $this->addSql('ALTER TABLE liked_recipes RENAME INDEX idx_bfdaaa0a59d8a214 TO IDX_D971A1FF59D8A214');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('ALTER TABLE user DROP is_verified');
        $this->addSql('ALTER TABLE ingredient DROP updated_at');
        $this->addSql('ALTER TABLE liked_recipes RENAME INDEX idx_d971a1ff59d8a214 TO IDX_BFDAAA0A59D8A214');
        $this->addSql('ALTER TABLE liked_recipes RENAME INDEX idx_d971a1ffa76ed395 TO IDX_BFDAAA0AA76ED395');
    }
}
