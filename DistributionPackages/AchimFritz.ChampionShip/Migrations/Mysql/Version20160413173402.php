<?php
namespace Neos\Flow\Persistence\Doctrine\Migrations;

use Doctrine\Migrations\AbstractMigration,
	Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20160413173402 extends AbstractMigration {

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function up(Schema $schema): void  {
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
		$this->addSql("UPDATE achimfritz_championship_competition_domain_model_cup SET tippointspolicy='\\\AchimFritz\\\ChampionShip\\\Tip\\\Domain\\\Policy\\\TipPoints\\\TwoOnePolicy' WHERE tippointspolicy='\\\AchimFritz\\\ChampionShip\\\Domain\\\Policy\\\TipPoints\\\TwoOnePolicy'");
		$this->addSql("UPDATE achimfritz_championship_competition_domain_model_cup SET tippointspolicy='\\\AchimFritz\\\ChampionShip\\\Tip\\\Domain\\\Policy\\\TipPoints\\\ThreeOnePolicy' WHERE tippointspolicy='\\\AchimFritz\\\ChampionShip\\\Domain\\\Policy\\\TipPoints\\\ThreeOnePolicy'");

	}

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function down(Schema $schema): void  {
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
		$this->addSql("UPDATE achimfritz_championship_competition_domain_model_cup SET tippointspolicy='\\\AchimFritz\\\ChampionShip\\\Domain\\\Policy\\\TipPoints\\\TwoOnePolicy' WHERE tippointspolicy='\\\AchimFritz\\\ChampionShip\\\Tip\\\Domain\\\Policy\\\TipPoints\\\TwoOnePolicy'");
		$this->addSql("UPDATE achimfritz_championship_competition_domain_model_cup SET tippointspolicy='\\\AchimFritz\\\ChampionShip\\\Domain\\\Policy\\\TipPoints\\\ThreeOnePolicy' WHERE tippointspolicy='\\\AchimFritz\\\ChampionShip\\\Tip\\\Domain\\\Policy\\\TipPoints\\\ThreeOnePolicy'");


	}
}