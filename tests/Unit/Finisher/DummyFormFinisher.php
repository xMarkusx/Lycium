<?php

namespace Lycium\LyciumForm\Tests\Unit\Finisher;

use Lycium\LyciumForm\Finisher\FinisherRequestDatum;
use Lycium\LyciumForm\Finisher\FormFinisher;

class DummyFormFinisher implements FormFinisher
{
    public $formData = [];

    /**
     * @param FinisherRequestDatum[] $formData
     */
    public function finish(array $formData): void
    {
        $this->formData = $formData;
    }
}
