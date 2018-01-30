<?php

namespace Lycium\LyciumForm;

use Lycium\LyciumForm\DataProvider\ConfigurationDataProvider;

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
     * @param int $formId
     * @return array
     */
    public function getFields(int $formId): array
    {
        return $this->dataProvider->getFieldsOfForm($formId);
    }
}
