<?php

declare(strict_types=1);

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

use AchimFritz\ChampionShip\Competition\Domain\Model\Round;
use AchimFritz\ChampionShip\Competition\Domain\Model\ChildKoRound;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;

class IfIsChildKoRoundViewHelper extends \Neos\FluidAdaptor\Core\ViewHelper\AbstractConditionViewHelper
{
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('round', Round::class, 'round', true);
    }

    public function render(): string
    {
        if (static::evaluateCondition($this->arguments, $this->renderingContext)) {
            return (string)$this->renderThenChild();
        }
        return (string)$this->renderElseChild();
    }

    protected static function evaluateCondition($arguments, RenderingContextInterface $renderingContext): bool
    {
        return $arguments['round'] instanceof ChildKoRound;
    }
}
