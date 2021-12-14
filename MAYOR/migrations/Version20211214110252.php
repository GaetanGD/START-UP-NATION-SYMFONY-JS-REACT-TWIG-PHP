<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211214110252 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE activity ADD type INT NOT NULL');
        $this->addSql('ALTER TABLE picture ADD travel_id INT NOT NULL');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F89ECAB15B3 FOREIGN KEY (travel_id) REFERENCES travel (id)');
        $this->addSql('CREATE INDEX IDX_16DB4F89ECAB15B3 ON picture (travel_id)');
        $this->addSql('ALTER TABLE travel ADD advice LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE activity DROP type');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F89ECAB15B3');
        $this->addSql('DROP INDEX IDX_16DB4F89ECAB15B3 ON picture');
        $this->addSql('ALTER TABLE picture DROP travel_id');
        $this->addSql('ALTER TABLE travel DROP advice');
    }
}
