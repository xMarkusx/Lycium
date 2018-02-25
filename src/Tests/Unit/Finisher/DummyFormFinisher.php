<?php

namespace Lycium\LyciumForm\Tests\Unit\Finisher;

use Lycium\LyciumForm\Finisher\FormFinisher;

class DummyFormFinisher implements FormFinisher
{
    public $formData = [];

    /**
     * @param array $formData
     */
    public function finish(array $formData): void
    {
        $this->formData = $formData;
    }
}
