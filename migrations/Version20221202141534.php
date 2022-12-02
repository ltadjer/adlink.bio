<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221202141534 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section_discount DROP FOREIGN KEY FK_718DEE52A76ED395');
        $this->addSql('DROP INDEX UNIQ_718DEE52A76ED395 ON section_discount');
        $this->addSql('ALTER TABLE section_discount DROP user_id');
        $this->addSql('ALTER TABLE section_link DROP FOREIGN KEY FK_B31275FAA76ED395');
        $this->addSql('DROP INDEX UNIQ_B31275FAA76ED395 ON section_link');
        $this->addSql('ALTER TABLE section_link DROP user_id');
        $this->addSql('ALTER TABLE section_rs DROP FOREIGN KEY FK_F2C6AD27A76ED395');
        $this->addSql('DROP INDEX UNIQ_F2C6AD27A76ED395 ON section_rs');
        $this->addSql('ALTER TABLE section_rs DROP user_id');
        $this->addSql('ALTER TABLE section_video DROP FOREIGN KEY FK_EB90BD48A76ED395');
        $this->addSql('DROP INDEX UNIQ_EB90BD48A76ED395 ON section_video');
        $this->addSql('ALTER TABLE section_video DROP user_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A2B2009');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649B9AC5A12');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6497FE3CF7E');
        $this->addSql('DROP INDEX UNIQ_8D93D649A2B2009 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D649B9AC5A12 ON user');
        $this->addSql('ALTER TABLE user DROP section_company_id, DROP section_video_id');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6497FE3CF7E FOREIGN KEY (section_link_id) REFERENCES section_link (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section_discount ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE section_discount ADD CONSTRAINT FK_718DEE52A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_718DEE52A76ED395 ON section_discount (user_id)');
        $this->addSql('ALTER TABLE section_link ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE section_link ADD CONSTRAINT FK_B31275FAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_B31275FAA76ED395 ON section_link (user_id)');
        $this->addSql('ALTER TABLE section_rs ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE section_rs ADD CONSTRAINT FK_F2C6AD27A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F2C6AD27A76ED395 ON section_rs (user_id)');
        $this->addSql('ALTER TABLE section_video ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE section_video ADD CONSTRAINT FK_EB90BD48A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EB90BD48A76ED395 ON section_video (user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6497FE3CF7E');
        $this->addSql('ALTER TABLE user ADD section_company_id INT DEFAULT NULL, ADD section_video_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A2B2009 FOREIGN KEY (section_company_id) REFERENCES section_company (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649B9AC5A12 FOREIGN KEY (section_video_id) REFERENCES section_video (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6497FE3CF7E FOREIGN KEY (section_link_id) REFERENCES section_discount (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649A2B2009 ON user (section_company_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649B9AC5A12 ON user (section_video_id)');
    }
}
