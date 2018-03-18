<?php

namespace Lycium\LyciumForm\Tests\DummyImplementations\Presenter;

use Lycium\LyciumForm\Presenter\FormPresenter;
use Lycium\LyciumForm\Presenter\PresenterFieldData;

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
     * @param PresenterFieldData[] $fields
     */
    public function present(array $fields): void
    {
        $this->presentHasBeenCalled = true;
        $this->fields = $fields;
    }

    /**
     * @param PresenterFieldData[] $fields
     * @param array $validationErrors
     */
    public function presentAfterFailedValidation(array $fields, array $validationErrors): void
    {
        $this->presentAfterFailedValidationHasBeenCalled = true;
        $this->fields = $fields;
        $this->validationErrors = $validationErrors;
    }
}
