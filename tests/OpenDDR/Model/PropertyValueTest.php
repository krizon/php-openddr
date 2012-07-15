<?php

namespace OpenDDR\Model;

class PropertyValueTest extends \PHPUnit_Framework_TestCase
{

    public function testGetPropertyRef()
    {
        $propName = new PropertyName('foo', 'bazz');
        $propRef = new PropertyRef($propName, 'bar');
        $propValue =  new PropertyValue($propRef, 'lorem');
        $this->assertSame($propRef, $propValue->getPropertyRef());
    }

    public function testExists()
    {
        $this->assertFalse($this->buildPropertyValue(null));
        $this->assertFalse($this->buildPropertyValue(''));
        $this->assertFalse($this->buildPropertyValue('-'));
        $this->assertTrue($this->buildPropertyValue('a'));
        $this->assertTrue($this->buildPropertyValue('abc'));
        $this->assertTrue($this->buildPropertyValue(1));
        $this->assertTrue($this->buildPropertyValue(-1));
        $this->assertTrue($this->buildPropertyValue(array(1)));
        $this->assertTrue($this->buildPropertyValue(array(1, 2)));
    }

    protected function buildPropertyValue($value)
    {
        $propName = new PropertyName('foo', 'bazz');
        $propRef = new PropertyRef($propName, 'bar');

        return new PropertyValue($propRef, $value);
    }
}