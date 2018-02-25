<?php

namespace Lycium\LyciumForm\Tests\Unit;

use Lycium\LyciumForm\DataProvider\ConfigurationDataResponse;
use Lycium\LyciumForm\Form;
use Lycium\LyciumForm\Tests\Unit\DataProvider\DummyConfigurationDataProvider;
use Lycium\LyciumForm\Tests\Unit\Presenter\DummyFormPresenter;
use PHPUnit\Framework\TestCase;

class FormTest extends TestCase
{
    /** @test */
    public function the_configured_form_should_be_displayed()
    {
        $formPresenter = new DummyFormPresenter();
        $formConfiguration = new DummyConfigurationDataProvider();
        $response = (new ConfigurationDataResponse())
            ->setName('Name')
            ->setType('Type');
        $formConfiguration->fields = [$response];
        $form = new Form($formPresenter, $formConfiguration);
        $form->display('form1');
        $this->assertTrue($formPresenter->presentHasBeenCalled);
        $this->assertEquals([['name' => 'Name', 'type' => 'Type']], $formPresenter->fields);
    }
}
