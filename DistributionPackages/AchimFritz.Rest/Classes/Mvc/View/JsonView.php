<?php

namespace AchimFritz\Rest\Mvc\View;

class JsonView extends \Neos\Flow\Mvc\View\JsonView
{
    /**
     * empty array instead of array('value')
     *
     * @var array
     */
    protected $variablesToRender = [];

    /**
     * Transforms the value view variable to a serializable
     * array represantion using a YAML view configuration and JSON encodes
     * the result.
     *
     * @return string The JSON encoded variables
     * @api
     */
    public function render(): string
    {
        // we do not have to set response Content-Type
        if (count($this->variablesToRender) === 0) {
            // render all variables exclude settings
            foreach ($this->variables as $key => $value) {
                if ($key !== 'settings') {
                    $this->variablesToRender[] = $key;
                }
            }
        }
        $propertiesToRender = $this->renderArray();
        $flashMessagesToRender = $this->renderFlashMessages();
        $propertiesToRender['flashMessages'] = $flashMessagesToRender;
        $propertiesToRender['validationErrors'] = $this->renderValidationErrors();
        return json_encode($propertiesToRender);
    }

    /**
     * Loads the configuration and transforms the value to a serializable
     * array.
     *
     * lw_af always render assoc
     *
     * @return array An array containing the values, ready to be JSON encoded
     * @api
     */
    protected function renderArray(): array
    {
        $valueToRender = [];
        foreach ($this->variablesToRender as $variableName) {
            $valueToRender[$variableName] = isset($this->variables[$variableName]) ? $this->variables[$variableName] : null;
        }
        $configuration = $this->configuration;
        return $this->transformValue($valueToRender, $configuration);
    }

    /**
     * Transforms a value depending on type recursively using the
     * supplied configuration.
     *
     * @param mixed $value The value to transform
     * @param array $configuration Configuration for transforming the value
     * @return array The transformed value
     */
    protected function transformValue($value, array $configuration)
    {
        // render always the identifier for entities
        if (!isset($configuration['_exposeObjectIdentifier'])) {
            $configuration['_exposeObjectIdentifier'] = true;
        }
        return parent::transformValue($value, $configuration);
    }


    /**
     * renderFlashMessages
     *
     * @return array
     */
    protected function renderFlashMessages()
    {
        $allMessages = $this->controllerContext->getFlashMessageContainer()->getMessagesAndFlush();
        $messages = [];
        foreach ($allMessages as $message) {
            $messages[] = [
                'message' => $message->render(),
                'title' => $message->getTitle(),
                'severity' => $message->getSeverity()
            ];
        }
        return $messages;
    }

    protected function renderValidationErrors(): array
    {
        $arguments = $this->controllerContext->getArguments();
        $validationResults = $arguments->getValidationResults();
        $validationErrors = [];
        foreach ($validationResults->getFlattenedErrors() as $key => $errors) {
            $validationError  = ['property' => $key, 'errors' => []];
            foreach ($errors as $error) {
                $validationError['errors'][] = [
                    'message' => $error->getMessage(),
                    'code' => $error->getCode()
                ];
            }
            $validationErrors[] = $validationError;
        }
        return $validationErrors;
    }
}
