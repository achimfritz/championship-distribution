#!/bin/bash

for i in "em2004" "wm2006" "em2008" "wm2010" "wm2002" "wm2014"; do
	./flow import:match AchimFritz.ChampionShip.Import/Private/$i/matches.json
	./flow import:match AchimFritz.ChampionShip.Import/Private/$i/matches.json
done

./flow import:komatch AchimFritz.ChampionShip.Import/Private/wm2014/koMatches.json
