<?php

namespace Lycium\LyciumForm\DataProvider;

interface ConfigurationDataProvider
{
    public function getFieldsOfForm(int $formId): array;
}
