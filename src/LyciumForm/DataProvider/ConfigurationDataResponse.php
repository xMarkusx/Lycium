<?php

namespace Lycium\LyciumForm\DataProvider;

class ConfigurationDataResponse
{
    /**
     * @var string
     */
    private $name = '';

    /**
     * @var array
     */
    private $values = [];

    /**
     * @var string
     */
    private $type = '';

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ConfigurationDataResponse
     */
    public function setName(string $name): ConfigurationDataResponse
    {
        $this->name = $name;
        return $this;
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
     * @return ConfigurationDataResponse
     */
    public function setValues(array $values): ConfigurationDataResponse
    {
        $this->values = $values;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return ConfigurationDataResponse
     */
    public function setType(string $type): ConfigurationDataResponse
    {
        $this->type = $type;
        return $this;
    }
}
