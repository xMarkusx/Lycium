<?php

namespace Lycium\LyciumForm\Tests\Unit\Validation;

use Lycium\LyciumForm\FieldData;
use Lycium\LyciumForm\Validation\Validator;

class DummyValidator implements Validator
{
    /**
     * @var bool
     */
    public $willFail = false;

    /**
     * @var bool
     */
    public $validateHasBeenCalled = false;

    /**
     * @var array
     */
    public $validationErrors = [];

    /**
     * @param FieldData[] $formData
     * @param string $formId
     * @return bool
     */
    public function validate(array $formData, string $formId): bool
    {
        $this->validateHasBeenCalled = true;
        return !$this->willFail;
    }

    /**
     * @return array
     */
    public function getValidationErrors(): array
    {
        return $this->validationErrors;
    }
}
