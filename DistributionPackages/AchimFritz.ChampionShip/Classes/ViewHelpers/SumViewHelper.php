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

use Neos\Flow\Annotations as Flow;

/**
 *
 * Enter description here ...
 * @author af
 *
 */
class SumViewHelper extends \Neos\FluidAdaptor\Core\ViewHelper\AbstractViewHelper
{
    /**
     * NOTE: This property has been introduced via code migration to ensure backwards-compatibility.
     * @see AbstractViewHelper::isOutputEscapingEnabled()
     * @var boolean
     */
    protected $escapeOutput = false;

    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('summandOne', 'int', 'summandOne', true);
        $this->registerArgument('summandTwo', 'int', 'summandTwo', true);
    }

    public function render(): int
    {
        $summandOne = $this->arguments['summandOne'];
        $summandTwo = $this->arguments['summandTwo'];
        return (int)$summandOne + $summandTwo;
    }
}
