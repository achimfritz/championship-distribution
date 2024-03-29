<?php

namespace AchimFritz\ChampionShip\ViewHelpers;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Fluid".                 *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use AchimFritz\ChampionShip\Competition\Domain\Model\Cup;
use AchimFritz\ChampionShip\Competition\Domain\Repository\GeneralMatchRepository;
use Neos\Flow\Annotations as Flow;

/**
 *
 * Enter description here ...
 * @author af
 *
 */
class CurrentMatchesViewHelper extends \Neos\FluidAdaptor\Core\ViewHelper\AbstractViewHelper
{
    /**
     * NOTE: This property has been introduced via code migration to ensure backwards-compatibility.
     * @see AbstractViewHelper::isOutputEscapingEnabled()
     * @var boolean
     */
    protected $escapeOutput = false;

    /**
     * @Flow\Inject
     */
    protected GeneralMatchRepository $matchRepository;

    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('cup', Cup::class, 'cup', true);
        $this->registerArgument('limit', 'int', 'limit');
        $this->registerArgument('past', 'bool', 'past');
    }

    public function render(): string
    {
        $cup = $this->arguments['cup'];
        $limit = $this->arguments['limit'] ?? 2;
        $past = (bool)($this->arguments['past'] ?? true);
        if ($past === true) {
            $matches = $this->matchRepository->findLastByCup($cup, $limit);
        } else {
            $matches = $this->matchRepository->findNextByCup($cup, $limit);
        }
        $this->templateVariableContainer->add('matches', $matches);
        $out = $this->renderChildren();
        $this->templateVariableContainer->remove('matches');
        return $out;
    }
}
