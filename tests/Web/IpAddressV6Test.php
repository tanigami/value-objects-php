<?php

namespace Tanigami\ValueObjects\Web;

use PHPUnit\Framework\TestCase;

class IpAddressV6Test extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedMessage Invalid IP address v6: this_is_not_ipv6
     */
    public function testConstructorReturnsExceptionIfIpV6IsInvalid()
    {
        new IpAddressV6('this_is_not_ipv6');
    }

    public function testGetterReturnsValueString()
    {
        $this->assertSame('2001:0db8:85a3:0000:0000:8a2e:0370:7334', (new IpAddressV6('2001:0db8:85a3:0000:0000:8a2e:0370:7334'))->ipAddressV6());
    }

    public function testEqualsReturnsTrueIfIpv6sAreSame()
    {
        $this->assertTrue((new IpAddressV6('2001:0db8:85a3:0000:0000:8a2e:0370:7334'))->equals(new IpAddressV6('2001:0db8:85a3:0000:0000:8a2e:0370:7334')));
        $this->assertFalse((new IpAddressV6('2001:0db8:85a3:0000:0000:8a2e:0370:7334'))->equals(new IpAddressV6('0:0:0:0:0:0:0:1')));
    }
}
