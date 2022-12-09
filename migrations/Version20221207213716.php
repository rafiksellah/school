<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221207213716 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lesson_student (lesson_id INT NOT NULL, student_id INT NOT NULL, INDEX IDX_425FFD94CDF80196 (lesson_id), INDEX IDX_425FFD94CB944F1A (student_id), PRIMARY KEY(lesson_id, student_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lesson_student ADD CONSTRAINT FK_425FFD94CDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lesson_student ADD CONSTRAINT FK_425FFD94CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_lesson DROP FOREIGN KEY FK_7642AC73CB944F1A');
        $this->addSql('ALTER TABLE student_lesson DROP FOREIGN KEY FK_7642AC73CDF80196');
        $this->addSql('DROP TABLE student_lesson');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE student_lesson (student_id INT NOT NULL, lesson_id INT NOT NULL, INDEX IDX_7642AC73CDF80196 (lesson_id), INDEX IDX_7642AC73CB944F1A (student_id), PRIMARY KEY(student_id, lesson_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE student_lesson ADD CONSTRAINT FK_7642AC73CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE student_lesson ADD CONSTRAINT FK_7642AC73CDF80196 FOREIGN KEY (lesson_id) REFERENCES lesson (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE lesson_student DROP FOREIGN KEY FK_425FFD94CDF80196');
        $this->addSql('ALTER TABLE lesson_student DROP FOREIGN KEY FK_425FFD94CB944F1A');
        $this->addSql('DROP TABLE lesson_student');
    }
}
