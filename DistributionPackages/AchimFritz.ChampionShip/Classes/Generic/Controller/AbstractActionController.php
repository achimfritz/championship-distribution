<?php
namespace AchimFritz\ChampionShip\Generic\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "AchimFritz.ChampionShip".*
 *                                                                        *
 *                                                                        */

use Neos\Flow\Annotations as Flow;
use Neos\Error\Messages\Message;
use AchimFritz\Rest\Controller\RestController;

/**
 * Action controller for the AchimFritz.ChampionShip package
 *
 * @Flow\Scope("singleton")
 */
class AbstractActionController extends RestController
{

    /**
     * @var \Neos\Flow\I18n\Translator
     * @Flow\Inject
     */
    protected $translator;

    /**
     * @var array
     */
    protected $viewFormatToObjectNameMap = array('json' => 'AchimFritz\\ChampionShip\\Mvc\\View\\JsonView');

    /**
     * @return void
     */
    protected function redirectHome()
    {
        $this->redirect('list', 'Standard', 'AchimFritz.ChampionShip\\Generic');
    }

    /**
     * @return void
     */
    protected function forwardHome()
    {
        $this->forward('list', 'Standard', 'AchimFritz.ChampionShip\\Generic');
    }


    /**
     * initializeView
     *
     * @return void
     */
    protected function initializeView(\Neos\Flow\Mvc\View\ViewInterface $view)
    {
        $view->assign('controllers', array('Team', 'User', 'Cup', 'Standard'));
        $view->assign('title', $this->request->getControllerName() . '.' . $this->request->getControllerActionName());
    }

    /**
     * addErrorMessage
     *
     * @param string $message
     * @return void
     */
    protected function addErrorMessage($message)
    {
        $this->addFlashMessage($message, '', Message::SEVERITY_ERROR);
    }

    /**
     * addWarningMessage
     *
     * @param string $message
     * @return void
     */
    protected function addWarningMessage($message)
    {
        $this->addFlashMessage($message, '', Message::SEVERITY_WARNING);
    }
    /**
     * addNoticeMessage
     *
     * @param string $message
     * @return void
     */
    protected function addNoticeMessage($message)
    {
        $this->addFlashMessage($message, '', Message::SEVERITY_NOTICE);
    }
    /**
     * addOkMessage
     *
     * @param string $message
     * @return void
     */
    protected function addOkMessage($message)
    {
        $this->addFlashMessage($message, '', Message::SEVERITY_OK);
    }

    protected function handleException(\Exception $e): void
    {
        $this->addFlashMessage($e->getMessage(), get_class($e), Message::SEVERITY_ERROR, array(), $e->getCode());
    }

    public function addFlashMessage($messageBody, $messageTitle = '', $severity = Message::SEVERITY_OK, array $messageArguments = [], $messageCode = null)
    {
        // try to translate message
        $id = 'flashMessage.' . str_replace(' ', '.', $messageBody);
        $msg = $this->translator->translateById($id, array(), null, null, 'Main', 'AchimFritz.ChampionShip');
        if ($msg === null) {
            parent::addFlashMessage($messageBody, $messageTitle, $severity, $messageArguments, $messageCode);
        } else {
            parent::addFlashMessage($msg, $messageTitle, $severity, $messageArguments, $messageCode);
        }
    }

    protected function getErrorFlashMessage()
    {
        return false;
    }
}
