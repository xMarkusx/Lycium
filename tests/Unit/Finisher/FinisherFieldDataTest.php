<?php

namespace Lycium\LyciumForm\Tests\Unit\Finisher;

use Lycium\LyciumForm\Finisher\FinisherFieldData;
use PHPUnit\Framework\TestCase;

class FinisherFieldDataTest extends TestCase
{
    /** @test */
    public function it_provides_the_data()
    {
        $data = new FinisherFieldData('Name', ['Value']);
        $this->assertEquals('Name', $data->getName());
        $this->assertEquals(['Value'], $data->getValue());
    }
}
