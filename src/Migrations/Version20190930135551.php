<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190930135551 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE unite (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(50) NOT NULL)');
        $this->addSql('CREATE TABLE steps (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, recipe_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_34220A7259D8A214 ON steps (recipe_id)');
        $this->addSql('CREATE TABLE ingredients (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, unite_id INTEGER NOT NULL, name VARCHAR(100) NOT NULL, quantity VARCHAR(50) NOT NULL, unity VARCHAR(50) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_4B60114FEC4A74AB ON ingredients (unite_id)');
        $this->addSql('CREATE TABLE utensil (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(100) NOT NULL)');
        $this->addSql('CREATE TABLE recipe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, utensil_id INTEGER DEFAULT NULL, tag_id INTEGER DEFAULT NULL, title VARCHAR(100) NOT NULL, image VARCHAR(255) NOT NULL, cooking_time INTEGER NOT NULL, baking_time INTEGER NOT NULL, price INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_DA88B137EC4313DE ON recipe (utensil_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DA88B137BAD26311 ON recipe (tag_id)');
        $this->addSql('CREATE TABLE recipe_ingredients (recipe_id INTEGER NOT NULL, ingredients_id INTEGER NOT NULL, PRIMARY KEY(recipe_id, ingredients_id))');
        $this->addSql('CREATE INDEX IDX_9F925F2B59D8A214 ON recipe_ingredients (recipe_id)');
        $this->addSql('CREATE INDEX IDX_9F925F2B3EC4DCE ON recipe_ingredients (ingredients_id)');
        $this->addSql('CREATE TABLE avis (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, pseudo VARCHAR(100) NOT NULL, commentary CLOB NOT NULL, rate INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE tag (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(100) NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE unite');
        $this->addSql('DROP TABLE steps');
        $this->addSql('DROP TABLE ingredients');
        $this->addSql('DROP TABLE utensil');
        $this->addSql('DROP TABLE recipe');
        $this->addSql('DROP TABLE recipe_ingredients');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE tag');
    }
}
