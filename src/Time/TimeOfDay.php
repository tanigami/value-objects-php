<?php

namespace Tanigami\ValueObjects\Time;

use InvalidArgumentException;

class TimeOfDay
{
    /**
     * @var int
     */
    private $hours;

    /**
     * @var int
     */
    private $minutes;

    /**
     * @var int
     */
    private $seconds;

    /**
     * @param int $hours
     * @param int $minutes
     * @param int $seconds
     */
    public function __construct(int $hours, int $minutes, int $seconds)
    {
        if (!(0 <= $hours && $hours < 24)) {
            throw new InvalidArgumentException(sprintf('Hours must be between 0 and 23: %s', $hours));
        }
        if (!(0 <= $minutes && $minutes < 60)) {
            throw new InvalidArgumentException(sprintf('Minutes must be between 0 and 59: %s', $minutes));
        }
        if (!(0 <= $seconds && $seconds < 60)) {
            throw new InvalidArgumentException(sprintf('Seconds must be between 0 and 59: %s', $seconds));
        }

        $this->hours = $hours;
        $this->minutes = $minutes;
        $this->seconds = $seconds;
    }

    /**
     * @param self $other
     * @return bool
     */
    public function equals(self $other): bool
    {
        return
            $this->hours === $other->hours &&
            $this->minutes == $other->minutes &&
            $this->seconds === $other->seconds;
    }

    /**
     * @return int
     */
    public function hours(): int
    {
        return $this->hours;
    }

    /**
     * @return int
     */
    public function minutes(): int
    {
        return $this->minutes;
    }

    /**
     * @return int
     */
    public function seconds(): int
    {
        return $this->seconds;
    }
}
