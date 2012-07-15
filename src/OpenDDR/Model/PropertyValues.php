<?php

namespace OpenDDR\Model;

use W3C\DDR\Simple\PropertyRefInterface;
use W3C\DDR\Simple\PropertyValueInterface;
use W3C\DDR\Simple\PropertyValuesInterface;

class PropertyValues implements PropertyValuesInterface
{
    private $propertyValues = array();

    public function add(PropertyValueInterface $propertyValue)
    {
        $this->propertyValues[spl_object_hash($propertyValue->getPropertyRef())] = $propertyValue;
    }

    /**
     * @return PropertyValueInterface[]
     */
    public function getAll()
    {
        return $this->propertyValues;
    }

    /**
     * @param PropertyRefInterface $prop
     * @return PropertyValueInterface
     */
    public function getValue(PropertyRefInterface $prop)
    {
        $propHash = spl_object_hash($prop);
        if (!array_key_exists($propHash, $this->propertyValues)) {
            // @todo throw name exception
        }

        return $this->propertyValues[$propHash];
    }

}