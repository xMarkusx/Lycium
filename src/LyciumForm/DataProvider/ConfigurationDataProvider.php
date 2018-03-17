<?php

namespace Lycium\LyciumForm\DataProvider;

interface ConfigurationDataProvider
{
    /**
     * @param string $formId
     * @return ConfigurationData[]
     */
    public function getFieldsOfForm(string $formId): array;
}
