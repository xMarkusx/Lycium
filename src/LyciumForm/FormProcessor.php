<?php

namespace Lycium\LyciumForm;

use Lycium\LyciumForm\Finisher\FinisherFieldData;
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
     * @param Validator $validator
     */
    public function __construct(FormFinisher $finisher, Validator $validator)
    {
        $this->finisher = $finisher;
        $this->validator = $validator;
    }

    /**
     * @param string $formId
     * @param FieldData[] $formData
     * @throws ValidationFailedException
     */
    public function processForm(string $formId, array $formData): void
    {
        if (!$this->validator->validate($formData, $formId)) {
            $failedValidation = new ValidationFailedException('There were validation errors!');
            $failedValidation->setValidationErrors($this->validator->getValidationErrors());
            throw $failedValidation;
        }
        $finisherRequestData = [];
        foreach ($formData as $fieldData) {
            $finisherRequestData[] = new FinisherFieldData($fieldData->getName(), $fieldData->getValue());
        }
        $this->finisher->finish($finisherRequestData);
    }
}
