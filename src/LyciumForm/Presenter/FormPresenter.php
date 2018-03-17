<?php

namespace Lycium\LyciumForm\Presenter;

interface FormPresenter
{
    /**
     * @param PresenterFieldData[] $fields
     */
    public function present(array $fields): void;

    /**
     * @param PresenterFieldData[] $fields
     * @param array $validationErrors
     */
    public function presentAfterFailedValidation(array $fields, array $validationErrors): void;
}
