<?php

namespace Lycium\LyciumForm\Finisher;

interface FormFinisher
{
    /**
     * @param FinisherRequestDatum[] $formData
     */
    public function finish(array $formData): void;
}
