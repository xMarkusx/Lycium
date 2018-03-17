<?php

namespace Lycium\LyciumForm\Tests\Unit;

use Lycium\LyciumForm\Finisher\FinisherFieldData;
use Lycium\LyciumForm\FormProcessor;
use Lycium\LyciumForm\Tests\Unit\Finisher\DummyFormFinisher;
use Lycium\LyciumForm\Tests\Unit\Validation\DummyValidator;
use Lycium\LyciumForm\Validation\Exception\ValidationFailedException;
use PHPUnit\Framework\TestCase;

class FormProcessorTest extends TestCase
{
    /**
     * @var DummyFormFinisher
     */
    private $finisher;

    /**
     * @var DummyValidator
     */
    private $validator;

    /**
     * @var FormProcessor
     */
    private $processor;

    public function setUp()
    {
        parent::setUp();
        $this->finisher = new DummyFormFinisher();
        $this->validator = new DummyValidator();
        $this->processor = new FormProcessor($this->finisher, $this->validator);
    }

    /** @test */
    public function it_calls_a_finisher_with_given_data()
    {
        $this->processor->processForm('Form1', ['name' => ['value']]);
        $expectedRequestDatum = new FinisherFieldData('name', ['value']);
        $this->assertEquals([$expectedRequestDatum], $this->finisher->formData);
    }

    /** @test */
    public function it_triggers_the_validation_of_given_data()
    {
        $this->processor->processForm('Form1', ['name' => ['value']]);
        $this->assertTrue($this->validator->validateHasBeenCalled);
    }

    /** @test */
    public function it_throws_an_validation_failed_exception_on_failed_validation()
    {
        $this->validator->willFail = true;
        $this->expectException(ValidationFailedException::class);
        $this->processor->processForm('Form1', ['name' => ['value']]);
    }

    /** @test */
    public function the_validation_errors_are_transmitted_by_the_exception_on_validation_error()
    {
        $this->validator->willFail = true;
        $this->validator->validationErrors = ['fieldName' => ['error1']];
        try {
            $this->processor->processForm('Form1', ['fieldName' => ['value']]);
        } catch (ValidationFailedException $exception) {
            $this->assertEquals(['fieldName' => ['error1']], $exception->getValidationErrors());
        }
    }
}
