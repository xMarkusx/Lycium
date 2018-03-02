<?php

namespace Lycium\LyciumForm\Presenter;

interface FormPresenter
{
    /**
     * @param array $fields
     */
    public function present(array $fields): void;

    /**
     * @param array $fields
     * @param array $validationErrors
     */
    public function presentAfterFailedValidation(array $fields, array $validationErrors): void;
}
