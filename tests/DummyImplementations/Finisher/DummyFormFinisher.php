<?php

namespace Lycium\LyciumForm\Tests\DummyImplementations\Finisher;

use Lycium\LyciumForm\Finisher\FinisherFieldData;
use Lycium\LyciumForm\Finisher\FormFinisher;

class DummyFormFinisher implements FormFinisher
{
    public $formData = [];

    /**
     * @param FinisherFieldData[] $formData
     */
    public function finish(array $formData): void
    {
        $this->formData = $formData;
    }
}
