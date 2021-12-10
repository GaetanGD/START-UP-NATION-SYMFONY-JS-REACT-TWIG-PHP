<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211210112034 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, main_picture VARCHAR(255) NOT NULL, price INT NOT NULL, equipment VARCHAR(255) DEFAULT NULL, reservation TINYINT(1) NOT NULL, atmosphere INT NOT NULL, country VARCHAR(255) NOT NULL, postal_code INT NOT NULL, state VARCHAR(255) DEFAULT NULL, city VARCHAR(255) NOT NULL, address_1 VARCHAR(255) NOT NULL, address_2 VARCHAR(255) DEFAULT NULL, description LONGTEXT NOT NULL, strong_point LONGTEXT NOT NULL, weak_point LONGTEXT NOT NULL, calendar DATE NOT NULL, INDEX IDX_AC74095A9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hourly (id INT AUTO_INCREMENT NOT NULL, activity_id INT DEFAULT NULL, opening_time_monday TIME DEFAULT NULL, closure_time_monday TIME DEFAULT NULL, opening_time_tuesday TIME DEFAULT NULL, closure_time_tuesday TIME DEFAULT NULL, opening_time_wednesday TIME DEFAULT NULL, closure_time_wednesday TIME DEFAULT NULL, opening_time_thursday TIME DEFAULT NULL, closure_time_thursday TIME DEFAULT NULL, opening_time_friday TIME DEFAULT NULL, closure_time_friday TIME DEFAULT NULL, opening_time_saturday TIME DEFAULT NULL, closure_time_saturday TIME DEFAULT NULL, opening_time_sunday TIME DEFAULT NULL, closure_time_sunday TIME DEFAULT NULL, INDEX IDX_A502CDAB81C06096 (activity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, activity_id INT NOT NULL, picture VARCHAR(255) NOT NULL, INDEX IDX_16DB4F8981C06096 (activity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE travel (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, main_picture VARCHAR(255) NOT NULL, INDEX IDX_2D0B6BCE9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE travel_activity (travel_id INT NOT NULL, activity_id INT NOT NULL, INDEX IDX_C6056A1FECAB15B3 (travel_id), INDEX IDX_C6056A1F81C06096 (activity_id), PRIMARY KEY(travel_id, activity_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, newsletter TINYINT(1) NOT NULL, cgu DATETIME NOT NULL, user_picture VARCHAR(255) DEFAULT NULL, certification VARCHAR(255) DEFAULT NULL, about LONGTEXT DEFAULT NULL, budget INT DEFAULT NULL, temperature INT DEFAULT NULL, duration INT DEFAULT NULL, favorite_food VARCHAR(255) DEFAULT NULL, geographical_area VARCHAR(255) DEFAULT NULL, means_of_locomotion VARCHAR(255) DEFAULT NULL, difficulty_level INT DEFAULT NULL, accompaniement VARCHAR(255) DEFAULT NULL, comfort INT DEFAULT NULL, environment INT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095A9D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE hourly ADD CONSTRAINT FK_A502CDAB81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id)');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F8981C06096 FOREIGN KEY (activity_id) REFERENCES activity (id)');
        $this->addSql('ALTER TABLE travel ADD CONSTRAINT FK_2D0B6BCE9D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE travel_activity ADD CONSTRAINT FK_C6056A1FECAB15B3 FOREIGN KEY (travel_id) REFERENCES travel (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE travel_activity ADD CONSTRAINT FK_C6056A1F81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE hourly DROP FOREIGN KEY FK_A502CDAB81C06096');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F8981C06096');
        $this->addSql('ALTER TABLE travel_activity DROP FOREIGN KEY FK_C6056A1F81C06096');
        $this->addSql('ALTER TABLE travel_activity DROP FOREIGN KEY FK_C6056A1FECAB15B3');
        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095A9D86650F');
        $this->addSql('ALTER TABLE travel DROP FOREIGN KEY FK_2D0B6BCE9D86650F');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE hourly');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE travel');
        $this->addSql('DROP TABLE travel_activity');
        $this->addSql('DROP TABLE `user`');
    }
}
