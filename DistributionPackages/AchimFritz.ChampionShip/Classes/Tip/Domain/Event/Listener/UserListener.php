<?php

namespace AchimFritz\ChampionShip\Tip\Domain\Event\Listener;

use AchimFritz\ChampionShip\Tip\Domain\Model\Tip;
use AchimFritz\ChampionShip\User\Domain\Model\User;
use Neos\Flow\Annotations as Flow;
use AchimFritz\ChampionShip\Competition\Domain\Model\GeneralMatch;

/**
 * @Flow\Scope("singleton")
 */
class UserListener
{
    /**
     * @var \AchimFritz\ChampionShip\Tip\Domain\Repository\TipRepository
     * @Flow\Inject
     */
    protected $tipRepository;

    /**
     * @var \AchimFritz\ChampionShip\Competition\Domain\Repository\GeneralMatchRepository
     * @Flow\Inject
     */
    protected $matchRepository;

    public function onUserAdded(User $user)
    {
        $matches = $this->matchRepository->findInFuture();
        foreach ($matches as $match) {
            $tip = new Tip();
            $tip->setMatch($match);
            $tip->setUser($user);
            $this->tipRepository->add($tip);
        }
    }
}
