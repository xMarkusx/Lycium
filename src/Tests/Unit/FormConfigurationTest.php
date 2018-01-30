<?php

namespace Lycium\LyciumForm\Tests\Unit;

use Lycium\LyciumForm\FormConfiguration;
use Lycium\LyciumForm\Tests\Unit\DataProvider\DummyConfigurationDataProvider;
use PHPUnit\Framework\TestCase;

class FormConfigurationTest extends TestCase
{
    /** @test */
    public function it_provides_the_configured_fields()
    {
        $formConfigurationDataProvider = new DummyConfigurationDataProvider();
        $formConfigurationDataProvider->fields = [['name' => 'Name', 'value' => 'Value', 'type' => 'Type']];
        $config = new FormConfiguration($formConfigurationDataProvider);
        $this->assertEquals([['name' => 'Name', 'value' => 'Value', 'type' => 'Type']], $config->getFields(1));
    }
}
