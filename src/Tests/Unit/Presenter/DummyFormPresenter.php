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
     * @var array
     */
    public $fields = [];

    /**
     * @param array $fields
     */
    public function present(array $fields): void
    {
        $this->presentHasBeenCalled = true;
        $this->fields = $fields;
    }
}
