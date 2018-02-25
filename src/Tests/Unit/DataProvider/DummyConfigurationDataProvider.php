<?php

namespace Lycium\LyciumForm\Tests\Unit\DataProvider;

use Lycium\LyciumForm\DataProvider\ConfigurationDataProvider;
use Lycium\LyciumForm\DataProvider\ConfigurationDataResponse;

class DummyConfigurationDataProvider implements ConfigurationDataProvider
{
    public $fields = [];

    /**
     * @param int $formId
     * @return ConfigurationDataResponse[]
     */
    public function getFieldsOfForm(int $formId): array
    {
        return $this->fields;
    }
}
