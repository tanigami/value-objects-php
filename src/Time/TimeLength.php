<?php

namespace Tanigami\ValueObjects\Time;

use InvalidArgumentException;

class TimeLength
{
    /**
     * @var int
     */
    protected $lengthInSeconds;

    /**
     * @param int $lengthInSeconds
     */
    protected function __construct(int $lengthInSeconds)
    {
        if (!($lengthInSeconds >= 0)) {
            throw new InvalidArgumentException(sprintf('Length cannot be negative in seconds: %s', $lengthInSeconds));
        }

        $this->lengthInSeconds = $lengthInSeconds;
    }

    /**
     * @param int $seconds
     * @return TimeLength
     */
    public static function ofSeconds(int $seconds): TimeLength
    {
        return new static($seconds);
    }

    /**
     * @param int $minutes
     * @return TimeLength
     */
    public static function ofMinutes(int $minutes): TimeLength
    {
        return new static($minutes * 60);
    }

    /**
     * @param int $hours
     * @return TimeLength
     */
    public static function ofHours(int $hours): TimeLength
    {
        return new static($hours * 3600);
    }

    /**
     * @param int $days
     * @return TimeLength
     */
    public static function ofDays(int $days): TimeLength
    {
        return new static($days * 86400);
    }

    /**
     * @param self $other
     */
    public function equals(self $other): bool
    {
        return $this->lengthInSeconds === $other->lengthInSeconds;
    }

    /**
     * @return int
     */
    public function hasSeconds(): int
    {
        return $this->lengthInSeconds;
    }

    /**
     * @return int
     */
    public function hasMinutes(): int
    {
        return intval(floor($this->lengthInSeconds / 60));
    }

    /**
     * @return int
     */
    public function hasHours(): int
    {
        return intval(floor($this->lengthInSeconds / 3600));
    }

    /**
     * @return int
     */
    public function hasDays(): int
    {
        return intval(floor($this->lengthInSeconds / 86400));
    }
}
