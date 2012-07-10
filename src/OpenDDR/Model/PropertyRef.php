<?php

namespace OpenDDR\Model;

use W3C\DDR\Simple\PropertyNameInterface;
use W3C\DDR\Simple\PropertyRefInterface;

class PropertyRef implements PropertyRefInterface
{
    /**
     * @var \W3C\DDR\Simple\PropertyNameInterface
     */
    private $pn;

    /**
     * @var string
     */
    private $aspectName;

    public function __construct(PropertyNameInterface $pn, $aspectName)
    {
        $this->pn           = $pn;
        $this->aspectName   = $aspectName;
    }

    /**
     * @return string
     */
    public function getLocalPropertyName()
    {
        return $this->pn->getLocalPropertyName();
    }

    /**
     * @return string
     */
    public function getAspectName()
    {
        return $this->aspectName;
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return $this->pn->getNamespace();
    }

    /**
     * @param mixed $obj
     * @return bool
     */
    public function equals($obj)
    {
        if (! $obj instanceof PropertyRefInterface) {
            return false;
        }

        return $obj->getAspectName() === $this->aspectName && $obj->getLocalPropertyName() === $this->getLocalPropertyName()
            && $obj->getNamespace() === $this->getNamespace();
    }
}