<?php

namespace Tanigami\ValueObjects\Geo;

use PHPUnit\Framework\TestCase;

class LongitudeTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Longitude must be between -180 and 180: -180.00001
     */
    public function testLatitudeCannotBeSmallerThanMinus180()
    {
        new Longitude(-180.00001);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Longitude must be between -180 and 180: 180.00001
     */
    public function testLatitudeCannotBeGreaterThan180()
    {
        new Longitude(180.00001);
    }

    public function testLongitudeIsReturned()
    {
        $this->assertSame(123.456, (new Longitude(123.456))->longitude());
    }

    public function testEquals()
    {
        $this->assertTrue((new Longitude(180))->equals(new Longitude(180)));
        $this->assertTrue((new Longitude(180))->equals(new Longitude(-180)));
        $this->assertTrue((new Longitude(-180))->equals(new Longitude(180)));
        $this->assertFalse((new Longitude(90))->equals(new Longitude(-90)));
    }
}
