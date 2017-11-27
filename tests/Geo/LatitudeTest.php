<?php

namespace Tanigami\ValueObjects\Geo;

use PHPUnit\Framework\TestCase;

class LatitudeTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Latitude must be between -90 and 90: -90.00001
     */
    public function testLatitudeCannotBeSmallerThanMinus90()
    {
        new Latitude(-90.00001);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Latitude must be between -90 and 90: 90.00001
     */
    public function testLatitudeCannotBeGreaterThan90()
    {
        new Latitude(90.00001);
    }

    public function testLatitudeIsReturned()
    {
        $this->assertSame(12.3456, (new Latitude(12.3456))->latitude());
    }

    public function testEquals()
    {
        $this->assertTrue((new Latitude(90))->equals(new Latitude(90)));
        $this->assertFalse((new Latitude(90))->equals(new Latitude(-90)));
    }
}
