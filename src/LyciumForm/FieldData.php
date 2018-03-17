<?php

namespace Lycium\LyciumForm;

final class FieldData
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $value;

    public function __construct(string $name, array $value = [])
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getValue(): array
    {
        return $this->value;
    }
}
