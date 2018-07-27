<?php

namespace Tanigami\ValueObjects\Geo;

use PHPUnit\Framework\TestCase;

class PositionTest extends TestCase
{
    public function testLatitudeAndLongitudeAreReturned()
    {
        $position = new Position(new Latitude(12.3456), new Longitude(65.4321));
        $this->assertSame(12.3456, $position->latitude()->latitude());
        $this->assertSame(65.4321, $position->longitude()->longitude());
    }

    public function testEquals()
    {
        $this->assertTrue(
            (new Position(new Latitude(12.3456), new Longitude(65.4321)))
                ->equals(new Position(new Latitude(12.3456), new Longitude(65.4321)))
        );
    }
}