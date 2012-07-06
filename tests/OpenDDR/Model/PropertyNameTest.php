<?php

namespace OpenDDR\Model;

class PropertyNameTest extends \PHPUnit_Framework_TestCase
{
    public function testGetters()
    {
        $localPropertyName = 'localPropertyName';
        $namespace = 'namespace';
        $propertyName = new PropertyName($localPropertyName, $namespace);
        $this->assertSame($localPropertyName, $propertyName->getLocalPropertyName());
        $this->assertSame($namespace, $propertyName->getNamespace());
    }
}