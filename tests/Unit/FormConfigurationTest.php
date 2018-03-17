<?php

namespace Lycium\LyciumForm\Tests\Unit;

use Lycium\LyciumForm\DataProvider\FieldConfiguration;
use Lycium\LyciumForm\Exception\InvalidFormDataException;
use Lycium\LyciumForm\FormConfiguration;
use Lycium\LyciumForm\FormField;
use Lycium\LyciumForm\Tests\Unit\DataProvider\DummyConfigurationDataProvider;
use PHPUnit\Framework\TestCase;

class FormConfigurationTest extends TestCase
{
    /**
     * @var DummyConfigurationDataProvider
     */
    private $formConfigurationDataProvider;

    /**
     * @var FormConfiguration
     */
    private $config;

    public function setUp()
    {
        parent::setUp();
        $this->formConfigurationDataProvider = new DummyConfigurationDataProvider();
        $this->config = new FormConfiguration($this->formConfigurationDataProvider);
    }

    /** @test */
    public function it_provides_the_configured_fields()
    {
        $response = new FieldConfiguration('Name', 'Type', ['Value']);
        $this->formConfigurationDataProvider->fields = [$response];

        $expectedFormField = new FormField('Name', 'Type');
        $expectedFormField->setValues(['Value']);
        $this->assertEquals([$expectedFormField], $this->config->getFields('Form1'));
    }

    /** @test */
    public function it_throws_an_invalid_form_configuration_exception_if_one_field_is_not_correct_configured()
    {
        $response = new FieldConfiguration('', 'Type');

        $this->formConfigurationDataProvider->fields = [$response];
        $this->expectException(InvalidFormDataException::class);
        $this->config->getFields('Form1');
    }
}
