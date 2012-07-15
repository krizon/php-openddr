<?php

namespace OpenDDR\Model;

class PropertyValuesTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $propName = new PropertyName('foo', 'bazz');
        $propRef = new PropertyRef($propName, 'bar');
        $propValue =  new PropertyValue($propRef, 'lorem');

        $propertyValues = new PropertyValues();
        $this->assertSame(array(), $propertyValues->getAll());
        $propertyValues->add($propValue);
        $this->assertSame(array(spl_object_hash($propRef) => $propValue), $propertyValues->getAll());
        $propertyValues->add($propValue);
        $this->assertSame(1, count($propertyValues->getAll()));

        $propName2 = new PropertyName('bar', 'foo');
        $propRef2 = new PropertyRef($propName2, 'baz');
        $propValue2 =  new PropertyValue($propRef2, 'foorbar');
        $propertyValues->add($propValue2);
        $this->assertSame(2, count($propertyValues->getAll()));
    }

    public function testGetValue()
    {
        $propName = new PropertyName('foo', 'bazz');
        $propRef = new PropertyRef($propName, 'bar');
        $propValue =  new PropertyValue($propRef, 'lorem');

        $propertyValues = new PropertyValues();
        $propertyValues->add($propValue);

        $this->assertSame($propValue, $propertyValues->getValue($propRef));

        // @todo test for NameException when non excisting propRef is called
    }
}