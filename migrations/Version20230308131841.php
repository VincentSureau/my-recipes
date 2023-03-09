<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230308131841 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Rename the `user_recipe` table to `liked_recipes`';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('RENAME TABLE `user_recipe` TO `liked_recipes`');
        /* this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE liked_recipes (user_id INT NOT NULL, recipe_id INT NOT NULL, INDEX IDX_D971A1FFA76ED395 (user_id), INDEX IDX_D971A1FF59D8A214 (recipe_id), PRIMARY KEY(user_id, recipe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE liked_recipes ADD CONSTRAINT FK_D971A1FFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE liked_recipes ADD CONSTRAINT FK_D971A1FF59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_recipe DROP FOREIGN KEY FK_BFDAAA0A59D8A214');
        $this->addSql('ALTER TABLE user_recipe DROP FOREIGN KEY FK_BFDAAA0AA76ED395');
        $this->addSql('DROP TABLE user_recipe');
        */
    }

    public function down(Schema $schema): void
    {
        $this->addSql('RENAME TABLE `liked_recipes` TO `user_recipe`');

        /* this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_recipe (user_id INT NOT NULL, recipe_id INT NOT NULL, INDEX IDX_BFDAAA0A59D8A214 (recipe_id), INDEX IDX_BFDAAA0AA76ED395 (user_id), PRIMARY KEY(user_id, recipe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_recipe ADD CONSTRAINT FK_BFDAAA0A59D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_recipe ADD CONSTRAINT FK_BFDAAA0AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE liked_recipes DROP FOREIGN KEY FK_D971A1FFA76ED395');
        $this->addSql('ALTER TABLE liked_recipes DROP FOREIGN KEY FK_D971A1FF59D8A214');
        $this->addSql('DROP TABLE liked_recipes');
        */
    }
}
