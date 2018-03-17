<?php

namespace Lycium\LyciumForm;

use Lycium\LyciumForm\DataProvider\ConfigurationDataProvider;
use Lycium\LyciumForm\Exception\InvalidFormDataException;
use Lycium\LyciumForm\Exception\InvalidFormFieldException;

class FormConfiguration
{
    /**
     * @var ConfigurationDataProvider
     */
    private $dataProvider;

    /**
     * FormConfiguration constructor.
     * @param ConfigurationDataProvider $dataProvider
     */
    public function __construct(ConfigurationDataProvider $dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }

    /**
     * @param string $formId
     * @return FormField[]
     * @throws InvalidFormDataException
     */
    public function getFields(string $formId): array
    {
        $fields = [];
        $responses = $this->dataProvider->getFieldsOfForm($formId);
        foreach ($responses as $response) {
            try {
                $formField = new FormField($response->getName(), $response->getType());
            } catch (InvalidFormFieldException $exception) {
                throw new InvalidFormDataException(
                    'Error while creating form fields from configuration: ' . $exception->getMessage()
                );
            }
            $formField->setValues($response->getValues());
            $fields[] = $formField;
        }
        return $fields;
    }
}
