<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221202141728 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD section_video_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649B9AC5A12 FOREIGN KEY (section_video_id) REFERENCES section_video (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649B9AC5A12 ON user (section_video_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649B9AC5A12');
        $this->addSql('DROP INDEX UNIQ_8D93D649B9AC5A12 ON user');
        $this->addSql('ALTER TABLE user DROP section_video_id');
    }
}
