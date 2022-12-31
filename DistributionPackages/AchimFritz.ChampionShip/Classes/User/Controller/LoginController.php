<?php

namespace AchimFritz\ChampionShip\User\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Flow.Login".  *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

use AchimFritz\ChampionShip\User\Domain\Repository\UserRepository;
use Neos\Flow\Annotations as Flow;
use Neos\Flow\I18n\Translator;

/**
 * A controller which allows for loggin into a application
 *
 * @Flow\Scope("singleton")
 */
class LoginController extends \Neos\Flow\Security\Authentication\Controller\AbstractAuthenticationController
{
    /**
     * @Flow\Inject
     */
    protected UserRepository $userRepository;

    /**
     * @Flow\Inject
     */
    protected Translator $translator;

    public function indexAction(): void
    {
        $account = $this->securityContext->getAccount();
        if ($account) {
            $user = $this->userRepository->findOneByAccount($account);
            $this->view->assign('user', $user);
        }
    }

    public function onAuthenticationSuccess(\Neos\Flow\Mvc\ActionRequest $originalRequest = null): void
    {
        $message = $this->translator->translateById('loginSuccess', [], null, null, 'Main', 'AchimFritz.ChampionShip');
        $this->addFlashMessage($message, '', \Neos\Error\Messages\Message::SEVERITY_OK);
        $this->redirect('index', 'Standard', 'AchimFritz.ChampionShip\\Generic');
    }

    public function logoutAction(): void
    {
        parent::logoutAction();
        $message = $this->translator->translateById('logoutSuccess', [], null, null, 'Main', 'AchimFritz.ChampionShip');
        $this->addFlashMessage($message, '', \Neos\Error\Messages\Message::SEVERITY_OK);
        $this->redirect('index', 'Standard', 'AchimFritz.ChampionShip\\Generic');
    }

    protected function onAuthenticationFailure(\Neos\Flow\Security\Exception\AuthenticationRequiredException $exception = null): void
    {
        $message = $this->translator->translateById('loginFailed', [], null, null, 'Main', 'AchimFritz.ChampionShip');
        $this->addFlashMessage($message, '', \Neos\Error\Messages\Message::SEVERITY_ERROR);
    }

    protected function errorAction(): void
    {
        $this->redirect('index', 'Standard', 'AchimFritz.ChampionShip\\Generic');
    }
}
