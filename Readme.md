install
-------

	git clone git@github.com:achimfritz/championship-distribution.git
	cd championship-distribution
	composer install
	edit Configuration/Settings.yaml for db connection
	create database <db_name> DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
	edit Configuration/Routes.yaml, add as first route:

	-
	  name: 'ChampionShip'
	  uriPattern: '<ChampionShipSubroutes>'
	  subRoutes:
	    ChampionShipSubroutes:
	      package: AchimFritz.ChampionShip
	
	remove welcome route

	as root:
	./flow flow:core:setfilepermissions af www-data www-data

	as user:
	./flow doctrine:migrate
	./flow account:create admin test123 Achim Fritz AchimFritz.ChampionShip:Administrator

	-> login or import stuff from AchimFritz.ChampionShip.Import 
	-> NOTE: mixing creation of users and matches will destroy the user.tips (because they are init on user creation (or by cli (user:initusersforrecentcup)) (for currentCup))


import stuff from AchimFritz.ChampionShip.Import
------------------------------------------------

	teams (should be always the first)
	./flow import:team AchimFritz.ChampionShip.Import/Private/teams/teams.json
	
	wm14
	./flow import:match AchimFritz.ChampionShip.Import/Private/wm2014/matches.json
	./flow import:match AchimFritz.ChampionShip.Import/Private/wm2014/matches.json
	./flow import:komatch AchimFritz.ChampionShip.Import/Private/wm2014/koMatches.json

	or run the shell script for all cups
	./import_matches.sh

	(./import_user_tips.sh will not work without package AchimFritz.ChampionShip.AchimFritz or other providing functionality and data)


Customizing 
------------

- in Configuration/Settings.yaml

		AchimFritz:
		  ChampionShip:
			 csStyle: 1
			 mailTo: mailTo@domain.tld
			 mailFrom: noreply@domain.tld

- tipptrip stuff
-- emails Service/NotificationService
-- info Template
