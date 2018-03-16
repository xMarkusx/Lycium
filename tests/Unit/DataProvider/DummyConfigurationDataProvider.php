<?php

namespace Lycium\LyciumForm\Tests\Unit\DataProvider;

use Lycium\LyciumForm\DataProvider\ConfigurationDataProvider;
use Lycium\LyciumForm\DataProvider\ConfigurationDataResponse;

class DummyConfigurationDataProvider implements ConfigurationDataProvider
{
    public $fields = [];

    /**
     * @param string $formId
     * @return ConfigurationDataResponse[]
     */
    public function getFieldsOfForm(string $formId): array
    {
        return $this->fields;
    }
}
