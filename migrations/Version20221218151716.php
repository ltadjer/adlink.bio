<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221218151716 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE code (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, code VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_77153098A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE link (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, link VARCHAR(255) NOT NULL, INDEX IDX_36AC99F1A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE network (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, instagram VARCHAR(255) DEFAULT NULL, facebook VARCHAR(255) DEFAULT NULL, youtube VARCHAR(255) DEFAULT NULL, git_hub VARCHAR(255) DEFAULT NULL, twitter VARCHAR(255) DEFAULT NULL, tik_tok VARCHAR(255) DEFAULT NULL, INDEX IDX_608487BCA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section_company (id INT AUTO_INCREMENT NOT NULL, logo VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, baseline VARCHAR(255) NOT NULL, bg_color VARCHAR(255) NOT NULL, title_color VARCHAR(255) NOT NULL, baseline_color VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section_discount (id INT AUTO_INCREMENT NOT NULL, bg_color VARCHAR(255) NOT NULL, bg_code_color VARCHAR(255) NOT NULL, text_code_color VARCHAR(255) NOT NULL, bg_card_color VARCHAR(255) NOT NULL, text_card_color VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section_link (id INT AUTO_INCREMENT NOT NULL, bg_color VARCHAR(255) NOT NULL, bg_btn_color VARCHAR(255) NOT NULL, text_btn_color VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section_network (id INT AUTO_INCREMENT NOT NULL, bg_color VARCHAR(255) NOT NULL, icon_color VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section_video (id INT AUTO_INCREMENT NOT NULL, link VARCHAR(255) NOT NULL, alt_video VARCHAR(255) NOT NULL, bg_color VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, section_company_id INT DEFAULT NULL, section_video_id INT DEFAULT NULL, section_discount_id INT DEFAULT NULL, section_link_id INT DEFAULT NULL, section_network_id INT DEFAULT NULL, pseudo VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, font VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649A2B2009 (section_company_id), UNIQUE INDEX UNIQ_8D93D649B9AC5A12 (section_video_id), UNIQUE INDEX UNIQ_8D93D6495A8D1E60 (section_discount_id), UNIQUE INDEX UNIQ_8D93D6497FE3CF7E (section_link_id), UNIQUE INDEX UNIQ_8D93D649A9A2B14E (section_network_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE code ADD CONSTRAINT FK_77153098A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE link ADD CONSTRAINT FK_36AC99F1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE network ADD CONSTRAINT FK_608487BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A2B2009 FOREIGN KEY (section_company_id) REFERENCES section_company (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649B9AC5A12 FOREIGN KEY (section_video_id) REFERENCES section_video (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6495A8D1E60 FOREIGN KEY (section_discount_id) REFERENCES section_discount (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6497FE3CF7E FOREIGN KEY (section_link_id) REFERENCES section_link (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A9A2B14E FOREIGN KEY (section_network_id) REFERENCES section_network (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE code DROP FOREIGN KEY FK_77153098A76ED395');
        $this->addSql('ALTER TABLE link DROP FOREIGN KEY FK_36AC99F1A76ED395');
        $this->addSql('ALTER TABLE network DROP FOREIGN KEY FK_608487BCA76ED395');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A2B2009');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649B9AC5A12');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6495A8D1E60');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6497FE3CF7E');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A9A2B14E');
        $this->addSql('DROP TABLE code');
        $this->addSql('DROP TABLE link');
        $this->addSql('DROP TABLE network');
        $this->addSql('DROP TABLE section_company');
        $this->addSql('DROP TABLE section_discount');
        $this->addSql('DROP TABLE section_link');
        $this->addSql('DROP TABLE section_network');
        $this->addSql('DROP TABLE section_video');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
