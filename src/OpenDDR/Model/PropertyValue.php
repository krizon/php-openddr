<?php

namespace OpenDDR\Model;

use W3C\DDR\Simple\PropertyRefInterface;
use W3C\DDR\Simple\PropertyValueInterface;

class PropertyValue implements PropertyValueInterface
{
    private $propertyRef;

    private $value;

    public function __construct(PropertyRefInterface $propertyRef, $value)
    {
        $this->propertyRef = $propertyRef;
        $this->value = $value;
    }

    public function getDouble()
    {
        // TODO: Implement getDouble() method.
    }

    public function getLong()
    {
        // TODO: Implement getLong() method.
    }

    public function getBoolean()
    {
        // TODO: Implement getBoolean() method.
    }

    public function getInteger()
    {
        // TODO: Implement getInteger() method.
    }

    public function getEnumeration()
    {
        // TODO: Implement getEnumeration() method.
    }

    public function getFloat()
    {
        // TODO: Implement getFloat() method.
    }

    public function getPropertyRef()
    {
        return $this->propertyRef;
    }

    public function getString()
    {
        // TODO: Implement getString() method.
    }

    public function exists()
    {
        if (null !== $this->value && strlen($this->value) > 0 && '-' !== $this->value) {
            return true;
        }

        return false;
    }
}