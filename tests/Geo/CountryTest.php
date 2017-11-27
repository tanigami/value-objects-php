<?php

namespace Tanigami\ValueObjects\Geo;

use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase
{
    public function testValidIsoCodeWorksAsFactoryMethod()
    {
        $country = Country::us();
        $this->assertSame('US', $country->isoCode());
        $this->assertSame('United States', $country->name());
    }

    public function testEqualsReturnsTrueIfIsoCodesAreSame()
    {
        $this->assertTrue(Country::us()->equals(Country::us()));
        $this->assertFalse(Country::us()->equals(Country::jp()));
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid country code: XX
     */
    public function testInvalidIsoCodeDoesNotWorkAsFactoryMethod()
    {
        Country::xx();
    }
}