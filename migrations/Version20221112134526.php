<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221112134526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, lastReplyDate DATETIME DEFAULT NULL, username VARCHAR(255) NOT NULL, email_address VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, salt VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', avatar_url VARCHAR(255) DEFAULT NULL, nb_post INT DEFAULT NULL, banned TINYINT(1) DEFAULT NULL, UNIQUE INDEX UNIQ_1483A5E9F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workingforum_file (id INT AUTO_INCREMENT NOT NULL, post_id INT DEFAULT NULL, filename VARCHAR(100) NOT NULL, original_name VARCHAR(100) NOT NULL, path VARCHAR(255) NOT NULL, extension VARCHAR(10) NOT NULL, size BIGINT NOT NULL, cdate DATETIME NOT NULL, UNIQUE INDEX UNIQ_CA43646BB548B0F (path), INDEX IDX_CA43646B4B89032C (post_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workingforum_forum (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workingforum_post (id INT AUTO_INCREMENT NOT NULL, thread_id INT DEFAULT NULL, user_id INT DEFAULT NULL, content LONGTEXT NOT NULL, published TINYINT(1) NOT NULL, cdate DATETIME NOT NULL, ip VARCHAR(255) NOT NULL, moderateReason LONGTEXT DEFAULT NULL, voteUp INT DEFAULT NULL, INDEX IDX_1C563EF6E2904019 (thread_id), INDEX IDX_1C563EF6A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workingforum_post_report (id INT AUTO_INCREMENT NOT NULL, post_id INT NOT NULL, user_id INT NOT NULL, cdate DATETIME NOT NULL, processed TINYINT(1) DEFAULT NULL, INDEX IDX_A95E2B754B89032C (post_id), INDEX IDX_A95E2B75A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workingforum_post_vote (id INT AUTO_INCREMENT NOT NULL, post_id INT NOT NULL, thread_id INT DEFAULT NULL, user_id INT NOT NULL, voteType INT NOT NULL, INDEX IDX_5EF3D04F4B89032C (post_id), INDEX IDX_5EF3D04FE2904019 (thread_id), INDEX IDX_5EF3D04FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workingforum_rules (id INT AUTO_INCREMENT NOT NULL, lang VARCHAR(50) NOT NULL, content LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workingforum_setting (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workingforum_subforum (id INT AUTO_INCREMENT NOT NULL, forum_id INT DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, nb_thread INT DEFAULT NULL, slug VARCHAR(255) NOT NULL, nb_post INT DEFAULT NULL, last_reply_date DATETIME DEFAULT NULL, allowed_roles LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', lastReplyUser INT DEFAULT NULL, INDEX IDX_9EACE2E229CCBAD0 (forum_id), INDEX IDX_9EACE2E21F7EE8A0 (lastReplyUser), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workingforum_subscription (id INT AUTO_INCREMENT NOT NULL, thread_id INT DEFAULT NULL, user_id INT DEFAULT NULL, INDEX IDX_54F96036E2904019 (thread_id), INDEX IDX_54F96036A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE workingforum_thread (id INT AUTO_INCREMENT NOT NULL, subforum_id INT NOT NULL, author_id INT NOT NULL, cdate DATETIME NOT NULL, nbReplies INT NOT NULL, lastReplyDate DATETIME NOT NULL, resolved TINYINT(1) DEFAULT NULL, locked TINYINT(1) DEFAULT NULL, label VARCHAR(255) NOT NULL, sublabel VARCHAR(255) NOT NULL, slug VARCHAR(255) DEFAULT NULL, pin TINYINT(1) DEFAULT NULL, lastReplyUser INT DEFAULT NULL, INDEX IDX_788E9ABA225C0759 (subforum_id), INDEX IDX_788E9ABAF675F31B (author_id), INDEX IDX_788E9ABA1F7EE8A0 (lastReplyUser), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE workingforum_file ADD CONSTRAINT FK_CA43646B4B89032C FOREIGN KEY (post_id) REFERENCES workingforum_post (id)');
        $this->addSql('ALTER TABLE workingforum_post ADD CONSTRAINT FK_1C563EF6E2904019 FOREIGN KEY (thread_id) REFERENCES workingforum_thread (id)');
        $this->addSql('ALTER TABLE workingforum_post ADD CONSTRAINT FK_1C563EF6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE workingforum_post_report ADD CONSTRAINT FK_A95E2B754B89032C FOREIGN KEY (post_id) REFERENCES workingforum_post (id)');
        $this->addSql('ALTER TABLE workingforum_post_report ADD CONSTRAINT FK_A95E2B75A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE workingforum_post_vote ADD CONSTRAINT FK_5EF3D04F4B89032C FOREIGN KEY (post_id) REFERENCES workingforum_post (id)');
        $this->addSql('ALTER TABLE workingforum_post_vote ADD CONSTRAINT FK_5EF3D04FE2904019 FOREIGN KEY (thread_id) REFERENCES workingforum_thread (id)');
        $this->addSql('ALTER TABLE workingforum_post_vote ADD CONSTRAINT FK_5EF3D04FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE workingforum_subforum ADD CONSTRAINT FK_9EACE2E229CCBAD0 FOREIGN KEY (forum_id) REFERENCES workingforum_forum (id)');
        $this->addSql('ALTER TABLE workingforum_subforum ADD CONSTRAINT FK_9EACE2E21F7EE8A0 FOREIGN KEY (lastReplyUser) REFERENCES user (id)');
        $this->addSql('ALTER TABLE workingforum_subscription ADD CONSTRAINT FK_54F96036E2904019 FOREIGN KEY (thread_id) REFERENCES workingforum_thread (id)');
        $this->addSql('ALTER TABLE workingforum_subscription ADD CONSTRAINT FK_54F96036A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE workingforum_thread ADD CONSTRAINT FK_788E9ABA225C0759 FOREIGN KEY (subforum_id) REFERENCES workingforum_subforum (id)');
        $this->addSql('ALTER TABLE workingforum_thread ADD CONSTRAINT FK_788E9ABAF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE workingforum_thread ADD CONSTRAINT FK_788E9ABA1F7EE8A0 FOREIGN KEY (lastReplyUser) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD lastReplyDate DATETIME DEFAULT NULL, ADD username VARCHAR(255) NOT NULL, ADD avatar_url VARCHAR(255) DEFAULT NULL, ADD nb_post INT DEFAULT NULL, ADD banned TINYINT(1) DEFAULT NULL, ADD email_address VARCHAR(255) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON user (username)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE workingforum_subforum DROP FOREIGN KEY FK_9EACE2E229CCBAD0');
        $this->addSql('ALTER TABLE workingforum_file DROP FOREIGN KEY FK_CA43646B4B89032C');
        $this->addSql('ALTER TABLE workingforum_post_report DROP FOREIGN KEY FK_A95E2B754B89032C');
        $this->addSql('ALTER TABLE workingforum_post_vote DROP FOREIGN KEY FK_5EF3D04F4B89032C');
        $this->addSql('ALTER TABLE workingforum_thread DROP FOREIGN KEY FK_788E9ABA225C0759');
        $this->addSql('ALTER TABLE workingforum_post DROP FOREIGN KEY FK_1C563EF6E2904019');
        $this->addSql('ALTER TABLE workingforum_post_vote DROP FOREIGN KEY FK_5EF3D04FE2904019');
        $this->addSql('ALTER TABLE workingforum_subscription DROP FOREIGN KEY FK_54F96036E2904019');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE workingforum_file');
        $this->addSql('DROP TABLE workingforum_forum');
        $this->addSql('DROP TABLE workingforum_post');
        $this->addSql('DROP TABLE workingforum_post_report');
        $this->addSql('DROP TABLE workingforum_post_vote');
        $this->addSql('DROP TABLE workingforum_rules');
        $this->addSql('DROP TABLE workingforum_setting');
        $this->addSql('DROP TABLE workingforum_subforum');
        $this->addSql('DROP TABLE workingforum_subscription');
        $this->addSql('DROP TABLE workingforum_thread');
        $this->addSql('DROP INDEX UNIQ_8D93D649F85E0677 ON user');
        $this->addSql('ALTER TABLE user DROP lastReplyDate, DROP username, DROP avatar_url, DROP nb_post, DROP banned, DROP email_address');
    }
}
