<?php

namespace Lycium\LyciumForm\Tests\Unit;

use Lycium\LyciumForm\Form;
use Lycium\LyciumForm\Tests\Unit\Presenter\DummyFormPresenter;
use PHPUnit\Framework\TestCase;

class FormTest extends TestCase
{
    /** @test */
    public function the_form_should_be_displayed()
    {
        $formPresenter = new DummyFormPresenter();
        $form = new Form($formPresenter);
        $form->display();
        $this->assertTrue($formPresenter->presentHasBeenCalled);
    }
}
