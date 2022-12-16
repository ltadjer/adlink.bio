<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221216160459 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE network (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_608487BCA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section_network (id INT AUTO_INCREMENT NOT NULL, bg_color VARCHAR(255) NOT NULL, icon_color VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE network ADD CONSTRAINT FK_608487BCA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rs DROP FOREIGN KEY FK_95DC290DA76ED395');
        $this->addSql('DROP TABLE rs');
        $this->addSql('ALTER TABLE code ADD descripton LONGTEXT NOT NULL, DROP description, CHANGE code code VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE link CHANGE link link VARCHAR(255) NOT NULL, CHANGE name name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE section_link DROP FOREIGN KEY FK_B31275FAA76ED395');
        $this->addSql('DROP INDEX UNIQ_B31275FAA76ED395 ON section_link');
        $this->addSql('ALTER TABLE section_link DROP user_id, CHANGE bg_color bg_color VARCHAR(255) NOT NULL, CHANGE bg_btn_color bg_btn_color VARCHAR(255) NOT NULL, CHANGE text_btn_color text_btn_color VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD section_link_id INT NOT NULL, ADD section_network_id INT NOT NULL, CHANGE section_discount_id section_discount_id INT NOT NULL, CHANGE section_video_id section_video_id INT NOT NULL, CHANGE section_company_id section_company_id INT NOT NULL, CHANGE name pseudo VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6497FE3CF7E FOREIGN KEY (section_link_id) REFERENCES section_link (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A9A2B14E FOREIGN KEY (section_network_id) REFERENCES section_network (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6497FE3CF7E ON user (section_link_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649A9A2B14E ON user (section_network_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A9A2B14E');
        $this->addSql('CREATE TABLE rs (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, logo VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, url VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, INDEX IDX_95DC290DA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE rs ADD CONSTRAINT FK_95DC290DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE network DROP FOREIGN KEY FK_608487BCA76ED395');
        $this->addSql('DROP TABLE network');
        $this->addSql('DROP TABLE section_network');
        $this->addSql('ALTER TABLE code ADD description VARCHAR(255) DEFAULT NULL, DROP descripton, CHANGE code code VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE link CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE link link VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE section_link ADD user_id INT NOT NULL, CHANGE bg_color bg_color VARCHAR(255) DEFAULT NULL, CHANGE bg_btn_color bg_btn_color VARCHAR(255) DEFAULT NULL, CHANGE text_btn_color text_btn_color VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE section_link ADD CONSTRAINT FK_B31275FAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B31275FAA76ED395 ON section_link (user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6497FE3CF7E');
        $this->addSql('DROP INDEX UNIQ_8D93D6497FE3CF7E ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D649A9A2B14E ON user');
        $this->addSql('ALTER TABLE user DROP section_link_id, DROP section_network_id, CHANGE section_company_id section_company_id INT DEFAULT NULL, CHANGE section_video_id section_video_id INT DEFAULT NULL, CHANGE section_discount_id section_discount_id INT DEFAULT NULL, CHANGE pseudo name VARCHAR(255) NOT NULL');
    }
}
