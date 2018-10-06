<?php

namespace Tanigami\ValueObjects\Time;

use InvalidArgumentException;

class TimeRangeOfDay
{
    /**
     * @var TimeOfDay
     */
    private $start;

    /**
     * @var TimeOfDay
     */
    private $end;

    /**
     * @param TimeOfDay $start
     * @param TimeOfDay $end
     */
    public function __construct(TimeOfDay $start, TimeOfDay $end)
    {
        if (!($start->isBeforeOrEquals($end))) {
            throw new InvalidArgumentException('Start must be earlier than or same as end');
        }

        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @return TimeOfDay
     */
    public function start(): TimeOfDay
    {
        return $this->start;
    }

    /**
     * @return TimeOfDay
     */
    public function end(): TimeOfDay
    {
        return $this->end;
    }

    /**
     * @return TimeLength
     */
    public function length(): TimeLength
    {
        return TimeLength::ofSeconds(
            ($this->end()->hours() - $this->start()->hours()) * 60 * 60
            + ($this->end()->minutes() - $this->start()->minutes()) * 60
            + ($this->end()->seconds() - $this->start()->seconds())
        );
    }

    /**
     * @param self $other
     * @return bool
     */
    public function equals(self $other): bool
    {
        return $this->start()->equals($other->start()) && $this->end()->equals($other->end());
    }

    /**
     * @param self $other
     * @return bool
     */
    public function includes(self $other): bool
    {
        return $this->includesOrEquals($other) && !$this->equals($other);
    }

    /**
     * @param self $other
     * @return bool
     */
    public function includesOrEquals(self $other): bool
    {
        return $this->start()->isBeforeOrEquals($other->start()) && $this->end()->isAfterOrEquals($other->end());
    }

    /**
     * @return TimeRangeOfDay
     */
    public static function am(): self
    {
        return new self(new TimeOfDay(0), new TimeOfDay(12));
    }

    /**
     * @return TimeRangeOfDay
     */
    public static function pm(): self
    {
        return new self(new TimeOfDay(12), new TimeOfDay(23, 59, 0));
    }

    /**
     * @return TimeRangeOfDay
     */
    public static function allDay(): self
    {
        return new self(new TimeOfDay(0), new TimeOfDay(23, 59, 0));
    }
}
