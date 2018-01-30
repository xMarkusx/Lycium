<?php

namespace Lycium\LyciumForm;

use Lycium\LyciumForm\Presenter\FormPresenter;

class Form
{
    /**
     * @var FormPresenter
     */
    private $presenter;

    /**
     * Form constructor.
     * @param FormPresenter $presenter
     */
    public function __construct(FormPresenter $presenter)
    {
        $this->presenter = $presenter;
    }

    public function display(): void
    {
        $this->presenter->present([]);
    }
}