<?php

namespace Tanigami\ValueObjects\Time;

use PHPUnit\Framework\TestCase;

class TimeLengthTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Length cannot be negative in seconds: -1
     */
    public function testTimeLengthCannotBeNegative()
    {
        TimeLength::ofSeconds(-1);
    }

    public function testCreateTimeLengthOfSeconds()
    {
        $timeLength = TimeLength::ofSeconds(123456);
        $this->assertSame(1, $timeLength->hasDays());
        $this->assertSame(34, $timeLength->hasHours());
        $this->assertSame(2057, $timeLength->hasMinutes());
        $this->assertSame(123456, $timeLength->hasSeconds());
    }

    public function testCreateTimeLengthOfMunutes()
    {
        $timeLength = TimeLength::ofMinutes(123);
        $this->assertSame(0, $timeLength->hasDays());
        $this->assertSame(2, $timeLength->hasHours());
        $this->assertSame(123, $timeLength->hasMinutes());
        $this->assertSame(7380, $timeLength->hasSeconds());
    }

    public function testCreateTimeLengthOfHours()
    {
        $timeLength = TimeLength::ofHours(123);
        $this->assertSame(5, $timeLength->hasDays());
        $this->assertSame(123, $timeLength->hasHours());
        $this->assertSame(7380, $timeLength->hasMinutes());
        $this->assertSame(442800, $timeLength->hasSeconds());
    }

    public function testCreateTimeLengthOfDays()
    {
        $timeLength = TimeLength::ofDays(123);
        $this->assertSame(123, $timeLength->hasDays());
        $this->assertSame(2952, $timeLength->hasHours());
        $this->assertSame(177120, $timeLength->hasMinutes());
        $this->assertSame(10627200, $timeLength->hasSeconds());
    }

    public function testEqualsRetuensTrueIfLengthInSecondsAreSame()
    {
        $this->assertTrue(TimeLength::ofHours(1)->equals(TimeLength::ofMinutes(60)));
        $this->assertFalse(TimeLength::ofHours(1)->equals(TimeLength::ofMinutes(59)));
    }
}
