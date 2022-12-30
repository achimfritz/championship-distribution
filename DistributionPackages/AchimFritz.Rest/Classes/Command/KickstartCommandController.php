<?php

namespace AchimFritz\Rest\Command;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Neos.Kickstarter".       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 * of the License, or (at your option) any later version.                 *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Package\PackageManager;

/**
 * Command controller for the Kickstart generator
 *
 */
class KickstartCommandController extends \Neos\Flow\Cli\CommandController
{
    /**
     * @var PackageManager
     * @Flow\Inject
     */
    protected $packageManager;

    /**
     * @var \AchimFritz\Rest\Service\GeneratorService
     * @Flow\Inject
     */
    protected $generatorService;

    /**
     * Kickstart a new restaction controller
     *
     * Generates an Action Controller
     * extends from AchimFritz\Rest\Controller\RestController
     * and all rest actions, templates and Configuration/Views.yaml
     *
     * @param string $packageKey The package key of the package for the new controller with an optional subpackage, (e.g. "MyCompany.MyPackage/Admin").
     * @param string $controllerName The name for the new controller. This may also be a comma separated list of controller names.
     * @param boolean $force Overwrite any existing controller or template code. Regardless of this flag, the package, model and repository will never be overwritten.
     * @see typo3.kickstart:kickstart:commandcontroller
     */
    public function restControllerCommand($packageKey, $controllerName, $force = false)
    {
        $subpackageName = '';
        if (strpos($packageKey, '/') !== false) {
            list($packageKey, $subpackageName) = explode('/', $packageKey, 2);
        }
        $this->validatePackageKey($packageKey);
        if (!$this->packageManager->isPackageAvailable($packageKey)) {
            $this->outputLine('Package "%s" is not available.', [$packageKey]);
            $this->outputLine('Hint: Use --generate-related for creating it!');
            $this->quit(2);
        }
        $generatedFiles = [];
        $generatedModels = false;

        $controllerNames = \Neos\Utility\Arrays::trimExplode(',', $controllerName);
        foreach ($controllerNames as $currentControllerName) {
            $modelClassName = str_replace('.', '\\', $packageKey) . '\Domain\Model\\' . $currentControllerName;
            if (!class_exists($modelClassName)) {
                $this->outputLine('The model %s does not exist, but is necessary for creating the respective actions.', [$modelClassName]);
                $this->outputLine('Hint: Use --generate-related for creating it!');
                $this->quit(3);
            }

            $repositoryClassName = str_replace('.', '\\', $packageKey) . '\Domain\Repository\\' . $currentControllerName . 'Repository';
            if (!class_exists($repositoryClassName)) {
                $this->outputLine('The repository %s does not exist, but is necessary for creating the respective actions.', [$repositoryClassName]);
                $this->outputLine('Hint: Use --generate-related for creating it!');
                $this->quit(4);
            }
        }

        foreach ($controllerNames as $currentControllerName) {
            $generatedFiles += $this->generatorService->generateCrudController($packageKey, $subpackageName, $currentControllerName, $force);
            $generatedFiles += $this->generatorService->generateView($packageKey, $subpackageName, $currentControllerName, 'List', 'List', $force);
            $generatedFiles += $this->generatorService->generateView($packageKey, $subpackageName, $currentControllerName, 'Show', 'Show', $force);
        }
        $generatedFiles += $this->generatorService->generateException($packageKey, $force);

        $this->outputLine(implode(PHP_EOL, $generatedFiles));
    }

    /**
     * Checks the syntax of the given $packageKey and quits with an error message if it's not valid
     *
     * @param string $packageKey
     * @return void
     */
    protected function validatePackageKey($packageKey)
    {
        if (!$this->packageManager->isPackageKeyValid($packageKey)) {
            $this->outputLine('Package key "%s" is not valid. Only UpperCamelCase with alphanumeric characters in the format <VendorName>.<PackageKey>, please!', [$packageKey]);
            $this->quit(1);
        }
    }
}
