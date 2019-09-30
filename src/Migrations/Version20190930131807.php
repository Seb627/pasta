<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190930131807 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE recipe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, utensil_id INTEGER DEFAULT NULL, tag_id INTEGER DEFAULT NULL, title VARCHAR(100) NOT NULL, image VARCHAR(255) NOT NULL, cooking_time INTEGER NOT NULL, baking_time INTEGER NOT NULL, price INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_DA88B137EC4313DE ON recipe (utensil_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DA88B137BAD26311 ON recipe (tag_id)');
        $this->addSql('CREATE TABLE recipe_ingredients (recipe_id INTEGER NOT NULL, ingredients_id INTEGER NOT NULL, PRIMARY KEY(recipe_id, ingredients_id))');
        $this->addSql('CREATE INDEX IDX_9F925F2B59D8A214 ON recipe_ingredients (recipe_id)');
        $this->addSql('CREATE INDEX IDX_9F925F2B3EC4DCE ON recipe_ingredients (ingredients_id)');
        $this->addSql('CREATE TABLE tag (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(100) NOT NULL)');
        $this->addSql('CREATE TABLE avis (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, pseudo VARCHAR(100) NOT NULL, commentary CLOB NOT NULL, rate INTEGER NOT NULL)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__ingredients AS SELECT id, name, quantity, unity FROM ingredients');
        $this->addSql('DROP TABLE ingredients');
        $this->addSql('CREATE TABLE ingredients (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, unite_id INTEGER NOT NULL, name VARCHAR(100) NOT NULL COLLATE BINARY, quantity VARCHAR(50) NOT NULL COLLATE BINARY, unity VARCHAR(50) NOT NULL COLLATE BINARY, CONSTRAINT FK_4B60114FEC4A74AB FOREIGN KEY (unite_id) REFERENCES unite (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO ingredients (id, name, quantity, unity) SELECT id, name, quantity, unity FROM __temp__ingredients');
        $this->addSql('DROP TABLE __temp__ingredients');
        $this->addSql('CREATE INDEX IDX_4B60114FEC4A74AB ON ingredients (unite_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__steps AS SELECT id, title, description FROM steps');
        $this->addSql('DROP TABLE steps');
        $this->addSql('CREATE TABLE steps (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, recipe_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL COLLATE BINARY, description VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_34220A7259D8A214 FOREIGN KEY (recipe_id) REFERENCES recipe (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO steps (id, title, description) SELECT id, title, description FROM __temp__steps');
        $this->addSql('DROP TABLE __temp__steps');
        $this->addSql('CREATE INDEX IDX_34220A7259D8A214 ON steps (recipe_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE recipe');
        $this->addSql('DROP TABLE recipe_ingredients');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP INDEX IDX_4B60114FEC4A74AB');
        $this->addSql('CREATE TEMPORARY TABLE __temp__ingredients AS SELECT id, name, quantity, unity FROM ingredients');
        $this->addSql('DROP TABLE ingredients');
        $this->addSql('CREATE TABLE ingredients (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(100) NOT NULL, quantity VARCHAR(50) NOT NULL, unity VARCHAR(50) NOT NULL)');
        $this->addSql('INSERT INTO ingredients (id, name, quantity, unity) SELECT id, name, quantity, unity FROM __temp__ingredients');
        $this->addSql('DROP TABLE __temp__ingredients');
        $this->addSql('DROP INDEX IDX_34220A7259D8A214');
        $this->addSql('CREATE TEMPORARY TABLE __temp__steps AS SELECT id, title, description FROM steps');
        $this->addSql('DROP TABLE steps');
        $this->addSql('CREATE TABLE steps (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO steps (id, title, description) SELECT id, title, description FROM __temp__steps');
        $this->addSql('DROP TABLE __temp__steps');
    }
}
