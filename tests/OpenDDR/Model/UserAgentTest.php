<?php

namespace OpenDDR\Model;

class UserAgentTest extends \PHPUnit_Framework_TestCase
{
    public function testCompleteUserAgent()
    {
        $userAgentString = 'test123';
        $userAgent = new UserAgent($userAgentString);
        $this->assertSame($userAgentString, $userAgent->getCompleteUserAgent());
    }

    public function testContainsAndroid()
    {
        $userAgent = new UserAgent('Android');
        $this->assertTrue($userAgent->getContainsAndroid());
        $userAgent = new UserAgent('Mozilla/5.0 (Linux; U; Android 0.5; en-us) AppleWebKit/522+ (KHTML, like Gecko) Safari/419.3');
        $this->assertTrue($userAgent->getContainsAndroid());
        $userAgent = new UserAgent('thisisjustanotheruseragent');
        $this->assertFalse($userAgent->getContainsAndroid());
    }

    public function testContainsBlackberryOrRim()
    {
        $userAgent = new UserAgent('Mozilla/5.0 (PlayBook; U; RIM Tablet OS 2.0.0; en-US) AppleWebKit/535.8+ (KHTML, like Gecko) Version/7.2.0.0 Safari/535.8+');
        $this->assertTrue($userAgent->getContainsBlackBerryOrRim());
        $userAgent = new UserAgent('BlackBerry9000/5.0.0.93 Profile/MIDP-2.0 Configuration/CLDC-1.1 VendorID/179');
        $this->assertTrue($userAgent->getContainsBlackBerryOrRim());
        $userAgent = new UserAgent('thisisjustanotheruseragent');
        $this->assertFalse($userAgent->getContainsBlackBerryOrRim());
    }

    public function testContainsIOSDevices()
    {
        $userAgent = new UserAgent('Mozilla/5.0 (iPhone; CPU iPhone OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3');
        $this->assertTrue($userAgent->getContainsIOSDevices());
        $userAgent = new UserAgent('Mozilla/5.0 (iPad; CPU OS 5_0 like Mac OS X) AppleWebKit/534.46 (KHTML, like Gecko) Version/5.1 Mobile/9A334 Safari/7534.48.3');
        $this->assertTrue($userAgent->getContainsIOSDevices());
        $userAgent = new UserAgent('thisisjustanotheruseragent');
        $this->assertFalse($userAgent->getContainsIOSDevices());
    }

    public function testContainsMSIE()
    {
        $userAgent = new UserAgent('Mozilla/5.0 (compatible; MSIE 10.6; Windows NT 6.1; Trident/5.0; InfoPath.2; SLCC1; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729; .NET CLR 2.0.50727) 3gpp-gba UNTRUSTED/1.0');
        $this->assertTrue($userAgent->getContainsMSIE());
        $userAgent = new UserAgent('Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; WOW64; Trident/6.0)');
        $this->assertTrue($userAgent->getContainsMSIE());
        $userAgent = new UserAgent('thisisjustanotheruseragent');
        $this->assertFalse($userAgent->getContainsMSIE());
    }

    public function testContainsSymbian()
    {
        $userAgent = new UserAgent('Mozilla/5.0 (SymbianOS/9.1; U; [en-us]) AppleWebKit/413 (KHTML, like Gecko) Safari/413');
        $this->assertTrue($userAgent->getContainsSymbian());
        $userAgent = new UserAgent('Nokia6600/1.0 (4.09.1) SymbianOS/7.0s Series60/2.0 Profile/MIDP-2.0 Configuration/CLDC-1.0');
        $this->assertTrue($userAgent->getContainsSymbian());
        $userAgent = new UserAgent('thisisjustanotheruseragent');
        $this->assertFalse($userAgent->getContainsSymbian());
    }

    public function testContainsWindowsPhone()
    {
        $userAgent = new UserAgent('Mozilla/4.0 (compatible; MSIE 7.0; Windows Phone OS 7.5; Trident/3.1; IEMobile/7.0;');
        $this->assertTrue($userAgent->getContainsWindowsPhone());
        $userAgent = new UserAgent('Mozilla/5.0 (Windows NT 6.2) AppleWebKit/534.51.22 (KHTML, like Gecko) Version/5.1 Safari/534.50');
        $this->assertTrue($userAgent->getContainsWindowsPhone());
        $userAgent = new UserAgent('thisisjustanotheruseragent');
        $this->assertFalse($userAgent->getContainsWindowsPhone());
    }

    public function testMozillaAndOpera()
    {
        $userAgent = new UserAgent('Opera/9.80 (Windows NT 6.1; U; es-ES) Presto/2.9.181 Version/12.00');
        $this->assertFalse($userAgent->getMozillaPattern());
        $this->assertNull($userAgent->getMozillaVersion());
        $this->assertTrue($userAgent->getOperaPattern());
        $this->assertSame('12.00', $userAgent->getOperaVersion());

        $userAgent = new UserAgent('Mozilla/4.0 (compatible; MSIE 7.0; Windows Phone OS 7.5; Trident/3.1; IEMobile/7.0;');
        $this->assertTrue($userAgent->getMozillaPattern());
        $this->assertSame('4.0', $userAgent->getMozillaVersion());
        $this->assertFalse($userAgent->getOperaPattern());
        $this->assertNull($userAgent->getOperaVersion());
    }
}