<?php

namespace Lycium\LyciumForm\Tests\Unit\DataProvider;

use Lycium\LyciumForm\DataProvider\ConfigurationDataProvider;

class DummyConfigurationDataProvider implements ConfigurationDataProvider
{
    public $fields = [];

    public function getFieldsOfForm(int $formId): array
    {
        return $this->fields;
    }
}
