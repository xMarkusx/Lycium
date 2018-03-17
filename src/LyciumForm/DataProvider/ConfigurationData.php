<?php

namespace Lycium\LyciumForm\DataProvider;

final class ConfigurationData
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $values;

    /**
     * @var string
     */
    private $type;

    /**
     * ConfigurationData constructor.
     * @param string $name
     * @param string $type
     * @param array $values
     */
    public function __construct(string $name, string $type, array $values = [])
    {
        $this->name = $name;
        $this->type = $type;
        $this->values = $values;
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
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
