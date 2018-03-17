<?php

namespace Lycium\LyciumForm\Tests\Unit\Presenter;

use Lycium\LyciumForm\Presenter\PresenterFieldData;
use PHPUnit\Framework\TestCase;

class PresenterFieldDataTest extends TestCase
{
    /** @test */
    public function the_data_can_be_read()
    {
        $data = new PresenterFieldData('Name', 'Type', ['Value']);
        $this->assertEquals('Name', $data->getName());
        $this->assertEquals('Type', $data->getType());
        $this->assertEquals(['Value'], $data->getValue());
    }

    /** @test */
    public function the_value_field_is_an_empty_array_when_no_value_was_given_on_construction()
    {
        $data = new PresenterFieldData('Name', 'Type');
        $this->assertEquals('Name', $data->getName());
        $this->assertEquals('Type', $data->getType());
        $this->assertEquals([], $data->getValue());
    }
}
