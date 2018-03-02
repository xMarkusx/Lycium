<?php

namespace Lycium\LyciumForm\Tests\Unit\Presenter;

use Lycium\LyciumForm\Presenter\FormPresenter;

class DummyFormPresenter implements FormPresenter
{
    /**
     * @var bool
     */
    public $presentHasBeenCalled = false;

    /**
     * @var bool
     */
    public $presentAfterFailedValidationHasBeenCalled = false;

    /**
     * @var array
     */
    public $fields = [];

    /**
     * @var array
     */
    public $validationErrors = [];

    /**
     * @param array $fields
     */
    public function present(array $fields): void
    {
        $this->presentHasBeenCalled = true;
        $this->fields = $fields;
    }

    /**
     * @param array $fields
     * @param array $validationErrors
     */
    public function presentAfterFailedValidation(array $fields, array $validationErrors): void
    {
        $this->presentAfterFailedValidationHasBeenCalled = true;
        $this->fields = $fields;
        $this->validationErrors = $validationErrors;
    }
}
