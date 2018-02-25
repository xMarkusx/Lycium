<?php

namespace Lycium\LyciumForm\Finisher;

interface FormFinisher
{
    /**
     * @param array $formData
     */
    public function finish(array $formData): void;
}
