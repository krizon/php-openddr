<?php

namespace OpenDDR\Model;

class PropertyRefTest extends \PHPUnit_Framework_TestCase
{
    public function testPropertyRef()
    {
        $pn = $this->getMock('OpenDDR\\Model\\PropertyName', null, array(
            'bar', 'baz'
        ));

        $propertyRef = new PropertyRef($pn, 'foo');
        $this->assertSame($propertyRef->getNamespace(), 'baz');
        $this->assertSame($propertyRef->getLocalPropertyName(), 'bar');
        $this->assertSame($propertyRef->getAspectName(), 'foo');
    }
}