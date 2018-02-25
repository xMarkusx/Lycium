<?php

namespace Lycium\LyciumForm;

use Lycium\LyciumForm\Exception\InvalidFormFieldException;

class FormField
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @var array
     */
    private $values = [];

    /**
     * FormField constructor.
     * @param string $name
     * @param string $type
     * @throws InvalidFormFieldException
     */
    public function __construct(string $name, string $type)
    {
        $this->name = $name;
        $this->type = $type;
        $this->validate();
    }

    /**
     * @throws InvalidFormFieldException
     */
    private function validate(): void
    {
        if (empty(\trim($this->name))) {
            throw new InvalidFormFieldException('No name given.');
        }
        if (empty(\trim($this->type))) {
            throw new InvalidFormFieldException('No type given.');
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return array
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param array $values
     */
    public function setValues(array $values): void
    {
        $this->values = $values;
    }
}
