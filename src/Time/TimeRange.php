<?php

namespace Tanigami\ValueObjects\Time;

use DateTimeImmutable;
use InvalidArgumentException;

class TimeRange
{
    /**
     * @var DateTimeImmutable
     */
    private $start;

    /**
     * @var DateTimeImmutable
     */
    private $end;

    /**
     * @param DateTimeImmutable $from
     * @param DateTimeImmutable $to
     */
    public function __construct(DateTimeImmutable $start, DateTimeImmutable $end)
    {
        if (!($start <= $end)) {
            throw new InvalidArgumentException('Start must be earlier than or same as end');
        }

        $this->start = $start;
        $this->end = $end;
    }

    /**
     * @param self $other
     * @return bool
     */
    public function equals(self $other): bool
    {
        return $this->start == $other->start && $this->end == $other->end;
    }

    /**
     * @return DateTimeImmutable
     */
    public function start(): DateTimeImmutable
    {
        return $this->start;
    }

    /**
     * @return DateTimeImmutable
     */
    public function end(): DateTimeImmutable
    {
        return $this->end;
    }

    /**
     * @return TimeLength
     */
    public function length(): TimeLength
    {
        return TimeLength::ofSeconds($this->end->getTimestamp() - $this->start->getTimestamp());
    }
}
