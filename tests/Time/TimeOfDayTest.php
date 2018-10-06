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

    public function testIsBefore()
    {
        $one = new TimeOfDay(12, 34, 56);
        $two = new TimeOfDay(13, 34, 56);
        $three = new TimeOfDay(12, 35, 56);
        $four = new TimeOfDay(12, 35, 57);
        $this->assertTrue($one->isBefore($two));
        $this->assertTrue($one->isBefore($three));
        $this->assertTrue($one->isBefore($four));
        $this->assertFalse($one->isBefore($one));
    }

    public function testIsBeforeOrEquals()
    {
        $one = new TimeOfDay(12, 34, 56);
        $two = new TimeOfDay(13, 34, 56);
        $three = new TimeOfDay(12, 35, 56);
        $four = new TimeOfDay(12, 35, 57);
        $this->assertTrue($one->isBeforeOrEquals($two));
        $this->assertTrue($one->isBeforeOrEquals($three));
        $this->assertTrue($one->isBeforeOrEquals($four));
        $this->assertTrue($one->isBeforeOrEquals($one));
    }

    public function testIsAfter()
    {
        $one = new TimeOfDay(12, 34, 56);
        $two = new TimeOfDay(13, 34, 56);
        $three = new TimeOfDay(12, 35, 56);
        $four = new TimeOfDay(12, 35, 57);
        $this->assertFalse($one->isAfter($two));
        $this->assertFalse($one->isAfter($three));
        $this->assertFalse($one->isAfter($four));
        $this->assertFalse($one->isAfter($one));
    }

    public function testIsAfterOrEquals()
    {
        $one = new TimeOfDay(12, 34, 56);
        $two = new TimeOfDay(13, 34, 56);
        $three = new TimeOfDay(12, 35, 56);
        $four = new TimeOfDay(12, 35, 57);
        $this->assertFalse($one->isAfterOrEquals($two));
        $this->assertFalse($one->isAfterOrEquals($three));
        $this->assertFalse($one->isAfterOrEquals($four));
        $this->assertTrue($one->isAfterOrEquals($one));
    }
}
