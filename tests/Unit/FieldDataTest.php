<?php

namespace Lycium\LyciumForm\Tests\Unit\Validation;

use Lycium\LyciumForm\FieldData;
use PHPUnit\Framework\TestCase;

class FieldDataTest extends TestCase
{
    /** @test */
    public function it_provides_the_data()
    {
        $data = new FieldData('Name', ['Value']);
        $this->assertEquals('Name', $data->getName());
        $this->assertEquals(['Value'], $data->getValue());
    }

    /** @test */
    public function the_value_field_is_an_empty_array_when_no_value_was_given_on_construction()
    {
        $data = new FieldData('Name');
        $this->assertEquals('Name', $data->getName());
        $this->assertEquals([], $data->getValue());
    }
}
