<?php

namespace Lycium\LyciumForm\DataProvider;

interface ConfigurationDataProvider
{
    /**
     * @param int $formId
     * @return ConfigurationDataResponse[]
     */
    public function getFieldsOfForm(int $formId): array;
}
