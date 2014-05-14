#!/bin/bash

# wm2002 last because not users
for i in "em2004" "wm2006" "em2008" "wm2010" "wm2002"; do
	./flow import:user AchimFritz.ChampionShip.AchimFritz/Private/$i/users.json
	./flow import:tip AchimFritz.ChampionShip.AchimFritz/Private/$i/tips.json
done
