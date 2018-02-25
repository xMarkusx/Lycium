<?php

namespace Lycium\LyciumForm\Tests\Unit;

use Lycium\LyciumForm\DataProvider\ConfigurationDataResponse;
use Lycium\LyciumForm\Exception\InvalidFormDataException;
use Lycium\LyciumForm\FormConfiguration;
use Lycium\LyciumForm\FormField;
use Lycium\LyciumForm\Tests\Unit\DataProvider\DummyConfigurationDataProvider;
use PHPUnit\Framework\TestCase;

class FormConfigurationTest extends TestCase
{
    /** @test */
    public function it_provides_the_configured_fields()
    {
        $formConfigurationDataProvider = new DummyConfigurationDataProvider();
        $response = (new ConfigurationDataResponse())
            ->setName('Name')
            ->setType('Type')
            ->setValues(['Value']);

        $formConfigurationDataProvider->fields = [$response];
        $config = new FormConfiguration($formConfigurationDataProvider);

        $expectedFormField = new FormField('Name', 'Type');
        $expectedFormField->setValues(['Value']);
        $this->assertEquals([$expectedFormField], $config->getFields(1));
    }

    /** @test */
    public function it_throws_an_invalid_form_configuration_exception_if_one_field_is_not_correct_configured()
    {
        $formConfigurationDataProvider = new DummyConfigurationDataProvider();
        $response = (new ConfigurationDataResponse())
            ->setName('')
            ->setType('Type');

        $formConfigurationDataProvider->fields = [$response];
        $config = new FormConfiguration($formConfigurationDataProvider);
        $this->expectException(InvalidFormDataException::class);
        $config->getFields(1);
    }
}
