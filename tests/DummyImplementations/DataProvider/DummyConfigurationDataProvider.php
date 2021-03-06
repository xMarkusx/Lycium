<?php

namespace Lycium\LyciumForm\Tests\DummyImplementations\DataProvider;

use Lycium\LyciumForm\DataProvider\ConfigurationDataProvider;
use Lycium\LyciumForm\DataProvider\FieldConfiguration;

class DummyConfigurationDataProvider implements ConfigurationDataProvider
{
    public $fields = [];

    /**
     * @param string $formId
     * @return FieldConfiguration[]
     */
    public function getFieldsOfForm(string $formId): array
    {
        return $this->fields;
    }
}
