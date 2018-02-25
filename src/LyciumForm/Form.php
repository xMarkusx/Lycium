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
        $presenterData = [];
        $fields = $this->formConfiguration->getFields($formId);
        foreach ($fields as $field) {
            $presenterData[] = [
                'name' => $field->getName(),
                'type' => $field->getType(),
                'values' => $field->getValues(),
            ];
        }
        $this->presenter->present($presenterData);
    }
}