<?php

namespace Lycium\LyciumForm;

use Lycium\LyciumForm\DataProvider\ConfigurationDataProvider;
use Lycium\LyciumForm\Presenter\FormPresenter;
use Lycium\LyciumForm\Presenter\PresenterFieldData;

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
        $this->presenter->present($this->buildConfiguredFieldData($formId));
    }

    /**
     * @param string $formId
     * @param array $values
     * @param array $validationErrors
     * @throws Exception\InvalidFormDataException
     */
    public function repopulate(string $formId, array $values, array $validationErrors): void
    {
        $configuredData = $this->buildConfiguredFieldData($formId);
        $dataToRepopulate = $this->overrideDefaultValuesWithSubmittedValues($configuredData, $values);
        $this->presenter->presentAfterFailedValidation($dataToRepopulate, $validationErrors);
    }

    /**
     * @param string $formId
     * @return array
     * @throws Exception\InvalidFormDataException
     */
    private function buildConfiguredFieldData(string $formId): array
    {
        $presenterData = [];
        $fields = $this->formConfiguration->getFields($formId);
        foreach ($fields as $field) {
            $presenterData[] = new PresenterFieldData(
                $field->getName(),
                $field->getType(),
                $field->getValues()
            );
        }
        return $presenterData;
    }

    /**
     * @param FieldData[] $formData
     * @param array $values
     * @return array
     */
    private function overrideDefaultValuesWithSubmittedValues(array $formData, array $values): array
    {
        $overriddenData = $formData;
        foreach ($formData as $key => $field) {
            if (array_key_exists($field->getName(), $values)) {
                $overriddenData[$key] = new PresenterFieldData(
                    $field->getName(),
                    $field->getType(),
                    $values[$field->getName()]
                );
            }
        }
        return $overriddenData;
    }
}
