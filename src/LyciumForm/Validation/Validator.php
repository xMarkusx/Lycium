<?php

namespace Lycium\LyciumForm\Validation;

use Lycium\LyciumForm\FieldData;

interface Validator
{
    /**
     * @param FieldData[] $formData
     * @param string $formId
     * @return bool
     */
    public function validate(array $formData, string $formId): bool;

    /**
     * @return array
     */
    public function getValidationErrors(): array;
}
