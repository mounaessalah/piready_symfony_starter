<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250221144142 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artwork (id INT AUTO_INCREMENT NOT NULL, commande_id INT DEFAULT NULL, id_user_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, artistenom VARCHAR(255) NOT NULL, prix INT NOT NULL, image VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_881FC57682EA2E54 (commande_id), UNIQUE INDEX UNIQ_881FC57679F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE atelier (id INT AUTO_INCREMENT NOT NULL, createur_id INT NOT NULL, titre VARCHAR(255) NOT NULL, lieu VARCHAR(255) NOT NULL, date DATETIME NOT NULL, participants_max INT NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, updated_at DATETIME DEFAULT NULL, visible TINYINT(1) NOT NULL, statut VARCHAR(50) NOT NULL, INDEX IDX_E1BB182373A201E5 (createur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE beneficiaires (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, cause LONGTEXT NOT NULL, est_elle_association VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, date_commande DATETIME NOT NULL, status VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commentaires (id INT AUTO_INCREMENT NOT NULL, id_forum_id INT DEFAULT NULL, contenu LONGTEXT NOT NULL, date_publication DATETIME NOT NULL, INDEX IDX_D9BEC0C479175645 (id_forum_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dons (id INT AUTO_INCREMENT NOT NULL, beneficiaire_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, valeur NUMERIC(10, 0) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_E4F955FA5AF81F68 (beneficiaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE forum (id INT AUTO_INCREMENT NOT NULL, id_user_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, date_publication DATETIME NOT NULL, categorie VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, INDEX IDX_852BBECD79F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE inscription_atelier (id INT AUTO_INCREMENT NOT NULL, atelier_id INT NOT NULL, participant_id INT NOT NULL, statut VARCHAR(50) NOT NULL, INDEX IDX_C86AEECF82E2CF35 (atelier_id), INDEX IDX_C86AEECF9D1C3019 (participant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL, phone VARCHAR(255) NOT NULL, dateofbirth DATE NOT NULL, gender JSON NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC57682EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE artwork ADD CONSTRAINT FK_881FC57679F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE atelier ADD CONSTRAINT FK_E1BB182373A201E5 FOREIGN KEY (createur_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE commentaires ADD CONSTRAINT FK_D9BEC0C479175645 FOREIGN KEY (id_forum_id) REFERENCES forum (id)');
        $this->addSql('ALTER TABLE dons ADD CONSTRAINT FK_E4F955FA5AF81F68 FOREIGN KEY (beneficiaire_id) REFERENCES beneficiaires (id)');
        $this->addSql('ALTER TABLE forum ADD CONSTRAINT FK_852BBECD79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE inscription_atelier ADD CONSTRAINT FK_C86AEECF82E2CF35 FOREIGN KEY (atelier_id) REFERENCES atelier (id)');
        $this->addSql('ALTER TABLE inscription_atelier ADD CONSTRAINT FK_C86AEECF9D1C3019 FOREIGN KEY (participant_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artwork DROP FOREIGN KEY FK_881FC57682EA2E54');
        $this->addSql('ALTER TABLE artwork DROP FOREIGN KEY FK_881FC57679F37AE5');
        $this->addSql('ALTER TABLE atelier DROP FOREIGN KEY FK_E1BB182373A201E5');
        $this->addSql('ALTER TABLE commentaires DROP FOREIGN KEY FK_D9BEC0C479175645');
        $this->addSql('ALTER TABLE dons DROP FOREIGN KEY FK_E4F955FA5AF81F68');
        $this->addSql('ALTER TABLE forum DROP FOREIGN KEY FK_852BBECD79F37AE5');
        $this->addSql('ALTER TABLE inscription_atelier DROP FOREIGN KEY FK_C86AEECF82E2CF35');
        $this->addSql('ALTER TABLE inscription_atelier DROP FOREIGN KEY FK_C86AEECF9D1C3019');
        $this->addSql('DROP TABLE artwork');
        $this->addSql('DROP TABLE atelier');
        $this->addSql('DROP TABLE beneficiaires');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE commentaires');
        $this->addSql('DROP TABLE dons');
        $this->addSql('DROP TABLE forum');
        $this->addSql('DROP TABLE inscription_atelier');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
