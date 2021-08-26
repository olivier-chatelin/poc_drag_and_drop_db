<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210826190747 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dish_list (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dish_list_dish (dish_list_id INT NOT NULL, dish_id INT NOT NULL, INDEX IDX_ACA1700AD190C1D (dish_list_id), INDEX IDX_ACA1700148EB0CB (dish_id), PRIMARY KEY(dish_list_id, dish_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dish_list_dish ADD CONSTRAINT FK_ACA1700AD190C1D FOREIGN KEY (dish_list_id) REFERENCES dish_list (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dish_list_dish ADD CONSTRAINT FK_ACA1700148EB0CB FOREIGN KEY (dish_id) REFERENCES dish (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dish_list_dish DROP FOREIGN KEY FK_ACA1700AD190C1D');
        $this->addSql('DROP TABLE dish_list');
        $this->addSql('DROP TABLE dish_list_dish');
    }
}
