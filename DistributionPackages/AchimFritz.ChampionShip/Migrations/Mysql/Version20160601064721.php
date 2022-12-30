<?php
namespace Neos\Flow\Persistence\Doctrine\Migrations;

use Doctrine\Migrations\AbstractMigration,
	Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20160601064721 extends AbstractMigration {

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function up(Schema $schema): void  {
		// this up() migration is autogenerated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
		
		$this->addSql("CREATE TABLE achimfritz_championship_user_domain_model_forgotpasswordrequest (persistence_object_identifier VARCHAR(40) NOT NULL, user VARCHAR(40) DEFAULT NULL, creationdate DATETIME NOT NULL, email VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, hash VARCHAR(255) NOT NULL, INDEX IDX_A811E1B78D93D649 (user), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("ALTER TABLE achimfritz_championship_user_domain_model_forgotpasswordrequest ADD CONSTRAINT FK_A811E1B78D93D649 FOREIGN KEY (user) REFERENCES achimfritz_championship_user_domain_model_user (persistence_object_identifier)");
	}

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function down(Schema $schema): void  {
		// this down() migration is autogenerated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
		
		$this->addSql("DROP TABLE achimfritz_championship_user_domain_model_forgotpasswordrequest");
	}
}