<?php
namespace Neos\Flow\Persistence\Doctrine\Migrations;

use Doctrine\Migrations\AbstractMigration,
	Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20140514173723 extends AbstractMigration {

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function up(Schema $schema): void  {
			// this up() migration is autogenerated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
		
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_round (persistence_object_identifier VARCHAR(40) NOT NULL, cup VARCHAR(40) DEFAULT NULL, name VARCHAR(255) NOT NULL, dtype VARCHAR(255) NOT NULL, INDEX IDX_97E10FEDB79D50E4 (cup), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_round_teams_join (championship_round VARCHAR(40) NOT NULL, championship_team VARCHAR(40) NOT NULL, INDEX IDX_B4C549D4CACA1535 (championship_round), INDEX IDX_B4C549D4E0E69356 (championship_team), PRIMARY KEY(championship_round, championship_team)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_koround (persistence_object_identifier VARCHAR(40) NOT NULL, PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_childkoround (persistence_object_identifier VARCHAR(40) NOT NULL, parentround VARCHAR(40) DEFAULT NULL, INDEX IDX_E553D847A528AC9B (parentround), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_match (persistence_object_identifier VARCHAR(40) NOT NULL, hostteam VARCHAR(40) DEFAULT NULL, guestteam VARCHAR(40) DEFAULT NULL, cup VARCHAR(40) DEFAULT NULL, round VARCHAR(40) DEFAULT NULL, result VARCHAR(40) DEFAULT NULL, startdate DATETIME NOT NULL, name VARCHAR(255) NOT NULL, dtype VARCHAR(255) NOT NULL, INDEX IDX_285420DC7F921808 (hostteam), INDEX IDX_285420DC87754416 (guestteam), INDEX IDX_285420DCB79D50E4 (cup), INDEX IDX_285420DCC5EEEA34 (round), UNIQUE INDEX UNIQ_285420DC136AC113 (result), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_komatch (persistence_object_identifier VARCHAR(40) NOT NULL, PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_crossgroupmatch (persistence_object_identifier VARCHAR(40) NOT NULL, hostgroupround VARCHAR(40) DEFAULT NULL, guestgroupround VARCHAR(40) DEFAULT NULL, hostgrouprank INT NOT NULL, guestgrouprank INT NOT NULL, INDEX IDX_C1673F058883CEF (hostgroupround), INDEX IDX_C1673F053CC82627 (guestgroupround), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_cup (persistence_object_identifier VARCHAR(40) NOT NULL, tippointspolicy VARCHAR(255) NOT NULL, grouptablepolicy VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, startdate DATETIME NOT NULL, UNIQUE INDEX flow_identity_achimfritz_championship_domain_model_cup (name), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_cup_teams_join (championship_cup VARCHAR(40) NOT NULL, championship_team VARCHAR(40) NOT NULL, INDEX IDX_ACECFD7150BBF17 (championship_cup), INDEX IDX_ACECFD71E0E69356 (championship_team), PRIMARY KEY(championship_cup, championship_team)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_groupmatch (persistence_object_identifier VARCHAR(40) NOT NULL, PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_groupround (persistence_object_identifier VARCHAR(40) NOT NULL, PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_grouptablerow (persistence_object_identifier VARCHAR(40) NOT NULL, team VARCHAR(40) DEFAULT NULL, groupround VARCHAR(40) DEFAULT NULL, goalsplus INT NOT NULL, goalsminus INT NOT NULL, points INT NOT NULL, rank INT NOT NULL, countofmatchesplayed INT NOT NULL, countofmatcheswon INT NOT NULL, countofmatchesremis INT NOT NULL, countofmatchesloosed INT NOT NULL, INDEX IDX_789643FC4E0A61F (team), INDEX IDX_789643FB191C15F (groupround), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_password (persistence_object_identifier VARCHAR(40) NOT NULL, user VARCHAR(40) DEFAULT NULL, newpassword VARCHAR(255) NOT NULL, newpasswordrepeat VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_42C52008D93D649 (user), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_ranking (persistence_object_identifier VARCHAR(40) NOT NULL, user VARCHAR(40) DEFAULT NULL, points INT NOT NULL, rank INT NOT NULL, countoftips INT NOT NULL, INDEX IDX_22037E8D93D649 (user), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_result (persistence_object_identifier VARCHAR(40) NOT NULL, hostteamgoals INT NOT NULL, guestteamgoals INT NOT NULL, PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_team (persistence_object_identifier VARCHAR(40) NOT NULL, name VARCHAR(255) NOT NULL, namede VARCHAR(255) NOT NULL, nameen VARCHAR(255) NOT NULL, namelocal VARCHAR(255) NOT NULL, iso2 VARCHAR(255) NOT NULL, iso3 VARCHAR(255) NOT NULL, UNIQUE INDEX flow_identity_achimfritz_championship_domain_model_team (name), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_teamsoftwomatchesmatch (persistence_object_identifier VARCHAR(40) NOT NULL, hostmatch VARCHAR(40) DEFAULT NULL, guestmatch VARCHAR(40) DEFAULT NULL, hostmatchiswinner TINYINT(1) NOT NULL, guestmatchiswinner TINYINT(1) NOT NULL, INDEX IDX_7BB97C90F933327C (hostmatch), INDEX IDX_7BB97C903C4E843 (guestmatch), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_tip (persistence_object_identifier VARCHAR(40) NOT NULL, user VARCHAR(40) DEFAULT NULL, generalmatch VARCHAR(40) DEFAULT NULL, result VARCHAR(40) DEFAULT NULL, points INT NOT NULL, INDEX IDX_9226C7D78D93D649 (user), INDEX IDX_9226C7D7DFBDA53F (generalmatch), UNIQUE INDEX UNIQ_9226C7D7136AC113 (result), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_tipgroup (persistence_object_identifier VARCHAR(40) NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX flow_identity_achimfritz_championship_domain_model_tipgroup (name), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_tipgroupresultmatrix (persistence_object_identifier VARCHAR(40) NOT NULL, PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_tipgroupr_95a10_users_join (championship_tipgroupresultmatrix VARCHAR(40) NOT NULL, championship_user VARCHAR(40) NOT NULL, INDEX IDX_6F435DBC246893B3 (championship_tipgroupresultmatrix), INDEX IDX_6F435DBCA995E300 (championship_user), PRIMARY KEY(championship_tipgroupresultmatrix, championship_user)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_tipgroupre_95a10_rows_join (championship_tipgroupresultmatrix VARCHAR(40) NOT NULL, championship_tipgroupresultmatrixrow VARCHAR(40) NOT NULL, INDEX IDX_A8E08DB6246893B3 (championship_tipgroupresultmatrix), INDEX IDX_A8E08DB65A2D8605 (championship_tipgroupresultmatrixrow), PRIMARY KEY(championship_tipgroupresultmatrix, championship_tipgroupresultmatrixrow)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_tipgroupresultmatrixrow (persistence_object_identifier VARCHAR(40) NOT NULL, generalmatch VARCHAR(40) DEFAULT NULL, UNIQUE INDEX UNIQ_6D37622ADFBDA53F (generalmatch), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_tipgroupre_edab4_tips_join (championship_tipgroupresultmatrixrow VARCHAR(40) NOT NULL, championship_tip VARCHAR(40) NOT NULL, INDEX IDX_52665F765A2D8605 (championship_tipgroupresultmatrixrow), INDEX IDX_52665F76FA1557BF (championship_tip), PRIMARY KEY(championship_tipgroupresultmatrixrow, championship_tip)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_user (persistence_object_identifier VARCHAR(40) NOT NULL, account VARCHAR(40) DEFAULT NULL, tipgroup VARCHAR(40) DEFAULT NULL, email VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_EA9439FA7D3656A4 (account), INDEX IDX_EA9439FAF3D6F72C (tipgroup), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("CREATE TABLE achimfritz_championship_domain_model_user_tipgroups_join (championship_user VARCHAR(40) NOT NULL, championship_tipgroup VARCHAR(40) NOT NULL, INDEX IDX_318E5079A995E300 (championship_user), INDEX IDX_318E50795D3384B7 (championship_tipgroup), PRIMARY KEY(championship_user, championship_tipgroup)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_round ADD CONSTRAINT FK_97E10FEDB79D50E4 FOREIGN KEY (cup) REFERENCES achimfritz_championship_domain_model_cup (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_round_teams_join ADD CONSTRAINT FK_B4C549D4CACA1535 FOREIGN KEY (championship_round) REFERENCES achimfritz_championship_domain_model_round (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_round_teams_join ADD CONSTRAINT FK_B4C549D4E0E69356 FOREIGN KEY (championship_team) REFERENCES achimfritz_championship_domain_model_team (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_koround ADD CONSTRAINT FK_6E295D6947A46B0A FOREIGN KEY (persistence_object_identifier) REFERENCES achimfritz_championship_domain_model_round (persistence_object_identifier) ON DELETE CASCADE");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_childkoround ADD CONSTRAINT FK_E553D847A528AC9B FOREIGN KEY (parentround) REFERENCES achimfritz_championship_domain_model_koround (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_childkoround ADD CONSTRAINT FK_E553D84747A46B0A FOREIGN KEY (persistence_object_identifier) REFERENCES achimfritz_championship_domain_model_round (persistence_object_identifier) ON DELETE CASCADE");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_match ADD CONSTRAINT FK_285420DC7F921808 FOREIGN KEY (hostteam) REFERENCES achimfritz_championship_domain_model_team (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_match ADD CONSTRAINT FK_285420DC87754416 FOREIGN KEY (guestteam) REFERENCES achimfritz_championship_domain_model_team (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_match ADD CONSTRAINT FK_285420DCB79D50E4 FOREIGN KEY (cup) REFERENCES achimfritz_championship_domain_model_cup (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_match ADD CONSTRAINT FK_285420DCC5EEEA34 FOREIGN KEY (round) REFERENCES achimfritz_championship_domain_model_round (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_match ADD CONSTRAINT FK_285420DC136AC113 FOREIGN KEY (result) REFERENCES achimfritz_championship_domain_model_result (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_komatch ADD CONSTRAINT FK_D19C725847A46B0A FOREIGN KEY (persistence_object_identifier) REFERENCES achimfritz_championship_domain_model_match (persistence_object_identifier) ON DELETE CASCADE");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_crossgroupmatch ADD CONSTRAINT FK_C1673F058883CEF FOREIGN KEY (hostgroupround) REFERENCES achimfritz_championship_domain_model_groupround (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_crossgroupmatch ADD CONSTRAINT FK_C1673F053CC82627 FOREIGN KEY (guestgroupround) REFERENCES achimfritz_championship_domain_model_groupround (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_crossgroupmatch ADD CONSTRAINT FK_C1673F0547A46B0A FOREIGN KEY (persistence_object_identifier) REFERENCES achimfritz_championship_domain_model_match (persistence_object_identifier) ON DELETE CASCADE");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_cup_teams_join ADD CONSTRAINT FK_ACECFD7150BBF17 FOREIGN KEY (championship_cup) REFERENCES achimfritz_championship_domain_model_cup (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_cup_teams_join ADD CONSTRAINT FK_ACECFD71E0E69356 FOREIGN KEY (championship_team) REFERENCES achimfritz_championship_domain_model_team (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_groupmatch ADD CONSTRAINT FK_E8B13AA747A46B0A FOREIGN KEY (persistence_object_identifier) REFERENCES achimfritz_championship_domain_model_match (persistence_object_identifier) ON DELETE CASCADE");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_groupround ADD CONSTRAINT FK_5704159647A46B0A FOREIGN KEY (persistence_object_identifier) REFERENCES achimfritz_championship_domain_model_round (persistence_object_identifier) ON DELETE CASCADE");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_grouptablerow ADD CONSTRAINT FK_789643FC4E0A61F FOREIGN KEY (team) REFERENCES achimfritz_championship_domain_model_team (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_grouptablerow ADD CONSTRAINT FK_789643FB191C15F FOREIGN KEY (groupround) REFERENCES achimfritz_championship_domain_model_groupround (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_password ADD CONSTRAINT FK_42C52008D93D649 FOREIGN KEY (user) REFERENCES achimfritz_championship_domain_model_user (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_ranking ADD CONSTRAINT FK_22037E8D93D649 FOREIGN KEY (user) REFERENCES achimfritz_championship_domain_model_user (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_teamsoftwomatchesmatch ADD CONSTRAINT FK_7BB97C90F933327C FOREIGN KEY (hostmatch) REFERENCES achimfritz_championship_domain_model_komatch (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_teamsoftwomatchesmatch ADD CONSTRAINT FK_7BB97C903C4E843 FOREIGN KEY (guestmatch) REFERENCES achimfritz_championship_domain_model_komatch (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_teamsoftwomatchesmatch ADD CONSTRAINT FK_7BB97C9047A46B0A FOREIGN KEY (persistence_object_identifier) REFERENCES achimfritz_championship_domain_model_match (persistence_object_identifier) ON DELETE CASCADE");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_tip ADD CONSTRAINT FK_9226C7D78D93D649 FOREIGN KEY (user) REFERENCES achimfritz_championship_domain_model_user (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_tip ADD CONSTRAINT FK_9226C7D7DFBDA53F FOREIGN KEY (generalmatch) REFERENCES achimfritz_championship_domain_model_match (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_tip ADD CONSTRAINT FK_9226C7D7136AC113 FOREIGN KEY (result) REFERENCES achimfritz_championship_domain_model_result (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_tipgroupr_95a10_users_join ADD CONSTRAINT FK_6F435DBC246893B3 FOREIGN KEY (championship_tipgroupresultmatrix) REFERENCES achimfritz_championship_domain_model_tipgroupresultmatrix (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_tipgroupr_95a10_users_join ADD CONSTRAINT FK_6F435DBCA995E300 FOREIGN KEY (championship_user) REFERENCES achimfritz_championship_domain_model_user (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_tipgroupre_95a10_rows_join ADD CONSTRAINT FK_A8E08DB6246893B3 FOREIGN KEY (championship_tipgroupresultmatrix) REFERENCES achimfritz_championship_domain_model_tipgroupresultmatrix (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_tipgroupre_95a10_rows_join ADD CONSTRAINT FK_A8E08DB65A2D8605 FOREIGN KEY (championship_tipgroupresultmatrixrow) REFERENCES achimfritz_championship_domain_model_tipgroupresultmatrixrow (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_tipgroupresultmatrixrow ADD CONSTRAINT FK_6D37622ADFBDA53F FOREIGN KEY (generalmatch) REFERENCES achimfritz_championship_domain_model_match (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_tipgroupre_edab4_tips_join ADD CONSTRAINT FK_52665F765A2D8605 FOREIGN KEY (championship_tipgroupresultmatrixrow) REFERENCES achimfritz_championship_domain_model_tipgroupresultmatrixrow (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_tipgroupre_edab4_tips_join ADD CONSTRAINT FK_52665F76FA1557BF FOREIGN KEY (championship_tip) REFERENCES achimfritz_championship_domain_model_tip (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_user ADD CONSTRAINT FK_EA9439FA7D3656A4 FOREIGN KEY (account) REFERENCES typo3_flow_security_account (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_user ADD CONSTRAINT FK_EA9439FAF3D6F72C FOREIGN KEY (tipgroup) REFERENCES achimfritz_championship_domain_model_tipgroup (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_user_tipgroups_join ADD CONSTRAINT FK_318E5079A995E300 FOREIGN KEY (championship_user) REFERENCES achimfritz_championship_domain_model_user (persistence_object_identifier)");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_user_tipgroups_join ADD CONSTRAINT FK_318E50795D3384B7 FOREIGN KEY (championship_tipgroup) REFERENCES achimfritz_championship_domain_model_tipgroup (persistence_object_identifier)");
	}

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function down(Schema $schema): void  {
			// this down() migration is autogenerated, please modify it to your needs
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
		
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_round_teams_join DROP FOREIGN KEY FK_B4C549D4CACA1535");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_koround DROP FOREIGN KEY FK_6E295D6947A46B0A");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_childkoround DROP FOREIGN KEY FK_E553D84747A46B0A");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_match DROP FOREIGN KEY FK_285420DCC5EEEA34");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_groupround DROP FOREIGN KEY FK_5704159647A46B0A");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_childkoround DROP FOREIGN KEY FK_E553D847A528AC9B");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_komatch DROP FOREIGN KEY FK_D19C725847A46B0A");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_crossgroupmatch DROP FOREIGN KEY FK_C1673F0547A46B0A");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_groupmatch DROP FOREIGN KEY FK_E8B13AA747A46B0A");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_teamsoftwomatchesmatch DROP FOREIGN KEY FK_7BB97C9047A46B0A");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_tip DROP FOREIGN KEY FK_9226C7D7DFBDA53F");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_tipgroupresultmatrixrow DROP FOREIGN KEY FK_6D37622ADFBDA53F");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_teamsoftwomatchesmatch DROP FOREIGN KEY FK_7BB97C90F933327C");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_teamsoftwomatchesmatch DROP FOREIGN KEY FK_7BB97C903C4E843");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_round DROP FOREIGN KEY FK_97E10FEDB79D50E4");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_match DROP FOREIGN KEY FK_285420DCB79D50E4");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_cup_teams_join DROP FOREIGN KEY FK_ACECFD7150BBF17");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_crossgroupmatch DROP FOREIGN KEY FK_C1673F058883CEF");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_crossgroupmatch DROP FOREIGN KEY FK_C1673F053CC82627");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_grouptablerow DROP FOREIGN KEY FK_789643FB191C15F");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_match DROP FOREIGN KEY FK_285420DC136AC113");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_tip DROP FOREIGN KEY FK_9226C7D7136AC113");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_round_teams_join DROP FOREIGN KEY FK_B4C549D4E0E69356");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_match DROP FOREIGN KEY FK_285420DC7F921808");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_match DROP FOREIGN KEY FK_285420DC87754416");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_cup_teams_join DROP FOREIGN KEY FK_ACECFD71E0E69356");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_grouptablerow DROP FOREIGN KEY FK_789643FC4E0A61F");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_tipgroupre_edab4_tips_join DROP FOREIGN KEY FK_52665F76FA1557BF");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_user DROP FOREIGN KEY FK_EA9439FAF3D6F72C");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_user_tipgroups_join DROP FOREIGN KEY FK_318E50795D3384B7");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_tipgroupr_95a10_users_join DROP FOREIGN KEY FK_6F435DBC246893B3");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_tipgroupre_95a10_rows_join DROP FOREIGN KEY FK_A8E08DB6246893B3");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_tipgroupre_95a10_rows_join DROP FOREIGN KEY FK_A8E08DB65A2D8605");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_tipgroupre_edab4_tips_join DROP FOREIGN KEY FK_52665F765A2D8605");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_password DROP FOREIGN KEY FK_42C52008D93D649");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_ranking DROP FOREIGN KEY FK_22037E8D93D649");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_tip DROP FOREIGN KEY FK_9226C7D78D93D649");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_tipgroupr_95a10_users_join DROP FOREIGN KEY FK_6F435DBCA995E300");
		$this->addSql("ALTER TABLE achimfritz_championship_domain_model_user_tipgroups_join DROP FOREIGN KEY FK_318E5079A995E300");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_round");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_round_teams_join");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_koround");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_childkoround");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_match");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_komatch");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_crossgroupmatch");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_cup");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_cup_teams_join");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_groupmatch");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_groupround");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_grouptablerow");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_password");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_ranking");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_result");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_team");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_teamsoftwomatchesmatch");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_tip");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_tipgroup");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_tipgroupresultmatrix");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_tipgroupr_95a10_users_join");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_tipgroupre_95a10_rows_join");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_tipgroupresultmatrixrow");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_tipgroupre_edab4_tips_join");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_user");
		$this->addSql("DROP TABLE achimfritz_championship_domain_model_user_tipgroups_join");
	}
}

?>