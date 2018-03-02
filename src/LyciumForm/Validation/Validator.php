<?php

namespace Lycium\LyciumForm\Validation;

interface Validator
{
    /**
     * @param array $formData
     * @return bool
     */
    public function validate(array $formData): bool;

    /**
     * @return array
     */
    public function getValidationErrors(): array;
}
