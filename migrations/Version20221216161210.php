<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221216161210 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE section_discount_id section_discount_id INT DEFAULT NULL, CHANGE section_video_id section_video_id INT DEFAULT NULL, CHANGE section_company_id section_company_id INT DEFAULT NULL, CHANGE section_link_id section_link_id INT DEFAULT NULL, CHANGE section_network_id section_network_id INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user CHANGE section_company_id section_company_id INT NOT NULL, CHANGE section_video_id section_video_id INT NOT NULL, CHANGE section_discount_id section_discount_id INT NOT NULL, CHANGE section_link_id section_link_id INT NOT NULL, CHANGE section_network_id section_network_id INT NOT NULL');
    }
}
