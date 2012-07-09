<?php

namespace OpenDDR\Model;

class BuiltObject
{
    /**
     * @var int
     */
    protected $confidence;

    /**
     * @var array
     */
    protected $properties;

    /**
     * @param int $confidence
     * @param array $properties
     */
    public function __construct($confidence = 0, array $properties = array())
    {
        $this->confidence = (int) $confidence;
        $this->properties = $properties;
    }

    /**
     * @param int $confidence
     */
    public function setConfidence($confidence)
    {
        $this->confidence = (int) $confidence;
    }

    /**
     * @return int
     */
    public function getConfidence()
    {
        return $this->confidence;
    }

    /**
     * @param string $property
     * @return mixed
     */
    public function get($property)
    {
        if (isset($this->properties[$property])) {
            return $this->properties[$property];
        }
    }

    /**
     * @param string $name
     * @param string $value
     */
    public function putProperty($name, $value)
    {
        $this->properties[$name] = $value;
    }

    /**
     * @param array $properties
     */
    public function putProperties(array $properties)
    {
        $this->properties = $properties;
    }

    /**
     * @return array
     */
    public function getPropertiesMap()
    {
        return $this->properties;
    }
}