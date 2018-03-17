<?php

namespace Lycium\LyciumForm\Presenter;

final class PresenterFieldData
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
    private $value;

    /**
     * PresenterFieldDataRequest constructor.
     * @param string $name
     * @param string $type
     * @param array $value
     */
    public function __construct(string $name, string $type, array $value = [])
    {
        $this->name = $name;
        $this->type = $type;
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
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return array
     */
    public function getValue(): array
    {
        return $this->value;
    }
}
