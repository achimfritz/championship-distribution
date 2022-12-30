<?php

namespace AchimFritz\Rest\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "AchimFritz.ServiceDescription".*
 *                                                                        *
 *                                                                        */

use Neos\Flow\Annotations as Flow;
use Neos\Error\Messages\Message;
use Neos\Flow\Mvc\ActionRequest;
use Neos\Flow\Mvc\ActionResponse;
use Neos\Flow\Mvc\Controller\ControllerContext;

/**
 * RestController
 */
class RestController extends \Neos\Flow\Mvc\Controller\RestController
{
    protected $supportedMediaTypes = ['text/html', 'application/json', 'application/xml'];
    protected string $mediaType;
    protected $viewFormatToObjectNameMap = ['json' => 'AchimFritz\\Rest\\Mvc\\View\\JsonView'];

    protected function initializeController(ActionRequest $request, ActionResponse $response)
    {
        $this->parentInitializeController($request, $response);
        // override request.format with NegotiatedMediaType aka HTTP-Request Content-Type and set Content-Type to response
        $this->mediaType = $this->negotiatedMediaType;
        if (in_array($this->mediaType, $this->supportedMediaTypes, true) === false) {
            $this->throwStatus(406);
        } else {
            $this->request->setFormat(preg_replace('/.*\/(.*)/', '$1', $this->mediaType));
            // sets the Content-Type to the response
            $this->response->setHttpHeader('Content-Type', $this->mediaType . '; charset=UTF-8', true);
        }
    }

    protected function resolveActionMethodName()
    {
        // sets correct $this->request actionMethodName:
        $actionMethodName = parent::resolveActionMethodName();
        // replace controllerContext sets which was set ini initializeController callec before actionMethod was replaced
        $this->controllerContext = new ControllerContext($this->request, $this->response, $this->arguments, $this->uriBuilder);
        return $actionMethodName;
    }


    protected function parentInitializeController(ActionRequest $request, ActionResponse $response)
    {
        parent::initializeController($request, $response);
    }


    protected function errorAction(): string
    {
        // we like to have a 400 status
        $this->response->setStatusCode(400);
        if ($this->mediaType === 'application/json') {
            $this->addFlashMessage('FATAL', '', Message::SEVERITY_ERROR);
            return '';
        } else {
            return parent::errorAction();
        }
    }

    protected function handleException(\Exception $e): void
    {
        $this->response->setStatusCode(500);
        // may be we want also an exceptionHandler e.g. to notify somebody, ...
        $this->addFlashMessage($e->getMessage(), get_class($e), Message::SEVERITY_ERROR, [], $e->getCode());
    }

    protected function redirect($actionName, $controllerName = null, $packageKey = null, array $arguments = [], $delay = 0, $statusCode = 303, $format = null)
    {
        if ($this->mediaType === 'application/json') {
            // render all arguments
            if ($arguments !== null) {
                foreach ($arguments as $key => $value) {
                    $this->view->assign($key, $value);
                }
            }
            // get uri (like AbstractController->redirect())
            // do we need/want the uri?
            if ($packageKey !== null && strpos($packageKey, '\\') !== false) {
                [$packageKey, $subpackageKey] = explode('\\', $packageKey, 2);
            } else {
                $subpackageKey = null;
            }
            $this->uriBuilder->reset();
            if ($format === null) {
                $this->uriBuilder->setFormat($this->request->getFormat());
            } else {
                $this->uriBuilder->setFormat($format);
            }

            $uri = $this->uriBuilder->setCreateAbsoluteUri(true)->uriFor($actionName, $arguments, $controllerName, $packageKey, $subpackageKey);
            $this->view->assign('see', $uri);
        } else {
            parent::redirect($actionName, $controllerName, $packageKey, $arguments, $delay, $statusCode, $format);
        }
    }
}
