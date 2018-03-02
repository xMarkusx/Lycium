<?php

namespace Lycium\LyciumForm\Validation\Exception;

class ValidationFailedException extends \Exception
{
    /**
     * @var array
     */
    private $validationErrors = [];

    /**
     * @return array
     */
    public function getValidationErrors(): array
    {
        return $this->validationErrors;
    }

    /**
     * @param array $validationErrors
     */
    public function setValidationErrors(array $validationErrors): void
    {
        $this->validationErrors = $validationErrors;
    }
}
