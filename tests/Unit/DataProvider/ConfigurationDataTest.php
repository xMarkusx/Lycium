<?php

namespace Lycium\LyciumForm\Tests\Unit\DataProvider;

use Lycium\LyciumForm\DataProvider\ConfigurationData;
use PHPUnit\Framework\TestCase;

class ConfigurationDataTest extends TestCase
{
    /** @test */
    public function the_data_can_be_read()
    {
        $data = new ConfigurationData('Name', 'Type', ['Value']);
        $this->assertEquals('Name', $data->getName());
        $this->assertEquals('Type', $data->getType());
        $this->assertEquals(['Value'], $data->getValues());
    }

    /** @test */
    public function the_value_field_is_an_empty_array_when_no_value_was_given_on_construction()
    {
        $data = new ConfigurationData('Name', 'Type');
        $this->assertEquals('Name', $data->getName());
        $this->assertEquals('Type', $data->getType());
        $this->assertEquals([], $data->getValues());
    }
}
