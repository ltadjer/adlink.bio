<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221202142014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section_company DROP FOREIGN KEY FK_9DF8C440A76ED395');
        $this->addSql('DROP INDEX UNIQ_9DF8C440A76ED395 ON section_company');
        $this->addSql('ALTER TABLE section_company DROP user_id');
        $this->addSql('ALTER TABLE user ADD section_company_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A2B2009 FOREIGN KEY (section_company_id) REFERENCES section_company (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649A2B2009 ON user (section_company_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section_company ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE section_company ADD CONSTRAINT FK_9DF8C440A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9DF8C440A76ED395 ON section_company (user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A2B2009');
        $this->addSql('DROP INDEX UNIQ_8D93D649A2B2009 ON user');
        $this->addSql('ALTER TABLE user DROP section_company_id');
    }
}
