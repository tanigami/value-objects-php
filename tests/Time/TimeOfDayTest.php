<?php

namespace Tanigami\ValueObjects\Time;

use PHPUnit\Framework\TestCase;

class TimeOfDayTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Hours must be between 0 and 23: -1
     */
    public function testHoursCannotBeSmallerThan0()
    {
        new TimeOfDay(-1, 0, 0);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Hours must be between 0 and 23: 24
     */
    public function testHoursCannotBeGreaterThan23()
    {
        new TimeOfDay(24, 0, 0);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Minutes must be between 0 and 59: -1
     */
    public function testMinutesCannotBeSmallerThan0()
    {
        new TimeOfDay(0, -1, 0);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Minutes must be between 0 and 59: 60
     */
    public function testMinutesCannotBeGreaterThan59()
    {
        new TimeOfDay(0, 60, 0);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Seconds must be between 0 and 59: -1
     */
    public function testSecondsCannotBeSmallerThan0()
    {
        new TimeOfDay(0, 0, -1);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Seconds must be between 0 and 59: 60
     */
    public function testSecondsCannotBeGreaterThan59()
    {
        new TimeOfDay(0, 0, 60);
    }

    public function testValidTimeOfDay()
    {
        $timeOfDay = new TimeOfDay(12, 34, 56);
        $this->assertSame(12, $timeOfDay->hours());
        $this->assertSame(34, $timeOfDay->minutes());
        $this->assertSame(56, $timeOfDay->seconds());
        $this->assertTrue($timeOfDay->equals(new TimeOfDay(12, 34, 56)));
    }
}
