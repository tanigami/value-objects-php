<?php

namespace Tanigami\ValueObjects\Time;

use PHPUnit\Framework\TestCase;

class TimeRangeOfDayTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Start must be earlier than or same as end
     */
    public function testStartMustBeEarlierThanOrSameAsEnd()
    {
        new TimeRangeOfDay(
            new TimeOfDay(0, 0, 1),
            new TimeOfDay(0, 0, 0)
        );
    }

    public function testStartAndEndAreReturned()
    {
        $start = new TimeOfDay(0, 0, 0);
        $end =  new TimeOfDay(0, 1, 0);
        $timeRangeOfDay = new TimeRangeOfDay($start, $end);
        $this->assertTrue($timeRangeOfDay->start()->equals($start));
        $this->assertTrue($timeRangeOfDay->end()->equals($end));
    }

    public function testLengthIsReturned()
    {
        $timeRangeOfDay = new TimeRangeOfDay(
            new TimeOfDay(0, 0, 0),
            new TimeOfDay(1, 2, 3)
        );
        $this->assertSame(60 * 60 * 1 + 60 * 2 + 3, $timeRangeOfDay->length()->hasSeconds());
    }

    public function testEqualsReturnsTrueIfStartAndEndAreEqual()
    {
        $timeRangeOfDay1 = new TimeRangeOfDay(
            new TimeOfDay(0, 0, 0),
            new TimeOfDay(0, 0, 0)
        );
        $timeRangeOfDay2 = new TimeRangeOfDay(
            new TimeOfDay(0, 0, 0),
            new TimeOfDay(0, 0, 0)
        );
        $timeRangeOfDay3 = new TimeRangeOfDay(
            new TimeOfDay(0, 0, 0),
            new TimeOfDay(0, 0, 1)
        );
        $this->assertTrue($timeRangeOfDay1->equals($timeRangeOfDay2));
        $this->assertFalse($timeRangeOfDay1->equals($timeRangeOfDay3));
    }

    public function testIncludes()
    {
        $timeRangeOfDay0030 = new TimeRangeOfDay(
            new TimeOfDay(0, 0, 0),
            new TimeOfDay(0, 0, 30)
        );
        $timeRangeOfDay1020 = new TimeRangeOfDay(
            new TimeOfDay(0, 0, 10),
            new TimeOfDay(0, 0, 20)
        );
        $timeRangeOfDay2040 = new TimeRangeOfDay(
            new TimeOfDay(0, 0, 20),
            new TimeOfDay(0, 0, 40)
        );
        $this->assertTrue($timeRangeOfDay0030->includes($timeRangeOfDay1020));
        $this->assertFalse($timeRangeOfDay0030->includes($timeRangeOfDay2040));
        $this->assertFalse($timeRangeOfDay2040->includes($timeRangeOfDay0030));
        $this->assertFalse($timeRangeOfDay1020->includes($timeRangeOfDay0030));
        $this->assertFalse($timeRangeOfDay0030->includes($timeRangeOfDay0030));
    }

    public function testIncludesOrEquals()
    {
        $timeRangeOfDay0030 = new TimeRangeOfDay(
            new TimeOfDay(0, 0, 0),
            new TimeOfDay(0, 0, 30)
        );
        $timeRangeOfDay1020 = new TimeRangeOfDay(
            new TimeOfDay(0, 0, 10),
            new TimeOfDay(0, 0, 20)
        );
        $timeRangeOfDay2040 = new TimeRangeOfDay(
            new TimeOfDay(0, 0, 20),
            new TimeOfDay(0, 0, 40)
        );
        $this->assertTrue($timeRangeOfDay0030->includesOrEquals($timeRangeOfDay1020));
        $this->assertFalse($timeRangeOfDay0030->includesOrEquals($timeRangeOfDay2040));
        $this->assertFalse($timeRangeOfDay2040->includesOrEquals($timeRangeOfDay0030));
        $this->assertFalse($timeRangeOfDay1020->includesOrEquals($timeRangeOfDay0030));
        $this->assertTrue($timeRangeOfDay0030->includesOrEquals($timeRangeOfDay0030));
    }
}
