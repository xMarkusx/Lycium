<?php

namespace Lycium\LyciumForm\Finisher;

interface FormFinisher
{
    /**
     * @param FinisherFieldData[] $formData
     */
    public function finish(array $formData): void;
}
