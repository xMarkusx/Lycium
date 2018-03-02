<?php

namespace Lycium\LyciumForm;

use Lycium\LyciumForm\Finisher\FinisherRequestDatum;
use Lycium\LyciumForm\Finisher\FormFinisher;
use Lycium\LyciumForm\Validation\Exception\ValidationFailedException;
use Lycium\LyciumForm\Validation\Validator;

class FormProcessor
{
    /**
     * @var FormFinisher
     */
    private $finisher;

    /**
     * @var Validator
     */
    private $validator;

    /**
     * FormProcessor constructor.
     * @param FormFinisher $finisher
     */
    public function __construct(FormFinisher $finisher, Validator $validator)
    {
        $this->finisher = $finisher;
        $this->validator = $validator;
    }

    /**
     * @param string $formId
     * @param array $formData
     * @throws ValidationFailedException
     */
    public function processForm(string $formId, array $formData): void
    {
        if (!$this->validator->validate($formData)) {
            $failedValidationException = new ValidationFailedException('There were validation errors!');
            $failedValidationException->setValidationErrors($this->validator->getValidationErrors());
            throw $failedValidationException;
        }
        $finisherRequestData = [];
        foreach ($formData as $key => $datum) {
            $finisherRequestData[] = new FinisherRequestDatum($key, $datum);
        }
        $this->finisher->finish($finisherRequestData);
    }
}
