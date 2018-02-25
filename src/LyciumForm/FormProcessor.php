<?php

namespace Lycium\LyciumForm;

use Lycium\LyciumForm\Finisher\FormFinisher;

class FormProcessor
{
    /**
     * @var FormFinisher
     */
    private $finisher;

    /**
     * FormProcessor constructor.
     * @param FormFinisher $finisher
     */
    public function __construct(FormFinisher $finisher)
    {
        $this->finisher = $finisher;
    }

    /**
     * @param string $formId
     * @param array $formData
     */
    public function processForm(string $formId, array $formData): void
    {
        $this->finisher->finish($formData);
    }
}
