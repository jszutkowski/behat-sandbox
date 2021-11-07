<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20211107115336 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql('INSERT INTO user (id, email, roles, password, is_verified) VALUES (1, \'admin@admin\', \'["ROLE_ADMIN"]\', \'$2y$13$hA/l.ZYwcmAnxoZbfJtPdeFrWhrpmbnkYeWafMZR7vb1ilo5wOt5.\', 1);');
    }

    public function down(Schema $schema): void
    {
        $this->addSql("DELETE FROM user where email = 'admin@admin'");
    }
}
