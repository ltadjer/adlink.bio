<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221216165601 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE network ADD instagram VARCHAR(255) DEFAULT NULL, ADD facebook VARCHAR(255) DEFAULT NULL, ADD youtube VARCHAR(255) DEFAULT NULL, ADD git_hub VARCHAR(255) DEFAULT NULL, ADD twitter VARCHAR(255) DEFAULT NULL, ADD tik_tok VARCHAR(255) DEFAULT NULL, DROP name, DROP logo, DROP url, DROP slug');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE network ADD name VARCHAR(255) NOT NULL, ADD logo VARCHAR(255) NOT NULL, ADD url VARCHAR(255) NOT NULL, ADD slug VARCHAR(255) NOT NULL, DROP instagram, DROP facebook, DROP youtube, DROP git_hub, DROP twitter, DROP tik_tok');
    }
}
