<?php

namespace Tanigami\ValueObjects\Time;

use DateTime;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class DateTest extends TestCase
{
    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Month must be between 1 and 12: 0
     */
    public function testMonthCannotBeSmallerThan1()
    {
        new Date(2018, 0, 1);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Month must be between 1 and 12: 13
     */
    public function testMonthCannotBeGreaterThan12()
    {
        new Date(2018, 13, 1);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Day must be between 1 and 31: 0
     */
    public function testDayCannotBeSmallerThan1()
    {
        new Date(2018, 1, 0);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Day must be between 1 and 31: 32
     */
    public function testMonthCannotBeGreaterThan31()
    {
        new Date(2018, 1, 32);
    }

    public function testValidDate()
    {
        $date = new Date(2018, 1, 1);
        $this->assertSame(2018, $date->year());
        $this->assertSame(1, $date->month());
        $this->assertSame(1, $date->day());
        $this->assertTrue($date->equals(new Date(2018, 1, 1)));
        $dateTime = $date->dateTime();
        $dateTimeImmutable = $date->dateTime(true);
        $this->assertEquals(new DateTime('2018-01-01 00:00:00'), $dateTime);
        $this->assertInstanceOf(DateTime::class, $dateTime);
        $this->assertEquals(new DateTime('2018-01-01 00:00:00'), $dateTimeImmutable);
        $this->assertInstanceOf(DateTimeImmutable::class, $dateTimeImmutable);
    }

    public function testToday()
    {
        $today = DateFixedNow::today();
        $this->assertTrue($today->equals(new Date(2018, 1, 1)));
    }
}

class DateFixedNow extends Date
{
    protected static function now(): DateTime
    {
        return new DateTime('2018-01-01 12:34:56');
    }
}
