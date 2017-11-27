<?php

namespace Tanigami\ValueObjects\Web;

use PHPUnit\Framework\TestCase;

class IpAddressV4Test extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedMessage nvalid IP address v4: this_is_not_ipv4
     */
    public function testConstructorReturnsExceptionIfUrlIsInvalid()
    {
        new IpAddressV4('this_is_not_ipv4');
    }

    public function testGetterReturnsValueString()
    {
        $this->assertSame('192.168.0.1', (new IpAddressV4('192.168.0.1'))->ipAddressV4());
    }

    public function testEquelsReturnsTrueIfUrlsAreSame()
    {
        $this->assertTrue((new IpAddressV4('192.168.0.1'))->equals(new IpAddressV4('192.168.0.1')));
        $this->assertFalse((new IpAddressV4('192.168.0.1'))->equals(new IpAddressV4('10.0.0.1')));
    }
}
