<?php

namespace AchimFritz\ChampionShip\Mvc\View;

class JsonView extends \AchimFritz\Rest\Mvc\View\JsonView
{
    /**
     * @var array
     */
    protected $configuration = [
        'cup' => [
            '_exclude' => ['team']
        ],
        'recentCup' => [
            '_exclude' => ['team']
        ],
        'match' => [
            '_exclude' => ['teamHasWonThisMatch', 'twoTeamsPlayThisMatch']
        ],
        'cups' => [
            '_descendAll' => [
                '_exclude' => ['team'],
            ]
        ],
        'matches' => [
            '_descendAll' => [
                //'_only' => array('name', 'startDate', 'result', 'hostTeam', 'guestTeam'),
                '_exclude' => ['teamHasWonThisMatch', 'twoTeamsPlayThisMatch', 'cup', 'round'],
            ]
        ],
        'nextMatches' => [
            '_descendAll' => [
                '_exclude' => ['teamHasWonThisMatch', 'twoTeamsPlayThisMatch'],
            ]
        ],
        'lastMatches' => [
            '_descendAll' => [
                '_exclude' => ['teamHasWonThisMatch', 'twoTeamsPlayThisMatch'],
            ]
        ]
    ];
}
