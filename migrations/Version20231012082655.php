<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012082655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE locateur_modele (locateur_id INT NOT NULL, modele_id INT NOT NULL, INDEX IDX_53B6015F411086F1 (locateur_id), INDEX IDX_53B6015FAC14B70A (modele_id), PRIMARY KEY(locateur_id, modele_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location_modele (location_id INT NOT NULL, modele_id INT NOT NULL, INDEX IDX_5B700D5A64D218E (location_id), INDEX IDX_5B700D5AAC14B70A (modele_id), PRIMARY KEY(location_id, modele_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE locateur_modele ADD CONSTRAINT FK_53B6015F411086F1 FOREIGN KEY (locateur_id) REFERENCES locateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE locateur_modele ADD CONSTRAINT FK_53B6015FAC14B70A FOREIGN KEY (modele_id) REFERENCES modele (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE location_modele ADD CONSTRAINT FK_5B700D5A64D218E FOREIGN KEY (location_id) REFERENCES location (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE location_modele ADD CONSTRAINT FK_5B700D5AAC14B70A FOREIGN KEY (modele_id) REFERENCES modele (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE locateur ADD voiture_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE locateur ADD CONSTRAINT FK_F3A8D63B181A8BA FOREIGN KEY (voiture_id) REFERENCES voiture (id)');
        $this->addSql('CREATE INDEX IDX_F3A8D63B181A8BA ON locateur (voiture_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE locateur_modele DROP FOREIGN KEY FK_53B6015F411086F1');
        $this->addSql('ALTER TABLE locateur_modele DROP FOREIGN KEY FK_53B6015FAC14B70A');
        $this->addSql('ALTER TABLE location_modele DROP FOREIGN KEY FK_5B700D5A64D218E');
        $this->addSql('ALTER TABLE location_modele DROP FOREIGN KEY FK_5B700D5AAC14B70A');
        $this->addSql('DROP TABLE locateur_modele');
        $this->addSql('DROP TABLE location_modele');
        $this->addSql('ALTER TABLE locateur DROP FOREIGN KEY FK_F3A8D63B181A8BA');
        $this->addSql('DROP INDEX IDX_F3A8D63B181A8BA ON locateur');
        $this->addSql('ALTER TABLE locateur DROP voiture_id');
    }
}
