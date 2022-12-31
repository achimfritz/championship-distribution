<?php

declare(strict_types=1);

namespace Neos\Flow\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221230162209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\MySQL80Platform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\MySQL80Platform'."
        );

        $this->addSql('ALTER TABLE achimfritz_championship_tip_domain_model_tipgro_c2a81_rows_join DROP FOREIGN KEY FK_A8E08DB65A2D8605');
        $this->addSql('ALTER TABLE achimfritz_championship_tip_domain_model_tipgro_d24a5_tips_join DROP FOREIGN KEY FK_52665F765A2D8605');
        $this->addSql('ALTER TABLE achimfritz_championship_tip_domain_model_tipgr_c2a81_users_join DROP FOREIGN KEY FK_6F435DBC246893B3');
        $this->addSql('ALTER TABLE achimfritz_championship_tip_domain_model_tipgro_c2a81_rows_join DROP FOREIGN KEY FK_A8E08DB6246893B3');
        $this->addSql('ALTER TABLE typo3_party_domain_model_abstractparty_accounts_join DROP FOREIGN KEY FK_1EEEBC2F58842EFC');
        $this->addSql('ALTER TABLE typo3_party_domain_model_abstractparty_accounts_join DROP FOREIGN KEY FK_1EEEBC2F38110E12');
        $this->addSql('ALTER TABLE typo3_party_domain_model_person DROP FOREIGN KEY typo3_party_domain_model_person_ibfk_3');
        $this->addSql('ALTER TABLE typo3_party_domain_model_person DROP FOREIGN KEY typo3_party_domain_model_person_ibfk_2');
        $this->addSql('ALTER TABLE typo3_party_domain_model_person_electronicaddresses_join DROP FOREIGN KEY typo3_party_domain_model_person_electronicaddresses_join_ibfk_2');
        $this->addSql('ALTER TABLE typo3_party_domain_model_person_electronicaddresses_join DROP FOREIGN KEY typo3_party_domain_model_person_electronicaddresses_join_ibfk_1');
        $this->addSql('ALTER TABLE typo3_party_domain_model_person DROP FOREIGN KEY typo3_party_domain_model_person_ibfk_1');
        $this->addSql('DROP TABLE achimfritz_championship_tip_domain_model_tipgr_c2a81_users_join');
        $this->addSql('DROP TABLE achimfritz_championship_tip_domain_model_tipgro_c2a81_rows_join');
        $this->addSql('DROP TABLE achimfritz_championship_tip_domain_model_tipgro_d24a5_tips_join');
        $this->addSql('DROP TABLE achimfritz_championship_tip_domain_model_tipgroupresultma_d24a5');
        $this->addSql('DROP TABLE achimfritz_championship_tip_domain_model_tipgroupresultmatrix');
        $this->addSql('DROP TABLE typo3_flow_mvc_routing_objectpathmapping');
        $this->addSql('DROP TABLE typo3_flow_resource_resource');
        $this->addSql('DROP TABLE typo3_flow_security_account');
        $this->addSql('DROP TABLE typo3_party_domain_model_abstractparty');
        $this->addSql('DROP TABLE typo3_party_domain_model_abstractparty_accounts_join');
        $this->addSql('DROP TABLE typo3_party_domain_model_electronicaddress');
        $this->addSql('DROP TABLE typo3_party_domain_model_person');
        $this->addSql('DROP TABLE typo3_party_domain_model_person_electronicaddresses_join');
        $this->addSql('DROP TABLE typo3_party_domain_model_personname');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            !$this->connection->getDatabasePlatform() instanceof \Doctrine\DBAL\Platforms\MySQL80Platform,
            "Migration can only be executed safely on '\Doctrine\DBAL\Platforms\MySQL80Platform'."
        );

        $this->addSql('CREATE TABLE achimfritz_championship_tip_domain_model_tipgr_c2a81_users_join (tip_tipgroupresultmatrix VARCHAR(40) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, user_user VARCHAR(40) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, INDEX IDX_7B25C34045E83D34 (tip_tipgroupresultmatrix), INDEX IDX_7B25C340F7129A80 (user_user), PRIMARY KEY(tip_tipgroupresultmatrix, user_user)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE achimfritz_championship_tip_domain_model_tipgro_c2a81_rows_join (tip_tipgroupresultmatrix VARCHAR(40) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, tip_tipgroupresultmatrixrow VARCHAR(40) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, INDEX IDX_E50D217345E83D34 (tip_tipgroupresultmatrix), INDEX IDX_E50D2173636B9926 (tip_tipgroupresultmatrixrow), PRIMARY KEY(tip_tipgroupresultmatrix, tip_tipgroupresultmatrixrow)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE achimfritz_championship_tip_domain_model_tipgro_d24a5_tips_join (tip_tipgroupresultmatrixrow VARCHAR(40) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, tip_tip VARCHAR(40) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, INDEX IDX_B70F797636B9926 (tip_tipgroupresultmatrixrow), INDEX IDX_B70F79777CEEBB1 (tip_tip), PRIMARY KEY(tip_tipgroupresultmatrixrow, tip_tip)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE achimfritz_championship_tip_domain_model_tipgroupresultma_d24a5 (persistence_object_identifier VARCHAR(40) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, generalmatch VARCHAR(40) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_unicode_ci`, UNIQUE INDEX UNIQ_BFA4B76ADFBDA53F (generalmatch), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE achimfritz_championship_tip_domain_model_tipgroupresultmatrix (persistence_object_identifier VARCHAR(40) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE typo3_flow_mvc_routing_objectpathmapping (objecttype VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, uripattern VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, pathsegment VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, identifier VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, PRIMARY KEY(objecttype, uripattern, pathsegment)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE typo3_flow_resource_resource (persistence_object_identifier VARCHAR(40) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, sha1 VARCHAR(40) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, filename VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, md5 VARCHAR(32) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, collectionname VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, mediatype VARCHAR(100) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, relativepublicationpath VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, filesize NUMERIC(20, 0) NOT NULL, PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE typo3_flow_security_account (persistence_object_identifier VARCHAR(40) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, accountidentifier VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, authenticationprovidername VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, credentialssource VARCHAR(255) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_unicode_ci`, creationdate DATETIME NOT NULL, expirationdate DATETIME DEFAULT NULL, roleidentifiers LONGTEXT CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_unicode_ci` COMMENT \'(DC2Type:simple_array)\', lastsuccessfulauthenticationdate DATETIME DEFAULT NULL, failedauthenticationcount INT DEFAULT NULL, UNIQUE INDEX flow_identity_typo3_flow_security_account (accountidentifier, authenticationprovidername), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE typo3_party_domain_model_abstractparty (persistence_object_identifier VARCHAR(40) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, dtype VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE typo3_party_domain_model_abstractparty_accounts_join (party_abstractparty VARCHAR(40) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, flow_security_account VARCHAR(40) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, INDEX IDX_1EEEBC2F38110E12 (party_abstractparty), UNIQUE INDEX UNIQ_1EEEBC2F58842EFC (flow_security_account), PRIMARY KEY(party_abstractparty, flow_security_account)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE typo3_party_domain_model_electronicaddress (persistence_object_identifier VARCHAR(40) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, identifier VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, type VARCHAR(20) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, usagetype VARCHAR(20) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_unicode_ci`, approved TINYINT(1) NOT NULL, dtype VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE typo3_party_domain_model_person (persistence_object_identifier VARCHAR(40) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, name VARCHAR(40) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_unicode_ci`, primaryelectronicaddress VARCHAR(40) CHARACTER SET utf8mb3 DEFAULT NULL COLLATE `utf8mb3_unicode_ci`, INDEX IDX_C60479E1A7CECF13 (primaryelectronicaddress), UNIQUE INDEX UNIQ_C60479E15E237E06 (name), PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE typo3_party_domain_model_person_electronicaddresses_join (party_person VARCHAR(40) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, party_electronicaddress VARCHAR(40) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, INDEX IDX_BE7D49F772AAAA2F (party_person), INDEX IDX_BE7D49F7B06BD60D (party_electronicaddress), PRIMARY KEY(party_person, party_electronicaddress)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE typo3_party_domain_model_personname (persistence_object_identifier VARCHAR(40) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, title VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, firstname VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, middlename VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, lastname VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, othername VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, alias VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, fullname VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, dtype VARCHAR(255) CHARACTER SET utf8mb3 NOT NULL COLLATE `utf8mb3_unicode_ci`, PRIMARY KEY(persistence_object_identifier)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE achimfritz_championship_tip_domain_model_tipgr_c2a81_users_join ADD CONSTRAINT FK_6F435DBC246893B3 FOREIGN KEY (tip_tipgroupresultmatrix) REFERENCES achimfritz_championship_tip_domain_model_tipgroupresultmatrix (persistence_object_identifier) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE achimfritz_championship_tip_domain_model_tipgr_c2a81_users_join ADD CONSTRAINT FK_6F435DBCA995E300 FOREIGN KEY (user_user) REFERENCES achimfritz_championship_user_domain_model_user (persistence_object_identifier) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE achimfritz_championship_tip_domain_model_tipgro_c2a81_rows_join ADD CONSTRAINT FK_A8E08DB6246893B3 FOREIGN KEY (tip_tipgroupresultmatrix) REFERENCES achimfritz_championship_tip_domain_model_tipgroupresultmatrix (persistence_object_identifier) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE achimfritz_championship_tip_domain_model_tipgro_c2a81_rows_join ADD CONSTRAINT FK_A8E08DB65A2D8605 FOREIGN KEY (tip_tipgroupresultmatrixrow) REFERENCES achimfritz_championship_tip_domain_model_tipgroupresultma_d24a5 (persistence_object_identifier) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE achimfritz_championship_tip_domain_model_tipgro_d24a5_tips_join ADD CONSTRAINT FK_52665F765A2D8605 FOREIGN KEY (tip_tipgroupresultmatrixrow) REFERENCES achimfritz_championship_tip_domain_model_tipgroupresultma_d24a5 (persistence_object_identifier) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE achimfritz_championship_tip_domain_model_tipgro_d24a5_tips_join ADD CONSTRAINT FK_52665F76FA1557BF FOREIGN KEY (tip_tip) REFERENCES achimfritz_championship_tip_domain_model_tip (persistence_object_identifier) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE achimfritz_championship_tip_domain_model_tipgroupresultma_d24a5 ADD CONSTRAINT FK_6D37622ADFBDA53F FOREIGN KEY (generalmatch) REFERENCES achimfritz_championship_competition_domain_model_match (persistence_object_identifier) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE typo3_party_domain_model_abstractparty_accounts_join ADD CONSTRAINT FK_1EEEBC2F38110E12 FOREIGN KEY (party_abstractparty) REFERENCES typo3_party_domain_model_abstractparty (persistence_object_identifier) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE typo3_party_domain_model_abstractparty_accounts_join ADD CONSTRAINT FK_1EEEBC2F58842EFC FOREIGN KEY (flow_security_account) REFERENCES typo3_flow_security_account (persistence_object_identifier) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE typo3_party_domain_model_person ADD CONSTRAINT typo3_party_domain_model_person_ibfk_1 FOREIGN KEY (name) REFERENCES typo3_party_domain_model_personname (persistence_object_identifier) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE typo3_party_domain_model_person ADD CONSTRAINT typo3_party_domain_model_person_ibfk_2 FOREIGN KEY (primaryelectronicaddress) REFERENCES typo3_party_domain_model_electronicaddress (persistence_object_identifier) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE typo3_party_domain_model_person ADD CONSTRAINT typo3_party_domain_model_person_ibfk_3 FOREIGN KEY (persistence_object_identifier) REFERENCES typo3_party_domain_model_abstractparty (persistence_object_identifier) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE typo3_party_domain_model_person_electronicaddresses_join ADD CONSTRAINT typo3_party_domain_model_person_electronicaddresses_join_ibfk_1 FOREIGN KEY (party_person) REFERENCES typo3_party_domain_model_person (persistence_object_identifier) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE typo3_party_domain_model_person_electronicaddresses_join ADD CONSTRAINT typo3_party_domain_model_person_electronicaddresses_join_ibfk_2 FOREIGN KEY (party_electronicaddress) REFERENCES typo3_party_domain_model_electronicaddress (persistence_object_identifier) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
