<?php

namespace Tanigami\ValueObjects\Time;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use InvalidArgumentException;

class Date
{
    /**
     * @var int
     */
    private $year;

    /**
     * @var int
     */
    private $month;

    /**
     * @var int
     */
    private $day;

    /**
     * @param int $year
     * @param int $month
     * @param int $day
     */
    public function __construct(int $year, int $month, int $day)
    {
        if (!(1 <= $month && $month <= 12)) {
            throw new InvalidArgumentException(sprintf('Month must be between 1 and 12: %s', $month));
        }
        if (!(1 <= $day && $day <= 31)) {
            throw new InvalidArgumentException(sprintf('Day must be between 1 and 31: %s', $day));
        }

        $this->year = $year;
        $this->month = $month;
        $this->day = $day;
    }

    /**
     * @return int
     */
    public function year(): int
    {
        return $this->year;
    }

    /**
     * @return int
     */
    public function month(): int
    {
        return $this->month;
    }

    /**
     * @return int
     */
    public function day(): int
    {
        return $this->day;
    }

    /**
     * @param self $other
     * @return bool
     */
    public function equals(self $other): bool
    {
        return
            $this->year === $other->year &&
            $this->month == $other->month &&
            $this->day === $other->day;
    }

    /**
     * @param bool $immutable
     * @return DateTime
     */
    public function dateTime(bool $immutable = false): DateTimeInterface
    {
        $dateTime = new DateTime;
        $dateTime->setDate($this->year(), $this->month(), $this->day());
        $dateTime->setTime(0, 0, 0);
        if ($immutable) {
            $dateTime = DateTimeImmutable::createFromMutable($dateTime);
        }

        return $dateTime;
    }

    public function isAm(): bool
    {
        
    }

    /**
     * @return self
     */
    public static function today(): self
    {
        $now = static::now();

        return new static(
            intval($now->format('Y')),
            intval($now->format('n')),
            intval($now->format('j'))
        );
    }

    /**
     * @return DateTime
     */
    protected static function now(): DateTime
    {
        return new DateTime('now');
    }
}
