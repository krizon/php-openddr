<?php

namespace OpenDDR\Model;

class BuiltObjectTest  extends \PHPUnit_Framework_TestCase
{
    public function testGetters()
    {
        $buildObject = new BuiltObject();
        $this->assertSame($buildObject->getConfidence(), 0);
        $this->assertSame($buildObject->getPropertiesMap(), array());
    }

    public function testConfidence()
    {
        $buildObject = new BuiltObject(2, array());
        $this->assertSame($buildObject->getConfidence(), 2);
        $buildObject->setConfidence(345);
        $this->assertSame($buildObject->getConfidence(), 345);
        $buildObject->setConfidence('8');
        $this->assertSame($buildObject->getConfidence(), 8);
    }

    public function testProperties()
    {
        $buildObject = new BuiltObject(0, array(
            'foo' => 'bar',
            'baz' => 'foo'
        ));
        $this->assertSame($buildObject->get('foo'), 'bar');
        $this->assertSame($buildObject->get('foobar'), null);
        $buildObject->putProperty('foobar', 'foo');
        $this->assertSame($buildObject->get('foobar'), 'foo');
        $buildObject->putProperties(array(
            'bar'   => 'baz'
        ));
        $this->assertSame($buildObject->get('foo'), null);
        $this->assertSame($buildObject->get('bar'), 'baz');
    }
}