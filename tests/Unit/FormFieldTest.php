<?php

namespace Lycium\LyciumForm\Tests\Unit;

use Lycium\LyciumForm\Exception\InvalidFormFieldException;
use Lycium\LyciumForm\FormField;
use PHPUnit\Framework\TestCase;

class FormFieldTest extends TestCase
{
    /** @test */
    public function it_provides_the_name()
    {
        $formField = new FormField('Name', 'Type');
        $this->assertEquals('Name', $formField->getName());
    }

    /** @test */
    public function it_provides_the_type()
    {
        $formField = new FormField('Name', 'Type');
        $this->assertEquals('Type', $formField->getType());
    }

    /** @test */
    public function it_provides_the_values()
    {
        $formField = new FormField('Name', 'Type');
        $formField->setValues(['Value']);
        $this->assertEquals(['Value'], $formField->getValues());
    }

    /** @test */
    public function it_throws_an_invalid_form_field_exception_when_no_name_was_given()
    {
        $this->expectException(InvalidFormFieldException::class);
        new FormField(' ', 'Type');
    }

    /** @test */
    public function it_throws_an_invalid_form_field_exception_when_no_type_was_given()
    {
        $this->expectException(InvalidFormFieldException::class);
        new FormField('Name', ' ');
    }
}
