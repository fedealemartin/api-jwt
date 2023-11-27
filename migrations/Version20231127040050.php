<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231127040050 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE ciudad');
        $this->addSql('DROP TABLE provincia');
        $this->addSql('CREATE TEMPORARY TABLE __temp__usuarios AS SELECT id, username, password, roles FROM usuarios');
        $this->addSql('DROP TABLE usuarios');
        $this->addSql('CREATE TABLE usuarios (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(180) NOT NULL, password VARCHAR(255) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        )');
        $this->addSql('INSERT INTO usuarios (id, username, password, roles) SELECT id, username, password, roles FROM __temp__usuarios');
        $this->addSql('DROP TABLE __temp__usuarios');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EF687F2F85E0677 ON usuarios (username)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ciudad (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, provincia_id INTEGER NOT NULL, descripcion VARCHAR(255) NOT NULL COLLATE "BINARY", FOREIGN KEY (provincia_id) REFERENCES provincia (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX index_ciudad ON ciudad (provincia_id)');
        $this->addSql('CREATE TABLE provincia (id INTEGER PRIMARY KEY AUTOINCREMENT DEFAULT NULL, descripcion VARCHAR(255) DEFAULT NULL COLLATE "BINARY")');
        $this->addSql('CREATE TEMPORARY TABLE __temp__usuarios AS SELECT id, username, roles, password FROM usuarios');
        $this->addSql('DROP TABLE usuarios');
        $this->addSql('CREATE TABLE usuarios (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(255) DEFAULT NULL, roles BLOB DEFAULT NULL, password VARCHAR(255) DEFAULT NULL, full_name VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO usuarios (id, username, roles, password) SELECT id, username, roles, password FROM __temp__usuarios');
        $this->addSql('DROP TABLE __temp__usuarios');
    }
}
