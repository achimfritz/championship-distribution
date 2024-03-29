<?php
namespace Neos\Flow\Persistence\Doctrine\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs! This block will be used as the migration description if getDescription() is not used.
 */
class Version20210521153033 extends AbstractMigration
{

    /**
     * @return string
     */
    public function getDescription(): string 
    {
        return '';
    }

    /**
     * @param Schema $schema
     * @return void
     */
    public function up(Schema $schema): void 
    {
        // this up() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on "mysql".');
        
        $this->addSql('ALTER TABLE achimfritz_championship_tip_domain_model_cupranking CHANGE `rank` ranking INT NOT NULL');
        $this->addSql('ALTER TABLE achimfritz_championship_tip_domain_model_ranking CHANGE `rank` ranking INT NOT NULL');
    }

    /**
     * @param Schema $schema
     * @return void
     */
    public function down(Schema $schema): void 
    {
        // this down() migration is autogenerated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on "mysql".');
        
        $this->addSql('ALTER TABLE achimfritz_championship_tip_domain_model_cupranking CHANGE ranking `rank` INT NOT NULL');
        $this->addSql('ALTER TABLE achimfritz_championship_tip_domain_model_ranking CHANGE ranking `rank` INT NOT NULL');
    }
}