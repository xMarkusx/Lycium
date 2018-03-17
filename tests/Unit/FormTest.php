<?php

namespace Lycium\LyciumForm\Tests\Unit;

use Lycium\LyciumForm\DataProvider\ConfigurationData;
use Lycium\LyciumForm\Form;
use Lycium\LyciumForm\Tests\Unit\DataProvider\DummyConfigurationDataProvider;
use Lycium\LyciumForm\Tests\Unit\Presenter\DummyFormPresenter;
use PHPUnit\Framework\TestCase;

class FormTest extends TestCase
{
    /**
     * @var DummyFormPresenter
     */
    private $formPresenter;

    /**
     * @var DummyConfigurationDataProvider
     */
    private $formConfiguration;

    /**
     * @var Form
     */
    private $form;

    public function setUp()
    {
        parent::setUp();
        $this->formPresenter = new DummyFormPresenter();
        $this->formConfiguration = new DummyConfigurationDataProvider();
        $response = new ConfigurationData('Name', 'Type', ['Value']);
        $this->formConfiguration->fields = [$response];
        $this->form = new Form($this->formPresenter, $this->formConfiguration);
    }

    /** @test */
    public function the_configured_form_can_be_displayed()
    {
        $this->form->display('form1');
        $this->assertTrue($this->formPresenter->presentHasBeenCalled);
        $this->assertEquals([['name' => 'Name', 'type' => 'Type', 'values' => ['Value']]], $this->formPresenter->fields);
    }

    /** @test */
    public function the_configured_form_can_be_repopulated_after_failed_validation()
    {
        $this->form->repopulate('form1', ['Name' => ['Submitted Value']], ['Name' => ['error']]);
        $this->assertTrue($this->formPresenter->presentAfterFailedValidationHasBeenCalled);
        $this->assertEquals([['name' => 'Name', 'type' => 'Type', 'values' => ['Submitted Value']]], $this->formPresenter->fields);
        $this->assertEquals(['Name' => ['error']], $this->formPresenter->validationErrors);
    }
}
