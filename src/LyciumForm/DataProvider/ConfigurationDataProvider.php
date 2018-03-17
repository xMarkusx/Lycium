<?php

namespace Lycium\LyciumForm\DataProvider;

interface ConfigurationDataProvider
{
    /**
     * @param string $formId
     * @return FieldConfiguration[]
     */
    public function getFieldsOfForm(string $formId): array;
}
