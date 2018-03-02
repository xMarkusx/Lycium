<?php

namespace Lycium\LyciumForm;

use Lycium\LyciumForm\DataProvider\ConfigurationDataProvider;
use Lycium\LyciumForm\Presenter\FormPresenter;

class Form
{
    /**
     * @var FormPresenter
     */
    private $presenter;

    /**
     * @var FormConfiguration
     */
    private $formConfiguration;

    /**
     * Form constructor.
     * @param FormPresenter $presenter
     * @param ConfigurationDataProvider $dataProvider
     */
    public function __construct(FormPresenter $presenter, ConfigurationDataProvider $dataProvider)
    {
        $this->presenter = $presenter;
        $this->formConfiguration = new FormConfiguration($dataProvider);
    }

    /**
     * @param string $formId
     * @throws Exception\InvalidFormDataException
     */
    public function display(string $formId): void
    {
        $this->presenter->present($this->buildPresenterFieldData($formId));
    }

    /**
     * @param string $formId
     * @param array $values
     * @param array $validationErrors
     * @throws Exception\InvalidFormDataException
     */
    public function repopulate(string $formId, array $values, array $validationErrors): void
    {
        $this->presenter->presentAfterFailedValidation($this->buildPresenterFieldData($formId, $values), $validationErrors);
    }

    /**
     * @param string $formId
     * @param array $values
     * @return array
     * @throws Exception\InvalidFormDataException
     */
    private function buildPresenterFieldData(string $formId, array $values = []): array
    {
        $presenterData = [];
        $fields = $this->formConfiguration->getFields($formId);
        foreach ($fields as $field) {
            $fieldData = [
                'name' => $field->getName(),
                'type' => $field->getType(),
                'values' => $field->getValues(),
            ];
            if (array_key_exists($field->getName(), $values)) {
                $fieldData['values'] = $values[$field->getName()];
            }
            $presenterData[] = $fieldData;
        }
        return $presenterData;
    }
}