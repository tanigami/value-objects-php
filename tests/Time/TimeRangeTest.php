<?php

namespace Tanigami\ValueObjects\Time;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class TimeRangeTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Start must be earlier than or same as end
     */
    public function testStartMustBeEarlierThanOrSameAsEnd()
    {
        new TimeRange(
            new DateTimeImmutable('2000-01-01 00:00:01'),
            new DateTimeImmutable('2000-01-01 00:00:00')
        );
    }

    public function testStartAndEndAreReturned()
    {
        $start = new DateTimeImmutable('2000-01-01 00:00:00');
        $end =  new DateTimeImmutable('2001-01-01 00:00:00');
        $timeRange = new TimeRange($start, $end);
        $this->assertEquals($start, $timeRange->start());
        $this->assertEquals($end, $timeRange->end());
    }

    public function testLengthIsReturned()
    {
        $timeRange = new TimeRange(
            new DateTimeImmutable('2000-01-01 00:00:00'),
            new DateTimeImmutable('2001-01-01 00:00:00')
        );
        $this->assertSame(60 * 60 * 24 * 366, $timeRange->length()->hasSeconds());
    }

    public function testEqualsReturnsTrueIfStartAndEndAreEqual()
    {
        $timeRange1 = new TimeRange(
            new DateTimeImmutable('2000-01-01 00:00:00'),
            new DateTimeImmutable('2001-01-01 00:00:00')
        );
        $timeRange2 = new TimeRange(
            new DateTimeImmutable('2000-01-01 00:00:00'),
            new DateTimeImmutable('2001-01-01 00:00:00')
        );
        $timeRange3 = new TimeRange(
            new DateTimeImmutable('2000-01-01 00:00:00'),
            new DateTimeImmutable('2001-01-01 00:00:01')
        );
        $this->assertTrue($timeRange1->equals($timeRange2));
        $this->assertFalse($timeRange1->equals($timeRange3));
    }
}
