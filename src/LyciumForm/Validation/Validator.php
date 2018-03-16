<?php

namespace Lycium\LyciumForm\Validation;

interface Validator
{
    /**
     * @param array $formData
     * @param string $formId
     * @return bool
     */
    public function validate(array $formData, string $formId): bool;

    /**
     * @return array
     */
    public function getValidationErrors(): array;
}
