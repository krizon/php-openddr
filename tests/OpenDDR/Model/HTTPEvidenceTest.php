<?php

namespace OpenDDR\Model;

class HTTPEvidenceTest  extends \PHPUnit_Framework_TestCase
{
    public function testHeaders()
    {
        $evidence = new HTTPEvidence();
        $this->assertInstanceOf('W3C\\DDR\\Simple\\EvidenceInterface', $evidence);
        $this->assertFalse($evidence->exists('foo'));
        $evidence->put('foo', 'bar');
        $this->assertSame($evidence->get('foo'), 'bar');
        $this->assertTrue($evidence->exists('foo'));
    }
}