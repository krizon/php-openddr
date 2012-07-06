<?php

namespace OpenDDR\Model;

use W3C\DDR\Simple\PropertyNameInterface;

class PropertyName implements PropertyNameInterface
{
    /**
     * @var string
     */
    private $localPropertyName;

    /**
     * @var string
     */
    private $namespace;

    /**
     * @param string $localPropertyName
     * @param string $namespace
     */
    public function __construct($localPropertyName, $namespace)
    {
        $this->localPropertyName = $localPropertyName;
        $this->namespace = $namespace;
    }

    /**
     * @return string
     */
    public function getLocalPropertyName()
    {
        return $this->localPropertyName;
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return $this->namespace;
    }
}