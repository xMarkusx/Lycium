<?php

namespace Lycium\LyciumForm\DataProvider;

interface ConfigurationDataProvider
{
    /**
     * @param string $formId
     * @return ConfigurationDataResponse[]
     */
    public function getFieldsOfForm(string $formId): array;
}
