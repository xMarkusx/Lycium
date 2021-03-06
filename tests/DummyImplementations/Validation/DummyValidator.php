<?php

namespace Lycium\LyciumForm\Tests\DummyImplementations\Validation;

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
     * @var array
     */
    public $fieldsToValidate = [];

    /**
     * @var string
     */
    public $formId = '';

    /**
     * @param FieldData[] $formData
     * @param string $formId
     * @return bool
     */
    public function validate(array $formData, string $formId): bool
    {
        $this->validateHasBeenCalled = true;
        $this->fieldsToValidate = $formData;
        $this->formId = $formId;
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
