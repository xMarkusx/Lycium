<?php

namespace Lycium\LyciumForm\Tests\Unit;

use Lycium\LyciumForm\FormProcessor;
use Lycium\LyciumForm\Tests\Unit\Finisher\DummyFormFinisher;
use PHPUnit\Framework\TestCase;

class FormProcessorTest extends TestCase
{
    /** @test */
    public function it_calls_a_finisher_with_given_data()
    {
        $finisher = new DummyFormFinisher();
        $processor = new FormProcessor($finisher);
        $processor->processForm('Form1', ['name' => 'value']);
        $this->assertEquals(['name' => 'value'], $finisher->formData);
    }
}
