<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230305211600 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE addresses (id_address INT AUTO_INCREMENT NOT NULL, street VARCHAR(45) NOT NULL, neighborhood VARCHAR(45) NOT NULL, number VARCHAR(45) NOT NULL, PRIMARY KEY(id_address)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `admin` (id_admin INT AUTO_INCREMENT NOT NULL, email VARCHAR(45) NOT NULL, password VARCHAR(45) NOT NULL, PRIMARY KEY(id_admin)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE donations (id_donation INT AUTO_INCREMENT NOT NULL, address_id INT DEFAULT NULL, first_name VARCHAR(45) NOT NULL, last_name VARCHAR(45) NOT NULL, email VARCHAR(255) NOT NULL, donation_description VARCHAR(255) NOT NULL, donation_type VARCHAR(45) NOT NULL, INDEX IDX_CDE98962F5B7AF75 (address_id), PRIMARY KEY(id_donation)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE donations ADD CONSTRAINT FK_CDE98962F5B7AF75 FOREIGN KEY (address_id) REFERENCES addresses (id_address)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donations DROP FOREIGN KEY FK_CDE98962F5B7AF75');
        $this->addSql('DROP TABLE addresses');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE donations');
    }
}
